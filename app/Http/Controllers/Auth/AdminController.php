<?php

namespace App\Http\Controllers\Auth\Backend;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Meta as Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(request $request)
    {
        $data['title']   = 'Login';
        $data = array_merge($this->meta(), $data);
        if (!isset($_COOKIE['access_tokenku'])) {
            return view('backend.auth.login', compact('data'));
        } else {
            return redirect(url('/admin'));
        }
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message'  => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',

            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user        = $request->user();
        $tokenResult = $user->createToken('Client');
        $token       = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();
        setcookie('token', $tokenResult->accessToken, time() + 1000, '/', 'http://localhost/client/');

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return response()->json(['mesaage', 'Suuccess Signout!']);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

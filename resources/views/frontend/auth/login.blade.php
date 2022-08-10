@extends('layouts.frontend.app')
@section('content')
<main>
    <section class="signup__area po-rel-z1 pt-100 pb-145">
       <div class="container">
          <div class="row">
             <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                <div class="page__title-wrapper text-center mb-55">
                   <h2 class="page__title-2">{{ __('Masuk Aplikasi') }}</h2>
                   <p>{{ __('Silahkan login ke Aplikasi dengan Email dan Password Anda') }}</p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="sign__wrapper white-bg">
                  <div class="sign__header mb-35">
                     
                     <div class="sign__in text-center">
                        <a id="sign_social_google" href="javascript:void(0);" class="sign__social text-start mb-15"><i class="fab fa-google"></i>Daftar dengan Google</a>
                        <p> <span>........</span> {{ __('Atau, daftar dengan email') }}<span> ........</span> </p>
                     </div>
                  </div>
                   <div class="sign__form">
                     <form id="formLogin">
                        @csrf
                         <div class="sign__input-wrapper mb-25">
                            <h5>{{ __('Email') }}</h5>
                            <div class="sign__input">
                               <input name="email" type="text" placeholder="email">
                               <i class="fal fa-envelope"></i>
                            </div>
                         </div>
                         <div class="sign__input-wrapper mb-10">
                            <h5>{{ __('Password') }}</h5>
                            <div class="sign__input">
                               <input name="password" type="password" placeholder="Password">
                               <i class="fal fa-lock"></i>
                            </div>
                         </div>
                         <div class="sign__action d-sm-flex justify-content-between mb-30">
                            <div class="sign__agree d-flex align-items-center">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label class="form-check-label" for="remember">{{ __('Ingat saya') }}</label>
                            </div>
                         </div>
                         <button class="w-btn w-btn-11 w-100 mt-3"> <span></span> {{ __('Masuk') }}</button>
                         <div class="sign__new text-center mt-20">
                            <p>{{ __('Baru tau Bidme ?') }} <a href="{{ route('signup') }}">{{ __('Daftar') }}</a></p>
                         </div>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
 </main>
@endsection

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function() {
       $("#formLogin").submit( function (event){
          event.preventDefault();

          const form = $(this)[0];
          const data = new FormData(form);

          $.ajax({
             url: BaseUrl+'/api/auth/sigin',
             data: data,
             method: 'POST',
             processData: false,
             contentType: false,
             cache: false,
             complete: (response) => {
                if(response.status == 200) {
                   console.log(response.responseJSON.access_token);
                  
                }
             }
          });
       });
	   
	   $("#sign_social_google").click( function () {
		window.location.href = ServerUrl+'/auth/redirect/google';
		});
	  
  });
  
   
</script>
@endpush
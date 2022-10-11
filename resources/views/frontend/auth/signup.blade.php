@extends('layouts.frontend.app')
@section('content')
<main>
    <section class="signup__area po-rel-z1 pt-100 pb-145">
       <div class="container">
          <div class="row">
             <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                <div class="page__title-wrapper text-center mb-55">
                   <h2 class="page__title-2">{{ __('Buat akun gratis') }}</h2>
                   <p>{{ __('Buat akun Bidme dengan beberapa langkah dibawah ini.') }}</p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="sign__wrapper white-bg">
                  <div class="sign__header mb-35">
                     
                     <div class="sign__in text-center">
                        <a href="https://services.bidme.id/auth/redirect/google" class="sign__social text-start mb-15"><i class="fab fa-google"></i>Daftar dengan Google</a>
                        <p> <span>........</span> {{ __('Atau, daftar dengan email') }}<span> ........</span> </p>
                     </div>
                  </div>
                   <div class="sign__form">
                     <form id="formSignup">
                         <div class="sign__input-wrapper mb-25">
                            <h5>{{ __('Nama Lengkap') }}</h5>
                            <div class="sign__input">
                               <input type="text" name="name" placeholder="Nama Lengkap" autocomplete="off">
                               <i class="fal fa-user"></i>
                            </div>
                         </div>
                         <div class="sign__input-wrapper mb-25">
                            <h5>{{ __('Email') }}</h5>
                            <div class="sign__input">
                               <input type="text" name="email" placeholder="Email" autocomplete="off">
                               <i class="fal fa-envelope"></i>
                            </div>
                         </div>
                         <div class="sign__input-wrapper mb-25">
                            <h5>{{ __('No Telpon') }}</h5>
                            <div class="sign__input">
                               <input type="text" name="no_telp" placeholder="No Telpon" autocomplete="off">
                               <i class="fal fa-user"></i>
                            </div>
                         </div>
                         <div class="sign__input-wrapper mb-25">
                            <h5>{{ __('Password') }}</h5>
                            <div class="sign__input">
                               <input type="password" name="password" placeholder="Password" >
                               <i class="fal fa-lock"></i>
                            </div>
                         </div>
                         <div class="sign__input-wrapper mb-10">
                            <h5>{{ __('Konfirmasi Password') }}</h5>
                            <div class="sign__input">
                               <input type="password"name="password_confirmation" placeholder="Konfirmasi Password">
                               <i class="fal fa-lock"></i>
                            </div>
                         </div>
                         <div class="sign__action d-flex justify-content-between mb-30">
                            <div class="sign__agree d-flex align-items-center">
                               <input class="m-check-input" type="checkbox" id="m-agree">
                               <label class="m-check-label" for="m-agree">{{ __('Saya setuju dengan') }} <a href="#">{{ __('syarat & ketentuan') }}</a>
                                  </label>
                            </div>
                         </div>
                         <button type="submit" class="w-btn w-btn-11 w-100"> <span></span> {{ __('Daftar') }}</button>
                         <div class="sign__new text-center mt-20">
                            <p>{{ __('Sudah punya akun ?') }} <a href="{{ route('login') }}"> {{ __('Masuk') }}</a></p>
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
   $("#formSignup").submit( function (event) {
      event.preventDefault();
      
      const form = $(this)[0];
      const data = new FormData(form);

     $.ajax({
        url:  ServerUrl+'/api/auth/signup',
        data: data,
        method: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        complete: (response) => {                
              if(response.status == 201){
               console.log(response.responseJSON.data.user);
                 swal({
                    title: '',
                    text : response.responseJSON.message,
                    icon :'success'
                 }).then(function(){
                    window.location.replace('/user/account');
                 });
              }else if(response.status == 404){
                 swal({
                    title: '',
                    text : response.responseJSON.message,
                    icon : 'warning',
                 });    
              }else if(response.status == 401){
              e('info','401 server conection error');
              }else{
                 swal({
                    title: '',
                    text : response.responseJSON.message,
                    icon :'warning',
                 });	 
              }
           },
           dataType:'json'
     })
   });
</script>
@endpush
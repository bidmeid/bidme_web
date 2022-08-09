<div class="sidebar__area">
    <div class="sidebar__wrapper">
       <div class="sidebar__close">
          <button class="sidebar__close-btn" id="sidebar__close-btn">
          <span><i class="fal fa-times"></i></span>
          <span>{{ __('close') }}</span>
          </button>
       </div>
       <div class="sidebar__content">
          <div class="logo mb-40">
             <a href="#">
             <img src="{{ asset('frontend/img/logo/logo.png') }}" alt="logo">
             </a>
          </div>
          <div class="mobile-menu mobile-menu-3"></div>
          <div class="sidebar__info mt-350">
             <a href="#" class="w-btn w-btn-blue-2 w-btn-4 d-block mb-15 mt-15">{{ __('login') }}</a>
             <a href="#" class="w-btn w-btn-blue d-block">{{ __('sign up') }}</a>
          </div>
       </div>
    </div>
 </div>
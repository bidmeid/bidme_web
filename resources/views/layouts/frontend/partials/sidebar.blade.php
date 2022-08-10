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
		  <?php if(isset($data['user']->name)){  ?>
			 <div class="dropdown">
						  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Hi, <?php echo $data['user']->name; ?>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="{{ url('user/account') }}">Profile</a></li>
							<li><a class="dropdown-item" href="{{ url('user/my_order') }}">Pesanan Saya</a></li>
							<li><a class="dropdown-item" href="{{ url('auth/signout') }}">Logout</a></li>
						  </ul>
						</div>
		  <?php }else{ ?>
             <a href="#" class="w-btn w-btn-blue-2 w-btn-4 d-block mb-15 mt-15">{{ __('login') }}</a>
             <a href="#" class="w-btn w-btn-blue d-block">{{ __('sign up') }}</a>
		  <?php } ?>
          </div>
       </div>
    </div>
 </div>
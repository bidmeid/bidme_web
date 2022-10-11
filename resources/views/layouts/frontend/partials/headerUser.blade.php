<header>
    <div id="header-sticky" class="header__area header__shadow header__padding">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-xxl-4 col-xl-2 col-lg-2 col-md-6 col-6">
                <div class="logo">
                   <a href="{{ url('/') }}">
                      <img src="{{ asset('frontend/img/logo/logo.png') }}" alt="logo">
                   </a>
                </div>
             </div>
             <div class="col-xxl-8 col-xl-10 col-lg-10 d-none d-lg-block">
                <div class="header__right d-flex justify-content-end">
                   <div class="main-menu main-menu-3 pl-40">
                      <nav id="mobile-menu">
                         <ul>
                            <li><a href="{{ url('user/account') }}">Informasi Akun</a></li>
                            <li><a href="{{ url('user/layanan') }}">Layanan Berlangsung</a></li>
							<li><a href="{{ route('order') }}">Order</a></li>
                            <li><a href="{{ url('user/bantuan') }}">Bantuan</a></li>
                            
                         </ul>
                      </nav>
                   </div>
                   <div class="header__action ml-40 text-end d-flex align-items-center justify-content-end">
                      <div class="header__right-btn d-none d-md-flex d-xl-block">
					  <?php if(isset($data['user']->name)){  ?>
					 
						<div class="dropdown">
						  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Hi, <?php echo $data['user']->name; ?>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="{{ url('user/account') }}">Profile</a></li>
							
							<li><a id="logout" class="dropdown-item" href="javascript:void(0)">Logout</a></li>
						  </ul>
						</div>
					  <?php }else{ ?>
                         <a href="{{ route('login') }}" class="w-btn w-btn-purple w-btn-7">Login</a>
					  <?php } ?>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-6 d-lg-none">
                <div class="sidebar__menu d-flex justify-content-end d-lg-none">
                   <div class="sidebar-toggle-btn sidebar-toggle-btn-2" id="sidebar-toggle">
                       <span class="line"></span>
                       <span class="line"></span>
                       <span class="line"></span>
                   </div>
               </div>
             </div>
          </div>
       </div>
    </div>
 </header>
<!doctype html>
<html class="no-js" lang="zxx">
   
<head>
      @include('layouts.frontend.partials.style2')
      <script>
        function getToken() {
			var name = 'access_tokenku';
		  let matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		  ));
		  return matches ? decodeURIComponent(matches[1]) : undefined;
		}
         <?php if(isset($_COOKIE['access_tokenku'])){ ?>    
         $.ajaxSetup({
           headers: {
			Accept: 'application/json',
            Authorization: 'Bearer '+getToken(),
           }
         });
		 <?php } ?>		 
         const ServerUrl = "{{env('APP_SERVER')}}"
		 function getUrlVars() {
			var vars = {};
			var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
				vars[key] = value.replace(/\+/g, ' ').replace(/\#/g, ' ');
			});
			return vars;
		}
      </script>
   </head>
   <body>
      <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      @include('layouts.frontend.partials.header')
      @include('layouts.frontend.partials.sidebar')
      <div class="body-overlay"></div>
         @yield('content')
      @include('layouts.frontend.partials.footer')
      @include('layouts.frontend.partials.script')
   </body>

</html>


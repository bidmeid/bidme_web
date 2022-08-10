<!doctype html>
<html class="no-js" lang="zxx">
   
<head>
      @include('layouts.frontend.partials.style')
      <script>
        function getToken() {
			var name = 'access_tokenku';
		  let matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		  ));
		  return matches ? decodeURIComponent(matches[1]) : undefined;
		}
             
         $.ajaxSetup({
           headers: {
			Accept: 'application/json',
            Authorization: 'Bearer '+getToken(),
           }
         }); 
         const ServerUrl = "{{env('APP_SERVER')}}"
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


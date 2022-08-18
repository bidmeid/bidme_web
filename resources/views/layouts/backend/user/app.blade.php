<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.backend.user.partials.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.backend.user.partials.navbar')
      @include('layouts.backend.user.partials.sidebar')

      @yield('content')
      
      @include('layouts.backend.user.partials.footer')
    </div>
  </div>
  @include('layouts.backend.user.partials.script')
</body>
</html>

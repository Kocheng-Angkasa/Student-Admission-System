<!doctype html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
 
    @include('layouts.menu_bar')
 
<main role="main">
 
  @yield('content')
 
</main>
 
@include('layouts.footer')
 
@include('layouts.scripts')
 
    </body>
</html>
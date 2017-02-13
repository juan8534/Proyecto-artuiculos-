<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Home') | Blog Facilito</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/cosmo/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">


  </head>
  <body>
    <header>
        @include('front.template.partials.nav')
        @include('front.template.partials.header')
    </header>
    <div class="container">
      @yield('content')
    </div>

    <div class="container">
      <footer>
        <hr>
        Todos los derechos reservados &copy {{ date('Y')}}
        <div class="pull-right">Juan Pablo Vargas</div>
      </footer>
    </div>

    <script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
  </body>
</html>

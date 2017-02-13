<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Default') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowy/ui/trumbowyg.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fileinput/css/fileinput.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/dev/sweetalert.css')}}">

  </head>
  <body class="admin-body">

    @include('admin.template.partials.nav')
    <section class="section-admin">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">@yield('title')</h3>
        </div>
        <div class="panel-body">
          @if(!session('message')==null)
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{session('message')}}
            </div>
          @endif﻿
        @include('admin.template.partials.errors')
        

        @yield('content')
        </div>
      </div>
    </section>

    <script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('plugins/sweetalert/lib/sweetalert.js')}}"></script>
    <script src="{{ asset('plugins/trumbowy/trumbowyg.js')}}"></script>
    <script src="{{ asset('plugins/fileinput/js/fileinput.js')}}"></script>
    @include('sweet::alert')
    @yield('js')
  </body>
</html>

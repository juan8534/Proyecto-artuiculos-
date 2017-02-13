<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Acceso restringido!!!</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/cosmo/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/error.css')}}">
  </head>
  <body>
    <div class="box-admin">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="panel-title">Acceso Restirngido</div>
          </div>
          <div class="panel-body">
              <img class="img-responsive center-block" src="{{ asset('images/denegado.png')}}" alt="">
          <hr>
          <strong class="text-center">
            <p class="text-center">
              <p>
                <a href="{{route('front.index')}}">Desea volver al inicio?</a>
              </p>
            </p>
          </strong>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>

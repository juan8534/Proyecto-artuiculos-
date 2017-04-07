@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')
  <a href="{{ route('admin.tags.create')}}" class="btn btn-primary">Registrar nuevo tag</a>
  <!--Buscador de tags-->
      {!! Form::open(['route'=>'admin.tags.index', 'method' => 'GET', 'class' =>
      'navbar-form pull-right'])!!}
        <div class="input-group">
            {!! Form::text('name', null, ['class' => 'form-control','placeholder' =>
              'Buscar tag...','aria-describedby' => 'search'])!!}
            <span class="input-group-addon" id="search">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </span>
        </div>
      {!! Form::close()!!}
  <!--Fin del buscador -->
  <hr>
  <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acción</th>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->id}}</td>
            <td>{{ $tag->name}}</td>
            <td>
              <a href="{{ route('admin.tags.edit', $tag->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"
              aria-hidden="true"></span>
              </a>

              <a data-target="#modal-delete" data-toggle="modal" class="btn btn-danger">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </td>
          </tr>
          @include('admin.template.modales.modaltags')
        @endforeach
      </tbody>
  </table>
  <div class="text-center">
    {!!$tags->render()!!}
  </div>
@endsection

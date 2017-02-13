@extends('admin.template.main')

@section('title', 'Listado de articulos')

@section('content')
 <a href="{{ route('admin.articles.create')}}" class="btn btn-primary">Crear un nuevo articulo</a>
 <!-- Buscador de articulos-->
 {!! Form::open(['route'=>'admin.articles.index', 'method' => 'GET', 'class' =>
 'navbar-form pull-right'])!!}
   <div class="input-group">
       {!! Form::text('tittle', null, ['class' => 'form-control','placeholder' =>
         'Buscar articulo...','aria-describedby' => 'search'])!!}
       <span class="input-group-addon" id="search">
       <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
       </span>
   </div>
 {!! Form::close()!!}

  <hr>
  <table class="table table-striped">
      <thead>
          <th>ID</th>
          <th>Titulo</th>
          <th>Categoria</th>
          <th>User</th>
          <th>Acción</th>
      </thead>
      <tbody>
        @foreach ($articles as $article)
            <tr>
              <td>{{ $article->id }}</td>
              <td>{{ $article->tittle}}</td>
              <td>{{ $article->category->name}}</td>
              <td>{{ $article->user->name}}</td>
              @if (Auth::user()->admin())
              <td>
                  <a href="{{ route('admin.articles.edit', $article->id) }}"
                  class="btn btn-warning"><span class="glyphicon glyphicon-wrench"
                  aria-hidden="true"></span>
                  </a>

                  <a data-target="#modal-delete" data-toggle="modal" class="btn btn-danger">
                 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
              </td>
              @endif
            </tr>
            @include('admin.template.modales.modalarticulos')
        @endforeach
      </tbody>
  </table>
  <div class="text-center">
    {!! $articles->render(); !!}
  </div>

@endsection

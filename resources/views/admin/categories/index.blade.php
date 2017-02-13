@extends('admin.template.main')

@section('title', 'Listado de Categorias')

@section('content')
    <a href="{{ route('admin.categories.create')}}" class="btn btn-primary">Registrar nueva categoria</a><hr>
    <table class="table table-striped">

      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acción</th>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
            <td>
              <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"
              aria-hidden="true"></span>
              </a>

             <a data-target="#modal-delete" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"
           aria-hidden="true"></span>
             </a>
            </td>
          </tr>
        @include('admin.template.modales.modalcategorias')
        @endforeach
      </tbody>

      </table>
      <div class="text-center">
        {!! $categories->render() !!}
      </div>
@endsection

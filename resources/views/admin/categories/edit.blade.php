@extends('admin.template.main')

@section('title', 'Editr categoria')

@section('content')
    {!! Form::open(['route' => ['admin.categories.update', $category], 'method' => 'PUT'])!!}
        <div class="form-group">
            {!! Form::label('name','Nombre')!!}
            {!! Form::text('name', $category->name,['class'=> 'form-control', 'placeholder' => 'Nombre de la categoria',
              'required'])!!}
        </div>
        <div class="form-group">
          {!! Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
        </div>
    {!! Form::close()!!}

@endsection

@extends('admin.template.main')

@section('title', 'Agregar articulo')

@section('content')
    {!! Form::open(['route'=>'admin.articles.store', 'method'=> 'POST', 'files' => true])!!}
      <div class="form-group">
          {!! Form::label('tittle', 'Titulo')!!}
          {!! Form::text('tittle', null, ['class'=> 'form-control','placeholder'
            => 'Titulo del articulo','required'])!!}
      </div>

      <div class="form-group">
          {!! Form::label('category_id', 'Categoria')!!}
          {!! Form::select('category_id', $categories, null, ['class'=>'form-control select-category',
            'placeholder'=>'Seleccione una categoria', 'required'])!!}
      </div>

      <div class="form-group">
          {!! Form::label('content', 'Contenido')!!}
          {!! Form::textarea('content',null,['class'=>'form-control textarea-content'])!!}
      </div>

      <div class="form-group">
          {!! Form::label('tags', 'Tags')!!}
          {!! Form::select('tags[]', $tags, null,['class'=>'form-control select-tag',
            'multiple', 'required'])!!}
      </div>


      <div class="form-group">
          {!! Form::label('image', 'Imagen')!!}
          {!! Form::file('image',['class' => 'image input-image'])!!}
      </div>

      <div class="form-group">
          {!! Form::submit('Agregar Articulo', ['class'=>'btn btn-primary'])!!}
      </div>
    {!! Form::close()!!}



@endsection
@section('js')
  <script>
    $('.select-tag').chosen({
      placeholder_text_multiple:'Seleccione un maximo de 3 tags',
      max_selected_options:3,
      search_contains:true,
      no_results_text:'No se encontraron estos tags'
    });

    $('.select-category').chosen();

    $('.textarea-content').trumbowyg();

    $('.input-image').fileinput();
  </script>
@endsection

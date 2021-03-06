@extends('front.template.main')

@section('content')
  <h3 class="title-front left">Ultimos Articulos</h3>
  <div class="row">
    <div class="col-md-8">
      <div class="row">

        @foreach ($articles as $article)

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-body" >
              <a href="{{ route('front.view.article', $article->id)}}" class="thumbnail">
                @foreach ($article->images as $image)
                <img class="img-responsive img-article" src="{{ asset('images/articles/' .$image->name)}}"
                 >
                @endforeach
              </a>
              <a href="{{ route('front.view.article', $article->id)}}" class="thumbnail">
              <h3 class="text-center">{{$article->tittle}}</h3>
              </a>
              <hr>
              <i class="fa fa-folder-open-o"></i> <a href="{{ route('front.search.category', $article->category->name)}}">
                {{ $article->category->name}}</a>
              <div class="pull-right">
                <i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans()}} <!--metodo para mostrar fecha para humanos-->
              </div>
              <div class="pull-left">
                <h4><span class="label label-primary">Subido por: {{ $article->user->name}}</span></h4>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
      <div class="text-center">
      {!! $articles->render()!!}
      </div>
    </div>
    <div class="col-md-4 aside">
      @include('front.template.partials.aside')
    </div>
  </div>
@endsection

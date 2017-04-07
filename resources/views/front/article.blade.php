@extends('front.template.main')

@section('title', $articles->tittle)

@section('content')
  <h3 class="title-front left"><strong>{{ $articles->tittle}}</strong></h3>
  <hr>
  <div class="col-md-9">

      @foreach ($articles->images as $image)
      <img class="img-responsive" src="{{ asset('images/articles/' .$image->name)}}"
        width="900">
      @endforeach
    <hr>
      <p align="center">{!! $articles->content !!}</p>
      <h2>Tags relacionados</h2>
      @foreach ($articles->tags as $tag)
        <span class="btn label-default">
        <a href="{{ route('front.search.tag', $tag->name)}}">
          {{ $tag->name }}
        </a></span>
      @endforeach
      <h3>Comentarios</h3>
      <hr>

      <!--Plugin de comentarios en facebook-->
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
      <div class="fb-comments" data-href="http://localhost/blog/public/articles/"
      data-numposts="5"></div>
  </div>
  <div class="col-md-3 aside">
    @include('front.template.partials.aside')
  </div>
@endsection

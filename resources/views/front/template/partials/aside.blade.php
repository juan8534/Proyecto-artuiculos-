<div class="list-group">
  <a href="#" class="list-group-item active">
    <h3>Categorias</h3>
  </a>
  @foreach ($categories as $category)
    <li class="list-group-item">
      <span class="badge">{{ $category->articles->count()}}</span> <!-- Cuenta los articulos-->
      <a href="{{ route('front.search.category', $category->name)}}">
        {{ $category->name}}
      </a>
    </li>
  @endforeach
</div>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Tags</h3>
  </div>
  <div class="panel-body">
    @foreach ($tags as $tag)
      <span class="label label-default">
      <a href="{{ route('front.search.tag', $tag->name)}}">
        {{ $tag->name }}
      </a></span>
    @endforeach
  </div>
</div>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          @can("create",App\model\Article::class)
            <a class="nav-link" href="{{route("article.create")}}">Új cikk</a>
          @endcan
        </li>
        
      
      </ul>
      <span class="navbar-text">
        @if(Auth::check())
          Üdv {{Auth::user()->name}}
        @else
          Lépj be!
        @endif
      </span>
    </div>
  </div>
</nav>
<div class="container">
<nav class="navbar navbar-expand-lg  rounded my-navbar" aria-label="Eleventh navbar example">
      <div class="container-fluid">
        <a class="navbar-brand my-navbar-color-item" href="{{route('home')}}">Discover Anime</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{ route('search')}}"  >Search</a>
            </li>

            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('browse')}}">Browse</a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="#">Anime List</a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('randomImages')}}"> Anime Images</a>
            </li>

          </ul>
          <!-- <form role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          </form> -->
        </div>
      </div>
    </nav>
</div>
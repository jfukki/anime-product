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

            <!-- <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('browse')}}">Browse</a>
            </li>
              -->
            <!-- <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="#">Anime List</a>
            </li> -->
             
            <!-- <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('randomImages')}}"> Anime Images</a>
            </li> -->
<!-- 
            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('reviews')}}"> Anime Reviews</a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('site-stats')}}"> Site Stats</a>
            </li>

            @if(auth()->user())
            <li class="nav-item">
              <a class="nav-link my-navbar-color-item" href="{{route('my-list')}}"> My List</a>
            </li>
            @endif

          </ul>

          <ul  class="nav navbar-nav navbar-right">

          @if(auth()->user())
        
        <li class="nav-item">
          <a class="nav-link active auth-user-navbar"  href="{{route('dashboard')}}">{{auth()->user()->name}}</a>
        </li>

        
        <li class="nav-item">
          
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger logout-btn" href="">Logout</button>
          </form>
        </li>

        @else
           <li class="nav-item ">
              <a class="nav-link my-navbar-color-item custom-btn-singup btn" href="{{route('login')}}"> Login</a>
            </li>

           <li class="nav-item ">
              <a class="nav-link my-navbar-color-item btn custom-btn-singup" href="{{route('signup')}}"> Sign Up</a>
            </li>
         
        @endif
          


          </ul>
          <!-- <form role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          </form> -->


          
        </div>
        

        
        
  </div>

      </div>



    </nav>
</div>
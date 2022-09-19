@extends('main')

@section('title', 'Search Your Favorite Anime')

@section('content')

<!-- search bar -->

<div class="container">
      <div class="row home-main-section">

      <div class="col-lg-7">
          <h1>Discover Anime.</h1>
          <h2>For Fans, By Fans</h2>

          
          <form action="{{ route('search') }}" method="POST">
              @csrf
              
              <input type="text" class="form-control searchbar-custom" id="searchAnimeTitle" name="searchAnimeTitle"  placeholder="Search By Title">
              
          </form>   

      </div>



      <div class="col-lg-5 mt-5   ">
      <br>
      <p class="home-main-section-text mt-2">Anime Recommendations, Wishlist, Anime Track, Reviews, Forum & Much More!</p>
      </div>

      </div>
</div>


<!-- search bar -->

<div class="container extra-padding-container mt-5">
    <div class="row" >
      @if(collect($searchItem)->isNotEmpty()) 
      <div class="col"> <h2>Searched For "{{$searchItem}}"</h2>  </div>
      @endif
    </div>

</div>



 
<div class="container ">
@if(isset($search) )
@foreach($search as $searchItem)
    <div  class="row searched-item-row" >
        
               
                <div class="col-md-2 searched-item-image">
                  @if(isset($searchItem['mal_id']))

                  <a href="{{ route('animeDetail' , $searchItem['mal_id'])  }}"> <img src="{{$searchItem['images']['jpg']['large_image_url']}}" alt=""> </a>

                  @else
                   <img src="" alt="No Image Found">
                  @endif
                </div>
                <div class="col-md-4 mt-3">
                     <a href="{{ route('animeDetail' , $searchItem['mal_id'])  }}" class="searched-item-title">  {{$searchItem['titles'][0]['title']}} <br> </a>
                     <span class="searched-item-rating">Rating: {{$searchItem['rating']}}</span>
                </div>
                <div class="col-md-2 mt-3">
                  <span class="searched-item-score">Score: {{$searchItem['score']}} <br>Popularity: {{$searchItem['popularity']}} </span>
                </div>
                <div class="col-md-2 mt-3">
                   <span class="searched-item-type">Type:<br>{{$searchItem['type']}}</span>
                </div>
                <div class="col-md-2 mt-3">
                   <span class="searched-item-status">Status:<br>  {{$searchItem['status']}}</span>
                </div>
 
         
    </div>

    @endforeach

    @else

    <h2>Oops!! something went wrong...</h2>

    @endif

</div>

 
     

@endsection
@extends('main')
@section('meta-description', 'Anime Recommendations, Anime Episodes, Anime wishlist, Anime track, Anime wallpapers, Famous Anime Characters & Much More')
@section('meta-keywords', 'anime, anime recommendations, anime record, anime track, anime characters, upcoming anime, popular anime')

@section('title', 'Register For More Anime Recommendations & Much More')



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



<div class="container extra-padding-container mt-5 ">
    <div class="row" >
     <div class="col-lg-12">
        <h2>{{auth()->user()->name}} Favourite Anime List</h2>
     </div>
     <hr>
    </div>


    <div class="row mb-5">

        @if(isset($user_fav_anime_list))


            @foreach($user_fav_anime_list as $list)

                <div  class="row searched-item-row" >
                
                

                    <div class="col-md-2 searched-item-image">
                            <a href="{{ route('animeDetail' , $list->anime_id)  }}"> <img src="{{$list->anime_image}}" alt=""> </a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <a href="{{ route('animeDetail' , $list->anime_id)  }}" class="searched-item-title">  

                                 @if($list->english_title == '')

                                           {{$list->japanese_title}} 

                                        @else

                                           {{$list->english_title}}
                                @endif  

                                <br> 
                    </a>


                        <span class="searched-item-rating">Rating: {{$list->rating}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-score">Score:  <br>Popularity:  {{$list->popularity}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-type">Type:<br>{{$list->type}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-status">Status:<br> {{$list->status}} </span>
                    </div>

            
                    </div>

            @endforeach

        @else
        <p>Please Add To Your List!</p>
        @endif






@endsection
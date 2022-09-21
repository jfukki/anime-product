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

<div class="container extra-padding-container mt-5 ">
    <div class="row" >
     <div class="col-lg-12">
        <h2>People Also Searched for</h2>
     </div>
     <hr>
    </div>


    <div class="row mb-5">

        @if(isset($search_list))


            @foreach($search_list as $search_list)

                <div  class="row searched-item-row" >
                
                

                    <div class="col-md-2 searched-item-image">
                            <a href="{{ route('animeDetail' , $search_list->anime_id)  }}"> <img src="{{$search_list->anime_image}}" alt=""> </a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <a href="" class="searched-item-title">  

                                 @if($search_list->english_title == '')

                                           {{$search_list->japanese_title}} 

                                        @else

                                           $search_list->english_title
                                @endif  

                                <br> 
                    </a>


                        <span class="searched-item-rating">Rating: {{$search_list->rating}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-score">Score:  <br>Popularity:  {{$search_list->popularity}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-type">Type:<br>{{$search_list->type}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-status">Status:<br> {{$search_list->status}} </span>
                    </div>

            
                    </div>

            @endforeach

        @else
        <p>Please Refresh!</p>
        @endif



    </div>



  
     

@endsection
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
        
               
                <div class="col-md-1 searched-item-image">
                  @if(isset($searchItem['mal_id']))

                  <a href="{{ route('animeDetail' , $searchItem['mal_id'])  }}"> <img src="{{$searchItem['images']['jpg']['large_image_url']}}" alt=""> </a>

                  @else
                   <img src="" alt="No Image Found">
                  @endif
                </div>
                <div class="col-md-2 mt-3">
            @if($searchItem['title_english'] == '')

              <a href="{{ route('animeDetail' , $searchItem['mal_id'])  }}" class="searched-item-title">  {{$searchItem['title_japanese']}} <br> </a>
       
              @else
           
                     <a href="{{ route('animeDetail' , $searchItem['mal_id'])  }}" class="searched-item-title">  {{$searchItem['title_english']}} <br> </a>

            @endif  
                     <span class="searched-item-rating">Rating: {{$searchItem['rating']}}</span>
                </div>
                <div class="col-md-2 mt-3">
                  <span class="searched-item-score">Score: {{$searchItem['score']}} <br>Popularity: {{$searchItem['popularity']}} </span>
                </div>
                <div class="col-md-1 mt-3">
                   <span class="searched-item-type">Type:<br>{{$searchItem['type']}}</span>
                </div>
                <div class="col-md-2 mt-3">
                   <span class="searched-item-status">Status:<br>  {{$searchItem['status']}}</span>
                </div>

                
                <div class="col-md-2 mt-3" style="padding-right:0% !important;">
                   
                   <!-- Fav -->
                   <a  href="{{ route('removefromfavlist', 
                   [
                   'anime_id' => $searchItem['mal_id'], 
                   'user_id' => auth()->user()->id 
               ]
               
               )}}"class="add-to-favourite-btn-detail-page btn" style="margin-top:16px !important; "> Remove From List <i class="fa fa-heart" style="font-size:12px;"></i> </a>
           <!-- Fav --> 
       

       </div>

       <div class="col-md-2 mt-1">
      <br>
           <!-- Review -->
               <a  href="#" class="write-review-btn-detail-page btn"> <i class="fa fa-pencil" style="font-size:12px; "></i> Write A Review</a>
               <!-- Review -->

        </div>
 
         
    </div>

    @endforeach

    @else

    <h2>Oops!! something went wrong...</h2>

    @endif

</div>

 
     

@endsection
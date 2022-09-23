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
                
                    <div class="col-md-1 searched-item-image">
                            <a href="{{ route('animeDetail' , $search_list->anime_id)  }}"> <img src="{{$search_list->anime_image}}" alt=""> </a>
                    </div>
                    <div class="col-md-2 mt-3">
                        <a href="{{ route('animeDetail' , $search_list->anime_id)  }}" class="searched-item-title">  

                                 @if($search_list->english_title == '')

                                           {{$search_list->japanese_title}} 

                                        @else

                                           {{$search_list->english_title}}
                                @endif  

                                <br> 
                    </a>


                        <span class="searched-item-rating">Rating: {{$search_list->rating}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-score">Score:  <br>Popularity:  {{$search_list->popularity}}</span>
                    </div>
                    <div class="col-md-1 mt-3">
                    <span class="searched-item-type">Type:<br>{{$search_list->type}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-status">Status:<br> {{$search_list->status}} </span>
                    </div>

                    @if(auth()->user())


                    <div class="col-md-2 mt-3" style="padding-right:0% !important;">
                   
                            <!-- Fav -->
                            <a  href="{{ route('removefromfavlist', 
                            [
                            'anime_id' => $search_list->anime_id, 
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



                @else
                
                
                <div class="col-md-2 mt-3" style="padding-right:0% !important;">
                   
                   <a  href="{{ route('signup')}}"class="add-to-favourite-btn-detail-page btn"> 
                       <i class="fa fa-heart" style="font-size:12px;"></i>
                       Signup To Add Fav 
                   </a>
  

                </div>

               <div class="col-md-2 mt-3">
                 
                  <a href="{{ route('signup')}}" class="write-review-btn-detail-page btn"> 
                       <i class="fa fa-pencil" style="font-size:12px;"></i> 
                       Signup to Write 
                   </a>

               </div>


                @endif


            
                    </div>

            @endforeach

        @else
        <p>Please Refresh!</p>
        @endif



    </div>



  
     

@endsection
@extends('main')
@section('meta-description', "We recommend $anime_basic->english_title, type: $anime_basic->type, duration: $anime_basic->duration. Watch now $anime_basic->english_title or add in in your wishlish")
@section('meta-keywords', "$anime_basic->english_title anime, $anime_basic->english_title recommendations, anime record, anime track, $anime_basic->english_title characters, upcoming anime, popular anime")

@section('title', "Watch $anime_basic->english_title | $anime_basic->type | $anime_basic->status")

@section('content')
 



<div class="container-fluid mt-5">
    
            <div class="row img-row">

               
            @if(isset($anime_featured_picture->anime_picture_url)  )

            <img src="{{$anime_featured_picture->anime_picture_url}}" alt="" />
           

            @else

            <img src="{{$anime_basic->anime_image}}" alt="" />



            @endif
                  

                  
            </div>

</div>

 <div class="container mt-2  ">
    <div class="row">
        <div class="col-lg-4"  style='  
         position: relative;
         top: -142px;
         '>
            <div class="text-center">
            <img src="{{$anime_basic->anime_image}}"
             alt="" class="anime-detail-anime-cover-image">
            </div>

            <div class="text-center">
                
            @if(auth()->user())
                                 

                    <form action="" method="POST">

                    @csrf

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle detail-page-add-list" 
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Add to
                        </button>
                        <ul class="dropdown-menu">
                            <li ><a class="dropdown-item detail-page-add-list-item" 
                            
                            href="{{ route('addToList', 
                                                [
                                                    'anime_id' => $anime_basic->anime_id, 
                                                    'user_id' => auth()->user()->id ,
                                                    'status' => 'watched'
                                                ]
                                            ) 
                                            
                                    }}">
                                <i class="fa fa-arrow-right"></i>  Watched List</a></li>

                            <li><a class="dropdown-item detail-page-add-list-item" 
                            href="{{ route('addToList', 
                                                [
                                                    'anime_id' => $anime_basic->anime_id, 
                                                    'user_id' => auth()->user()->id ,
                                                    'status' => 'watching'
                                                ]
                                            ) 
                                            
                                    }}"
                            
                            >
                            <i class="fa fa-arrow-right"></i> Watching List</a></li>
                            <li><a class="dropdown-item detail-page-add-list-item" 
                            href="{{ route('addToList', 
                                                [
                                                    'anime_id' => $anime_basic->anime_id, 
                                                    'user_id' => auth()->user()->id ,
                                                    'status' => 'planning'
                                                ]
                                            ) 
                                            
                                    }}"
                                    >
                            <i class="fa fa-arrow-right"></i>        Planning List</a></li>


                            <li><a class="dropdown-item detail-page-add-list-item" 
                            href="{{ route('addToList', 
                                                [
                                                    'anime_id' => $anime_basic->anime_id, 
                                                    'user_id' => auth()->user()->id ,
                                                    'status' => 'dropped'
                                                ]
                                            ) 
                                            
                                    }}"
                                    >
                            <i class="fa fa-arrow-right"></i>       Dropped List</a></li>


                            
                        </ul>
                    </div>


                    </form>


                                    <!-- Review -->
                                    <a  href="{{route('reviewAdd', $anime_basic->anime_id)}}"class="write-review-btn-detail-page-1 btn"> <i class="fa fa-pencil" style="font-size:12px;"></i> 
                                    <!-- Write A Review -->
                                    </a>
                                    <!-- Review -->
                                 
                    
                                @if(count($user_fav_anime) > 0)

                                 

                                <!-- Fav -->
                                <a  href="{{ route('removefromfavlist', 
                                    [
                                        'anime_id' => $anime_basic->anime_id, 
                                        'user_id' => auth()->user()->id 
                                    ]
                                    
                                    )}}"class="add-to-favourite-btn-detail-page-1 btn"> 
                                    <i class="fa fa-minus-circle " style="font-size:12px;"></i> 
                                    <!-- Remove -->
                                 </a>
                                <!-- Fav -->

                                
                                @else
                                 

                                <!-- Fav -->
                                <a  href="{{ route('addtofavlist', 
                                    [
                                        'anime_id' => $anime_basic->anime_id, 
                                        'user_id' => auth()->user()->id 
                                    ]
                                    
                                     )}}"class="add-to-favourite-btn-detail-page-1 btn"> 
                                     <i class="fa fa-heart" style="font-size:12px;"></i> 
                                     <!-- Add To Fav -->
                                    </a>
                                <!-- Fav -->



                                @if(isset($user_anime_list->status))

 <br>
                                        <small class="add-to-favourite-btn-detail-page-1 btn" style="text-transform: capitalize; background:#000; padding:6px; 
                                        border-radius:10px; font-size:12px; color:white; width:225px;">
                                    Your Anime Status:   {{$user_anime_list->status}} </small> <br>
                            


                                    @else


@endif

                                 

                                @endif

                        
                

                @else

                  <!-- Please Login -->

                  <a href="{{ route('signup')}}" class="write-review-btn-detail-page-1 btn"> 
                            <i class="fa fa-pencil" style="font-size:12px;"></i> 
                             <!-- Write A Review -->
                        </a>

                  <a  href="{{ route('signup')}}"class="add-to-favourite-btn-detail-page-1 btn"> 
                        <i class="fa fa-heart" style="font-size:12px;"></i>
                          <!-- Add To Fav  -->
                        </a>

                        
                    <!-- Please Login -->
                         


                @endif   

               

            </div>
        </div>

        <div class="col-lg-8">
            <div>
            @if($anime_basic->english_title == '')

            <h1 class="anime-detail-anime-title my-2">{{$anime_basic->japanese_title}}</h1>

            @else
                <h1 class="anime-detail-anime-title my-2">{{$anime_basic->english_title}}</h1>
            @endif    

            

                            <div class="row" style="margin-top:2%">
                                            
                                <div class="col-lg-2 col-4" style="text-transform: capitalize; background:#EA4D01; padding:6px; 
                                    border-radius:10px; font-size:12px; color:white;  margin-left:2%; margin-bottom:2%; text-align: center;">Total Reviews: {{$count_anime_reviews}}</div>

                                <div class="col-lg-2 col-4" style="text-transform: capitalize; background:#54229E; padding:6px; 
                                    border-radius:10px; font-size:12px; color:white; margin-left:2%; margin-bottom:2%; text-align: center;">{{$anime_watching_status_count}} Watching  </div>

                                <div class="col-lg-2 col-4" style="text-transform: capitalize; background:#6FB42A; padding:6px; 
                                    border-radius:10px; font-size:12px; color:white;  margin-left:2%; margin-bottom:2%; text-align: center;">{{$anime_plan_to_watch_status_count}} Planning to watch</div>

            
                                <div class="col-lg-2 col-4" style="text-transform: capitalize; background:#935B6F; padding:6px; 
                                    border-radius:10px; font-size:12px; color:white;  margin-left:2%; margin-bottom:2%; text-align: center;">{{$anime_watched_status_count}} Watched </div>

                                    
                                <div class="col-lg-2 col-4" style="text-transform: capitalize; background:#221F18; padding:6px; 
                                    border-radius:10px; font-size:12px; color:white;  margin-left:2%; margin-bottom:2%; text-align: center;">{{$anime_dropped_status_count}} Dropped this </div>


                            </div>
            </div>
            <div>
                <h2 class="anime-detail-anime-synopsis mt-3">{{$anime_basic->english_title}} Synopsis</h2>
                    <p class="anime-detail-anime-des">
                    {{$anime_basic->synopsis}}
                    </p>

            </div>

         

                   

        </div>
    </div>
</div>



 <div class="container-fluid">
   

    <div class="container p-3 mt-3 anime-detail-anime-title-des-section">
        <div class="row">
            <div class="col-md-4 ">
                 

                
                
               
                <div>
                   <p class="anime-detail-below-cover-genere"> <b>Genres:</b> 
                   
                   <div class="container p-0">
                    <div class="row">
                    @if(isset($anime_genres) )
                  

                  @foreach($anime_genres as $anime_genres)
                    <div class="col-lg-5 col-5">

                        <p class="genres-detail-page">{{$anime_genres->genres}}</p>

                    </div>
                 @endforeach

                   @else

                   <span class="genres-detail-page">Not Updated!</span>

                  @endif
                 


                    
                        
                    </div>
                   </div>

                  
                   </p>
                   <p class="anime-detail-below-cover-genere"> <b>Producers:</b> 
                
                   @if(isset($anime_producers) )
                   @foreach($anime_producers as $anime_producers)
                        <span>| {{$anime_producers->producers}} </span>
                    @endforeach
                
                    @else
                    <span >Not Updated!</span>

                   @endif
                
                
                </p>

                <p class="anime-detail-below-cover-genere">
                    
                    <span><b>Ranked: #{{$anime_basic->rank}} | </b></span>
                    <span><b>Popularity: #{{$anime_basic->popularity}} | </b></span>


                </p>
                <p>
                    <small class="anime-detail-page-source-text">Source: <a href="https://myanimelist.net/" target="_blank">My Anime List</a></small>
                </p>
                <hr>


                
                </div>

                 
                <div>

                <p class="anime-detail-below-cover-genere"> 
                   
                   <div class="container p-0">
                    <div class="row">
                    

                   
                    <div class="col-lg-5 col-5">

                    <p class="anime-views-count"> <i class="fa fa-eye"></i> 

                        @if(isset($animeViews))
                            {{$animeViews->views}} 
                        @endif
                            views</p>

                    </div>
                  

                    <div class="col-lg-5 col-5">

                        <p class="anime-fav-count">
                                <i class="fa fa-heart"></i> 
                                @if(isset($count_anime_fav) > 0)
                               
                                {{$count_anime_fav}}

                                @else

                                    0

                                 @endif   

                        </p>

                    </div>
                  
                   
                 
                    </div>
                   </div>

                  
                   </p>
         
                
</div>
            </div>





            <div class="col-md-8 ">
                
                

                @if(isset($anime_basic->youtube_trailer))

                <div>
                    <h2 class="anime-detail-anime-trailer">{{$anime_basic->english_title}}  Trailer</h2>
                    <hr>
                </div>
               

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe style="width:100%; height:380px;" class="embed-responsive-item" src="{{$anime_basic->youtube_trailer}}" allowfullscreen></iframe>
                </div>
                

                @else
                <hr>
                  <div class="text-center" style="
                        padding:80px;
                        background-color: whitesmoke;
                        box-shadow: rgb(84, 34, 158) 0px 25px 20px -20px;
                        border-radius:15px;
                  ">
                    <h1>Novel Feast</h1>
                     <h2 >Read 5000+ <br> Web-Novels | Light Novels | Web Comics</h2>
                       <a href="https://novelfeast.com/" target="_blank">
                          <img src="https://novelfeast.com/assets/img/logo.png" width='120' alt="">
                          

                        </a>
                  </div>
                    @endif
                

            </div>
        </div>
    </div>

 </div>



 <div class="container p-4 mt-2">
    <div class="row ">
                    <div class="col-md-12 mt-5">
                      

                             <h2>Information </h2>
                            
                    </div>

                    <div class="col-md-2 col-5 anime-detail-info-grid">

                            <span class="anime-detail-info-grid-title">Type: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->type}}</span>

                    </div>



                    <div class="col-md-2 col-5 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Episodes: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->no_of_episodes}}</span>

                    </div>


                    <div class="col-md-2  col-8 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Status: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->status}}</span>

                    </div>


                    
                    <!-- <div class="col-md-3  col-5 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Aired: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->aired}}</span>

                    </div> -->


                    
                    <div class="col-md-2  col-5 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Season: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->season}}</span>

                    </div>


<!--                     
                    <div class="col-md-3  col-12 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Broadcast: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->broadcast}}</span>

                    </div> -->


                    
                    <div class="col-md-3  col-12 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Rating: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->rating}}</span>

                    </div>


                


                    <div class="col-md-2  col-7 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Duration: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->duration}}</span>

                    </div>


                   
                                     
                    <div class="col-md-3  col-6 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Source: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->source}}</span>

                    </div>               

    </div>
 </div>


 <!-- Reviews -->

 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Reviews</h2>
            <hr>
        </div>
    </div>


    <div class="row p-4">
    @if(count($anime_detail_review_card ) > 0)
        @foreach($anime_detail_review_card as $key => $anime_detail_review)
        <div class="col-lg-4 col-12 anime-detail-page-reviews-card">
            
            <div class="row">
                <div class="col-lg-4 col-3">
                    <div>
                    <img src='{{ URL::asset("images/user_images/{$anime_detail_review->user_avatar}") }}' 
                                                    class="rounded-circle" style="width: 40px; height:40px;"
                                                    alt="Avatar" />
                    </div>
          
                </div>

                <div class="col-lg-4 col-5">
                    <div>
                        <p>{{$anime_detail_review->user_name}} <br> <small>
                        {{  date('j \\ F Y', strtotime($anime_detail_review->created_at)) }}
                        </small></p>
                    </div>
          
                </div>

                
                <div class="col-lg-4 col-4">
                    <div>
                       <p>Story: <span class="anime-detail-review-card-story-ratng">{{$anime_detail_review->story}}</span></p>
                    </div>
          
                </div>

                <div class="col-lg-12 col-12">
                    <div>
                       <span class="anime-review-card-des">
                        
                       {!! Str::limit($anime_detail_review->review_text, 230) !!}

                       </span>
                    </div>
          
                </div>

                
            </div>
        </div>
    @endforeach

     @else
            <p class="">No Reviews Yet!</p>
   @endif


    </div>
 </div>

 <!-- Reviews -->

 <!-- streaming links -->

 <div class="container p-3">
    <div class="row">
        <hr class="mt-5">

                        <div class="col-md-10">

                                    <h2>Watch {{$anime_basic->english_title}} </h2>
                            
                        </div>


                        <div class="col-md-2">

                              <!-- <p class="view-all-text"><a href="">View all</a></p> -->
                            
                        </div>
  
    </div>

    <div class="row">
        
        @if(count($anime_streaming) > 0 )

          @foreach($anime_streaming as $anime_streaming)
          <div class="col-lg-2 col-4 anime-detail-info-grid mt-3">

            <a href="{{$anime_streaming->streaming_url}}" target="_blank">{{$anime_streaming->streaming_title}}</a>
            
            

          </div> 

          @endforeach

        @else
        
        <p>No Streaming Links Found!</p>
      

        @endif    
       
    </div>
 </div>


 <!-- streaming links -->


 <div class="container  p-3">
    <div class="row">
    <hr class="mt-5">

                        <div class="col-md-10">

                                    <h2>{{$anime_basic->english_title}} Characters </h2>
                            
                        </div>


                        <div class="col-md-2">

                              <!-- <p class="view-all-text"><a href="">View all</a></p> -->
                            
                        </div>


                  @if(count($anime_character) > 0)

                    @foreach($anime_character as $anime_character)
                                <div class="col-lg-3 col-12 anime-grid-list text-center">
                                        <div class="row characters-row-grid-anime-detail" >
                                            <div class="col-6">
                                                <a href="">
                                                    <img src="{{$anime_character->character_image}}"
                                                    alt="" class="anime-grid-list-characters-image">
                                                </a>
                                            </div>

                                            <div class="col-6">
                                                <a href="" class="text-decor">
                                                    <p class="anime-title-list-grid">
                                                    {{ Str::limit($anime_character->character_name, 50) }}
                                                        
                                                        <br>
                                                        <small class="anime-detail-characters-role">{{$anime_character->character_role}}</small>
                                                    </p>
                                                </a>
                                            </div>

                                        </div>
                                   


                                    
                                    

                                </div>
                        @endforeach

                        @else

                    <p>No Characters Found!</p>

                  @endif
                        

                        
                       


                   
    </div>
 </div>

 




 <div class="container  p-3">
    <div class="row">
              <hr class="mt-5">
                        <div class="col-md-10">
                       
                             <h2>{{$anime_basic->english_title}} Pictures </h2>
                            
                        </div>

                        <div class="col-md-2">

                             <!-- <p class="view-all-text"><a href="">View all</a></p> -->

                        </div>
            
                       @if(count($anime_pictures)  > 0)
                                        <br><br>
                                        <br>
                                @foreach($anime_pictures as $anime_pictures)

                                <div class="col-lg-2 col-6 mb-3">

                                    <a href="">
                                    <img src="{{$anime_pictures->anime_picture_url}}"
                                    alt="" class="anime-detail-pictures-list-image">
                                    </a>
                                </div>


                                @endforeach

                         @else
                         
                         <p>No Pictures Found!</p>


                       @endif
                     
                                                        
    </div>
 </div>

 

 
 <div class="container p-3 mb-5">
    <div class="row">
    <hr class="mt-5">
                        <div class="col-md-10 ">
                        
                             <h2>{{$anime_basic->english_title}} Recommendations </h2>
                            
                        </div>

                        <div class="col-md-2 ">
                        
                            <!-- <p class="view-all-text"><a href="">View all</a></p> -->
                       
                        </div>


                       @if(count($anime_recommendations))
                                @foreach($anime_recommendations  as $anime_recommendations)

                                <div class="col-lg-2 col-6 anime-grid-list mb-1">

                                        <a href="{{ route('animeDetail' , $anime_recommendations->anime_mal_id)  }}">
                                        <img src="{{$anime_recommendations->anime_picture}}"
                                        alt="" class="anime-grid-list-image">
                                        </a>

                                        <a href="" class="text-decor">
                                            <p class="anime-title-list-grid">{{$anime_recommendations->anime_title}}</p>
                                        </a>

                                </div>

                                @endforeach

                         @else

                         <p>No Recommendations yet!</p>
    
                       @endif

                                                
    </div>
 </div>



 
  
  
 @endsection
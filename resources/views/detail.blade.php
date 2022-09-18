@extends('main')

@section('content')
 
 <div class="container-fluid">
   

    <div class="container extra-padding-container py-5 my-5 anime-detail-anime-title-des-section">
        <div class="row">
            <div class="col-md-4 ">
                <div class="text-center">
                <img src="{{$anime_basic->anime_image}}"
             alt="" class="anime-detail-anime-cover-image">
                </div>

                <div class="text-center">
                    <h1 class="anime-detail-anime-title my-2">{{$anime_basic->english_title}}</h1>
                    <hr>
                </div>
                
               
                <div>
                   <p class="anime-detail-below-cover-genere"> <b>Genres:</b> 
                   
                   <div class="container p-0">
                    <div class="row">
                    @if(isset($anime_genres) )
                  

                  @foreach($anime_genres as $anime_genres)
                    <div class="col-lg-6 col-6">

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
                <p class="anime-detail-page-views"> <i class="fa fa-eye"></i> 

                @if(isset($animeViews))
                    {{$animeViews->views}} 
                @endif
                    views</p>
                </div>
            </div>


            <div class="col-md-8 ">
                <div>
                    <h1 class="anime-detail-anime-synopsis">Synopsis</h1>
                    <hr>
                </div>
                <div>
                    <p class="anime-detail-anime-des">
                    
                    {{$anime_basic->synopsis}}
                    </p>
                </div>

                @if(isset($anime_basic->youtube_trailer))

                <div>
                    <h1 class="anime-detail-anime-trailer my-5">Trailer</h1>
                    <hr>
                </div>
               

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe style="width:100%; height:420px;" class="embed-responsive-item" src="{{$anime_basic->youtube_trailer}}" allowfullscreen></iframe>
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



 <div class="conatiner extra-padding-container-anime-detail mt-5">
    <div class="row ">
                    <div class="col-md-12 mt-5">
                      

                             <h2>Information </h2>
                            
                    </div>

                    <div class="col-md-2 col-4 anime-detail-info-grid">

                            <span class="anime-detail-info-grid-title">Type: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->type}}</span>

                    </div>



                    <div class="col-md-2 col-4 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Episodes: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->no_of_episodes}}</span>

                    </div>


                    <div class="col-md-2  col-8 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Status: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->status}}</span>

                    </div>


                    
                    <div class="col-md-3  col-5 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Aired: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->aired}}</span>

                    </div>


                    
                    <div class="col-md-2  col-5 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Season: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->season}}</span>

                    </div>


                    
                    <div class="col-md-3  col-12 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Broadcast: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->broadcast}}</span>

                    </div>


                    
                    <div class="col-md-3  col-12 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Rating: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->rating}}</span>

                    </div>


                


                    <div class="col-md-2  col-7 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Duration: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->duration}}</span>

                    </div>


                   
                                     
                    <div class="col-md-2  col-4 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Source: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->source}}</span>

                    </div>               

    </div>
 </div>





 <div class="conatiner extra-padding-container-anime-detail">
    <div class="row">
    <hr class="mt-5">

                        <div class="col-md-10">

                                    <h2>Characters </h2>
                            
                        </div>


                        <div class="col-md-2">

                              <p class="view-all-text"><a href="">View all</a></p>
                            
                        </div>


                  @if(isset($anime_character))

                    @foreach($anime_character as $anime_character)
                                <div class="col-lg-2 col-4 anime-grid-list">

                                    <a href="">
                                    <img src="{{$anime_character->character_image}}"
                                    alt="" class="anime-grid-list-characters-image">
                                    </a>

                                    <a href="" class="text-decor">
                                        <p class="anime-title-list-grid">{{$anime_character->character_name}} 
                                            <br>
                                            <small class="anime-detail-characters-role">{{$anime_character->character_role}}</small>
                                        </p>
                                        
                                    </a>

                                </div>
                        @endforeach

                        @else

                    <p>No Characters Found!</p>

                  @endif
                        

                        
                       


                   
    </div>
 </div>

 

 <div class="conatiner extra-padding-container-anime-detail">
    <div class="row">
              <hr class="mt-5">
                        <div class="col-md-10">
                       
                             <h2>Pictures </h2>
                            
                        </div>

                        <div class="col-md-2">

                             <p class="view-all-text"><a href="">View all</a></p>

                        </div>
            
                       @if(isset($anime_pictures))

                                @foreach($anime_pictures as $anime_pictures)

                                <div class="col-lg-3 col-6 anime-grid-list">

                                    <a href="">
                                    <img src="{{$anime_pictures->anime_picture_url}}"
                                    alt="" class="anime-grid-list-image">
                                    </a>
                                </div>


                                @endforeach

                         @else
                         
                         <p>No Pictures Found!</p>


                       @endif
                     
                                                        
    </div>
 </div>

 

 
 <div class="conatiner extra-padding-container-anime-detail mb-5">
    <div class="row">
    <hr class="mt-5">
                        <div class="col-md-10 ">
                        
                             <h2>Recommendations </h2>
                            
                        </div>

                        <div class="col-md-2 ">
                        
                            <p class="view-all-text"><a href="">View all</a></p>
                       
                        </div>


                       @if(isset($anime_recommendations))
                                @foreach($anime_recommendations  as $anime_recommendations)

                                <div class="col-lg-2 col-6 anime-grid-list">

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
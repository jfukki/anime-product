@extends('main')

@section('content')
 
 <div class="container-fluid">
   

    <div class="container extra-padding-container py-5 my-5 anime-detail-anime-title-des-section">
        <div class="row">
            <div class="col-md-4">
                <div>
                <img src="{{$anime_basic->anime_image}}"
             alt="" class="anime-detail-anime-cover-image">
                </div>

                <div>
                    <h1 class="anime-detail-anime-title my-4">{{$anime_basic->english_title}}</h1>
                    <hr>
                </div>
                
               
                <div>
                   <p class="anime-detail-below-cover-genere"> <b>Genres:<br><br></b> 
                   

                   @if(collect($anime_genres)->isNotEmpty() )
                  

                   @foreach($anime_genres as $anime_genres)
                        <span class="genres-detail-page">{{$anime_genres->genres}}</span>
                    @endforeach

                    @else
                    <span class="genres-detail-page">Not Updated!</span>

                   @endif
                  


                   </p>
                   <p class="anime-detail-below-cover-genere"> <b>Producers:</b> 
                
                   @if(collect($anime_producers)->isNotEmpty() )
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
                <p class="anime-detail-page-views"> <i class="fa fa-eye"></i> {{$animeViews->views}} views</p>
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

                <div>
                    <h1 class="anime-detail-anime-trailer my-5">Trailer</h1>
                    <hr>
                </div>
               

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe style="width:100%; height:420px;" class="embed-responsive-item" src="{{$anime_basic->youtube_trailer}}" allowfullscreen></iframe>
                </div>
                

            </div>
        </div>
    </div>

 </div>



 <div class="conatiner extra-padding-container-anime-detail mt-5">
    <div class="row ">
                    <div class="col-md-12 mt-5">
                      

                             <h2>Information </h2>
                            
                    </div>

                    <div class="col-md-2 anime-detail-info-grid">

                            <span class="anime-detail-info-grid-title">Type: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->type}}</span>

                    </div>



                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Episodes: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->no_of_episodes}}</span>

                    </div>


                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Status: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->status}}</span>

                    </div>


                    
                    <div class="col-md-3 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Aired: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->aired}}</span>

                    </div>


                    
                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Season: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->season}}</span>

                    </div>


                    
                    <div class="col-md-3 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Broadcast: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->broadcast}}</span>

                    </div>


                    
                    <div class="col-md-3 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Rating: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->rating}}</span>

                    </div>


                


                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Duration: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->duration}}</span>

                    </div>


                   
                                     
                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Source: </span> <span class="anime-detail-info-grid-text">{{$anime_basic->source}}</span>

                    </div>


                   
                   
                   

    </div>
 </div>






 


 
  
  
 @endsection
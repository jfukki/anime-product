@extends('main')

@section('content')
 
 <div class="container-fluid">
   

    <div class="container extra-padding-container py-5 my-5 anime-detail-anime-title-des-section">
        <div class="row">
            <div class="col-md-4">
                <div>
                <img src="{{$data['images']['jpg']['large_image_url']}}"
             alt="" class="anime-detail-anime-cover-image">
                </div>

                <div>
                    <h1 class="anime-detail-anime-title my-4">{{$data['title_english']}}</h1>
                    <hr>
                </div>
                
               
                <div>
                   <p class="anime-detail-below-cover-genere"> <b>Genres:<br><br></b> 
                   

                   @if(collect($data['genres'])->isNotEmpty())
                        @if(is_array($data['genres']) || is_object($data['genres']))
                        @foreach($data['genres'] as $genres)


                       
                            
                               <span class="genres-detail-page"> {{$genres['name']}} </span>
                           

            
                        @endforeach
                        @endif
                        @endif


                   </p>
                   <p class="anime-detail-below-cover-genere"> <b>Producers:</b> 
                
                
                   @if(collect($data['producers'])->isNotEmpty())
                        @if(is_array($data['producers']) || is_object($data['producers']))
                        @foreach($data['producers'] as $producers)


                       
                            
                                {{$producers['name']}} |
                           

            
                        @endforeach
                        @endif
                        @endif
                
                
                </p>

                <p class="anime-detail-below-cover-genere">
                    
                    <span><b>Ranked: #{{$data['rank']}} | </b></span>
                    <span><b>Popularity: #{{$data['popularity']}} | </b></span>
                    <span><b>Members: {{$data['members']}} <br></b></span> 


                </p>
                <p>
                    <small class="anime-detail-page-source-text">Source: <a href="https://myanimelist.net/" target="_blank">My Anime List</a></small>
                </p>
                <hr>
                <p class="anime-detail-page-views">{{$animeViews->views}} views</p>
                </div>
            </div>


            <div class="col-md-8 ">
                <div>
                    <h1 class="anime-detail-anime-synopsis">Synopsis</h1>
                    <hr>
                </div>
                <div>
                    <p class="anime-detail-anime-des">
                    
                    {{$data['synopsis']}}
                    </p>
                </div>

                <div>
                    <h1 class="anime-detail-anime-trailer my-5">Trailer</h1>
                    <hr>
                </div>
               

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe style="width:100%; height:420px;" class="embed-responsive-item" src="{{$data['trailer']['embed_url']}}" allowfullscreen></iframe>
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

                            <span class="anime-detail-info-grid-title">Type: </span> <span class="anime-detail-info-grid-text">{{$data['type']}}</span>

                    </div>



                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Episodes: </span> <span class="anime-detail-info-grid-text">{{$data['episodes']}}</span>

                    </div>


                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Status: </span> <span class="anime-detail-info-grid-text">{{$data['status']}}</span>

                    </div>


                    
                    <div class="col-md-3 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Aired: </span> <span class="anime-detail-info-grid-text">{{$data['aired']['string']}}</span>

                    </div>


                    
                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Season: </span> <span class="anime-detail-info-grid-text">{{$data['season']}}</span>

                    </div>


                    
                    <div class="col-md-3 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Broadcast: </span> <span class="anime-detail-info-grid-text">{{$data['broadcast']['string']}}</span>

                    </div>


                    
                    <div class="col-md-3 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Rating: </span> <span class="anime-detail-info-grid-text">{{$data['rating']}}</span>

                    </div>


                


                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Duration: </span> <span class="anime-detail-info-grid-text">{{$data['duration']}}</span>

                    </div>


                   
                                     
                    <div class="col-md-2 anime-detail-info-grid">

                        <span class="anime-detail-info-grid-title">Source: </span> <span class="anime-detail-info-grid-text">{{$data['source']}}</span>

                    </div>


                   
                   
                   

    </div>
 </div>




 <div class="conatiner extra-padding-container-anime-detail">
    <div class="row">
                        <div class="col-md-12">
                        <hr class="mt-5">
                             <h2>Watch {{$data['titles'][0]['title']}} | {{$data['type']}}  </h2>
                            
                        </div>


                       @if(collect($episodes)->isNotEmpty())

                           @if(is_array($episodes) || is_object($episodes))
                                @foreach($episodes as $episode)

                                    <div class="col-md-2 anime-grid-list">

                                        <a href="{{$episode['url']}}" target="_blank">
                                        <img src="{{$episode['images']['jpg']['image_url']}}"
                                        alt="" class="anime-grid-list-image">
                                        </a>

                                        <a href="{{$episode['url']}}" class="text-decor" target="_blank">
                                            <p class="anime-title-list-grid">{{$episode['episode']}}: {{$episode['title']}}</p>
                                               <br>
                                        </a>
                                        

                                    </div>

                                @endforeach

                           @endif

                        @else

                        <h4>Videos not found</h4>


                       @endif
                       


                   
    </div>
 </div>







 <div class="conatiner extra-padding-container-anime-detail">
    <div class="row">
                        <div class="col-md-12">
                        <hr class="mt-5">
                             <h2>Characters </h2>
                            
                        </div>


                        @foreach($characters as $character)

                        <div class="col-md-2 anime-grid-list">

                            <a href="">
                            <img src="{{$character['character']['images']['jpg']['image_url']}}"
                            alt="" class="anime-grid-list-characters-image">
                            </a>

                            <a href="" class="text-decor">
                                <p class="anime-title-list-grid">{{$character['character']['name']}}</p>
                            </a>

                        </div>

                        @endforeach
                       


                   
    </div>
 </div>

 




 <div class="conatiner extra-padding-container-anime-detail">
    <div class="row">
                        <div class="col-md-12">
                        <hr class="mt-5">
                             <h2>Pictures </h2>
                            
                        </div>


                        @if(collect($pictures)->isNotEmpty())
                        @if(is_array($pictures) || is_object($pictures))
                        @foreach($pictures as $pictures)
                        <div class="col-md-2 anime-grid-list">

                           <a href="">
                            <img src="{{$pictures['jpg']['large_image_url']}}"
                            alt="" class="anime-grid-list-image">
                            </a>
                         </div>
                        @endforeach

                        @endif

                        @else

                        <h4>not found</h4>


                        @endif
                                                        
    </div>
 </div>

 
 
 <div class="conatiner extra-padding-container-anime-detail mb-5">
    <div class="row">
                        <div class="col-md-12">
                        <hr class="mt-5">
                             <h2>Recommendations </h2>
                            
                        </div>
                        @if(collect($recommendations)->isNotEmpty())
                        @if(is_array($recommendations) || is_object($recommendations))
                        @foreach($recommendations as $recommendations)


                        <div class="col-md-2 anime-grid-list">

                            <a href="{{ route('animeDetail' , $recommendations['entry']['mal_id'])  }}">
                            <img src="{{$recommendations['entry']['images']['jpg']['image_url']}}"
                            alt="" class="anime-grid-list-image">
                            </a>

                            <a href="" class="text-decor">
                                <p class="anime-title-list-grid">{{$recommendations['entry']['title']}}</p>
                            </a>

                        </div>
                        @endforeach
                        @endif

                        @else

                        <h4>not found</h4>


                        @endif
                                                
    </div>
 </div>

 
  
  
 @endsection
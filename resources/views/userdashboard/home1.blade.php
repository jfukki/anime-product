@extends('main')

@section('content')

<!-- review featured banner image -->


<div class="container  ">
    <div class="row">
      <div class="col-lg-12 d-none d-md-block mt-5 ">
      @if(isset($user->user_banner))

        <img  class="user-detail-page-featured-banner" 
            src='{{ URL::asset("images/user_images/{$user->user_banner}") }}' 
            alt=""  class="img-fluid" style="
            
                        background-color: #242538;
                        background-repeat: no-repeat;
                        background-size: cover;
                        max-width: 100%;
                        
            
            ">

           @else
            <h2>Pleaes upload banner!!</h2> 
            <img src='https://media.giphy.com/avatars/Kawaiichxuu/xc3QyjNBbopp.gif' style="width: 120px; height:auto;"  alt=""  >

           @endif 
      </div>

        <div class="col-md-2 mt-4">

            <div class="avatar-container">

                @if(isset($user->user_avatar))
            
                    <img src='{{ URL::asset("images/user_images/{$user->user_avatar}") }}' alt="">
                @else
                 <p>Please upload your Avatar</p>
                 <img src='https://media.giphy.com/avatars/Kawaiichxuu/xc3QyjNBbopp.gif' style="width: 120px; height:auto;"  alt=""  >

                @endif
            </div>

        </div>

        <div class="col-md-6">
           <div class="user-tite-container">

                <h2>{{auth()->user()->name}}</h2>

                @if(isset($user->about))
            
                <p> {{$user->about}}</p>

                @else

                <h2>Please Fill Your Bio.</h2>


                @endif
            </div>
        </div>
    </div>

</div>

<!-- review featured banner image -->


<!-- review cards section -->
<div class="container p-5  ">
    <div class="row">
        <div class="col-md-2 user-profile-card-s">
            <span class="review-detail-card-value">
                <i class="fa fa-heart" style="color:white"></i>
            </span>
            <br>
            <span class="review-detail-card-title" style="color:white">My Heart List</span>
        </div>

        <div class="col-md-2 user-profile-card">
            <span class="review-detail-card-value">
            <i class="fa fa-pencil"></i>

            </span>
            <br>
            <span class="review-detail-card-title">My Reviews</span>
        </div>

       
      

        <a href="{{route('editBannerAavatar', auth()->user()->id)}}" class="col-md-2 user-profile-card">
            <span class="review-detail-card-value">

                <i class="fa fa-image"></i>

            </span>
            <br>
            <span class="review-detail-card-title">Banner & Bio</span>
        </a>

        
        <a href="" class="col-md-2 user-profile-card">
            <span class="review-detail-card-value">

                <i class="fa fa-globe"></i>

            </span>
            <br>
            <span class="review-detail-card-title">Recent History</span>
        </a>

        
        <a href="{{route('user-edit' , auth()->user()->id)}}" class="col-md-2 user-profile-card">
            <span class="review-detail-card-value">
            <i class="fa fa-gear"></i>

            </span>
            <br>
            <span class="review-detail-card-title">Personal Settings</span>
        </a>


    </div>
</div>


<!-- User Anime Stats List -->

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>
                Your Anime Stats list
            </h2>
            <hr>

        </div>
    </div>

    

    <div class="row">
        <div class="col-lg-8">
        <table class="table">
  <thead>
    <tr>
       
       
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>
        <div class="user-profile-watching-badge"></div> 
      </td>
      <td>
      <p class="user-profile-badge-title"><a href="">Watching</a></p>
      </td>
      <td>{{$anime_watching_status_count}}</td>
    </tr>
    <tr>
    <td>
        <div class="user-profile-watched-badge"></div> 
      </td>
      <td>
      <p class="user-profile-badge-title"><a href="">Watched</a></p>
      </td>
      <td>{{$anime_watched_status_count}}</td>
       
    </tr>
    <tr>
    <td>
        <div class="user-profile-planing-badge"></div> 
      </td>
      <td>
      <p class="user-profile-badge-title"><a href="">Plan to Watch</a></p>
      </td>
      <td>{{$anime_plan_to_watch_status_count}}</td>
    </tr>


    <tr>
    <td>
        <div class="user-profile-dropped-badge"></div> 
      </td>
      <td>
      <p class="user-profile-badge-title"><a href="">Dropped</a></p>
      </td>
      <td>{{$anime_dropped_status_count}}</td>
    </tr>


  </tbody>
</table>
        </div>

        <div class="col-lg-4">
        meme here
    </div>



    </div>
    
   

    
</div>



<!-- User Anime Stats List -->



<!-- Watching List -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Your Watching Listing</h2>
            <hr>
        </div>

 


                    @if(isset($user_anime_watch_list) )

                        @if(count($user_anime_watch_list) > 0 )
                                @foreach($user_anime_watch_list  as $user_watch_list)

                                <div class="col-lg-2 col-4 mb-3 mt-2">

                                        <a href="{{ route('animeDetail' , $user_watch_list->anime_id)  }}">
                                        <img src="{{$user_watch_list->anime_image}}"
                                        alt="" class="anime-grid-list-image">
                                        </a>

                                        <a href="" class="text-decor">
                                            <p class="anime-title-list-grid">
                                                @if(isset($user_watch_list->english_title))
                                                    {{ Str::limit($user_watch_list->english_title, 25) }}
                                                @else
                                                
                                                {{ Str::limit($user_watch_list->japanese_title, 25) }}
                                                
                                                
                                                @endif

                                        
                                        </p>
                                        </a>

                                </div>

                                @endforeach

                         @else

                         <p class="text-center">No Anime to List yet!</p>
    
                       @endif
                    @endif



        </div>
    </div>
</div>
<!-- Watching List -->



<!-- Planning List -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Your Planning Listing</h2>
            <hr>
        </div>
                 @if(isset($user_anime_watch_list) )
                          @if(count($user_anime_planing_list) > 0 )
                                @foreach($user_anime_planing_list  as $user_watch_list)

                                <div class="col-lg-2 col-4 mb-3 mt-2">

                                        <a href="{{ route('animeDetail' , $user_watch_list->anime_id)  }}">
                                        <img src="{{$user_watch_list->anime_image}}"
                                        alt="" class="anime-grid-list-image">
                                        </a>

                                        <a href="" class="text-decor">
                                            <p class="anime-title-list-grid">

                                            @if(isset($user_watch_list->english_title))
                                                    {{ Str::limit($user_watch_list->english_title, 25) }}
                                                @else
                                                
                                                {{ Str::limit($user_watch_list->japanese_title, 25) }}
                                                
                                                
                                                @endif

                                            </p>
                                        </a>

                                </div>

                                @endforeach

                         @else

                         <p class="text-center">No Anime to List yet!</p>
    
                       @endif

                       @endif


        </div>
    </div>
</div>
<!-- Planning List -->




<!-- Watched List -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Your Watched Listing</h2>
            <hr>
        </div>

          @if(isset($user_anime_watch_list) )
                          @if(count($user_anime_watched_list) > 0 )
                                @foreach($user_anime_watched_list  as $user_watch_list)

                                <div class="col-lg-2 col-4 mb-3 mt-2">

                                        <a href="{{ route('animeDetail' , $user_watch_list->anime_id)  }}">
                                        <img src="{{$user_watch_list->anime_image}}"
                                        alt="" class="anime-grid-list-image">
                                        </a>

                                        <a href="" class="text-decor">
                                            <p class="anime-title-list-grid">

                                               @if(isset($user_watch_list->english_title))
                                                    {{ Str::limit($user_watch_list->english_title, 25) }}
                                                @else
                                                
                                                {{ Str::limit($user_watch_list->japanese_title, 25) }}
                                                
                                                
                                                @endif

                                            </p>
                                        </a>

                                </div>

                                @endforeach

                         @else

                         <p class="text-center">No Anime to List yet!</p>
    
                       @endif

                       @endif


        </div>
    </div>
</div>
<!-- Watched List -->



<!-- Dropped List -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Your Dropped Listing</h2>
            <hr>
        </div>
                 @if(isset($user_anime_watch_list) )
                          @if(count($user_anime_dropped_list) > 0 )
                                @foreach($user_anime_dropped_list  as $user_anime_dropped)

                                <div class="col-lg-2 col-4 mb-3 mt-2">

                                        <a href="{{ route('animeDetail' , $user_anime_dropped->anime_id)  }}">
                                        <img src="{{$user_anime_dropped->anime_image}}"
                                        alt="" class="anime-grid-list-image">
                                        </a>

                                        <a href="" class="text-decor">
                                            <p class="anime-title-list-grid">

                                            @if(isset($user_anime_dropped->english_title))
                                                    {{ Str::limit($user_anime_dropped->english_title, 25) }}
                                                @else
                                                
                                                {{ Str::limit($user_anime_dropped->japanese_title, 25) }}
                                                
                                                
                                                @endif

                                            </p>
                                        </a>

                                </div>

                                @endforeach

                         @else

                         <p class="text-center">No Anime to List yet!</p>
    
                       @endif

                       @endif


        </div>
    </div>
</div>
<!-- Dropped List -->

<!-- review cards section -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <h2>Your Heart List</h2>
            <hr>

        </div>

            @if(isset($user_fav_anime_list))

           
            @if(count($user_fav_anime_list) > 0)


            @foreach($user_fav_anime_list as $list)


            <div class="col-md-4 col-12 p-4">

<a href="{{ route('animeDetail' , $list->anime_id)  }}">



<div class="card anime-review-list-card" style="width:20rem;">
        <img src="{{$list->anime_image}}"
        class="card-img-top" alt="..."  style="height:480px;">
        <div class="card-body">
            <h5 class="card-title "><a class="review-card-title">
            {{ Str::limit($list->japanese_title, 100) }}</a></h5>
            <p class="card-text review-card-description">
            
                    {{ Str::limit($list->synopsis, 90) }}
            
            </p>
        </div>
        <ul class="list-group list-group-flush">
            
                
            <li class="list-group-item">
                
            <span class="review-card-like-thumbsup">
            <i class="fa fa-eye"></i> {{$list->views}}
            </span>
        
            
            <span class="review-card-like-thumbsdown">
            <i class="fa fa-bar-chart"></i> {{$list->popularity}}
            </span>
        
            </li>
            
        </ul>
        
</div>

</a>


</div>



            @endforeach

            @else
                <div class="row">
                   <p class="text-center">No Anime to List yet!</p>
                </div>
            @endif

            @else
            
            
          <img src="https://media2.giphy.com/media/8L0Pky6C83SzkzU55a/200w.gif?cid=82a1493bjun4l3r163mjwpt0s25mx355kt4j51mlaqdxi9ri&rid=200w.gif&ct=g"
          style="width:240px; !important" 
          alt="">

            @endif




    </div>
</div>

 

@endsection
@extends('main')

@section('content')

<!-- review featured banner image -->


<div class="container  ">
    <div class="row">
      <div class="col-lg-12 d-none d-md-block mt-5 ">
      @if(isset($user->user_avatar))

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
                @if($user->about)
            
                <p> {{$user->about}}</p>

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

       
        <a href="{{route('user-edit' , auth()->user()->id)}}" class="col-md-2 user-profile-card">
            <span class="review-detail-card-value">
            <i class="fa fa-gear"></i>

            </span>
            <br>
            <span class="review-detail-card-title">Personal Settings</span>
        </a>

        <a href="{{route('editBannerAavatar', auth()->user()->id)}}" class="col-md-2 user-profile-card">
            <span class="review-detail-card-value">

                <i class="fa fa-image"></i>

            </span>
            <br>
            <span class="review-detail-card-title">Banner & Bio</span>
        </a>

        

    </div>
</div>
<!-- review cards section -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <h2>Your Heart List</h2>
            <hr>

        </div>


            @if(count($user_fav_anime_list) > 0)


            @foreach($user_fav_anime_list as $list)


            <div class="col-md-4 col-12 p-4">

<a href="{{ route('animeDetail' , $list->anime_id)  }}">



<div class="card anime-review-list-card" style="width:20rem;">
        <img src="{{$list->anime_image}}"
        class="card-img-top" alt="..."  style="height:480px;">
        <div class="card-body">
            <h5 class="card-title "><a href="{{route('reviewDeail')}}" class="review-card-title">
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
                <p>Please Add To Your List!</p>
                </div>
            @endif



    </div>
</div>

 

@endsection
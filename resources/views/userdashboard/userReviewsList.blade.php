@extends('main')
@section('meta-description', 'Anime Recommendations, Anime Episodes, Anime wishlist, Anime track, Anime wallpapers, Famous Anime Characters & Much More')
@section('meta-keywords', 'anime, anime recommendations, anime record, anime track, anime characters, upcoming anime, popular anime')

@section('title', 'Anime Review, Recommendations & Much More')


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
           
            <!-- <h2>Pleaes upload banner!!</h2>  -->

            <img class="user-detail-page-featured-banner"  src='{{ URL::asset("images/update_me.png") }}' class="img-fluid"   alt="">

            

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

        <a href="{{route('userReviewList')}}" class="col-md-2 user-profile-card">
            
            <span class="review-detail-card-value">
            <i class="fa fa-pencil"></i>

            </span>
            <br>
            <span class="review-detail-card-title">My Reviews</span>
        </a>

       
      

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
<!-- review cards section -->


<div class="container  mb-5" style="margin-top:0%">



<div class="row">

        <div class="col-lg-12 d-none d-md-block">
            <h2>Total Reviews: {{$reviews_count}}</h2>
            <hr>
        </div>
 

                @if(count($anime_reviews) > 0)


                    @foreach($anime_reviews as $anime_review)

                    <div class="col-lg-4 col-12 mb-5  mt-2">
                    
                        <div class=" review-list-home-row"    >

                                         <img class="image" src="{{$anime_review->anime_image}}" alt="" />

                                            <h2 class="review-card-title-test">
                                              <a href="{{route('reviewDeail' , $anime_review->id)}}" style="text-decoration:none !important; color: white "> 
                                               {{Str::limit($anime_review->review_title, 40)}}
                                            </a>
                                            </h2>
                                            <div class="review-card-description-test" > 
                                            {!! Str::limit($anime_review->review_text, 80) !!}
                                            </div>
                                            <br>
                                            <br>

                                        <span class="review-card-username-test"> 
                                                <img src='{{ URL::asset("images/user_images/{$anime_review->user_avatar}") }}' 
                                                class="rounded-circle" style="width: 57px; height:57px;"
                                                alt="Avatar" />
                                                {{$anime_review->user_name}}
                                        </span> 
                                        <br> 
                                        <small class="review-card-anime-title-bottom-test">
                                                
                                            @if($anime_review->english_title == null)
                
                                              <a href="{{route('reviewDeail' , $anime_review->id)}}" style="text-decoration:none !important; color: #54229E ">
                                                         {!! Str::limit($anime_review->japanese_title, 40) !!}
                                              </a>

                                                 @else

                                                <a href="{{route('reviewDeail' , $anime_review->id)}}" style="text-decoration:none !important; color: #54229E ">
                                                     
                                            {!! Str::limit($anime_review->english_title, 40) !!}
                                                    </a>

                                            @endif

                                        </small>

                        </div>
                  </div>

                    @endforeach

                    <!-- {{$anime_reviews->links()}} -->
                    
                    @else
                    
                    <div class="col-md-4">
                        <p   >No reviews yet!</p>
                    </div>
            
                @endif
    
</div>
</div>

@endsection

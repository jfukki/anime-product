@extends('main')
@section('meta-description', 'Anime Recommendations, Anime Episodes, Anime wishlist, Anime track, Anime wallpapers, Famous Anime Characters & Much More')
@section('meta-keywords', 'anime, anime recommendations, anime record, anime track, anime characters, upcoming anime, popular anime')

@section('title', 'Anime Recommendations & Much More')


@section('content')


<!-- Main Banner -->


<div class="container ">
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


<!-- Main Banner -->


<!-- Recent users -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-bg-homepage">Thank you for joining us</h2>
            <hr>
        </div>
    </div>

    <div class="row p-2">


            @if(count($new_users) > 0)
                    @foreach($new_users as $new_user)

                    <div class="col-lg-2 col-6 text-center">
                        <a href="">
                                <img src='{{ URL::asset("images/user_images/{$new_user->user_avatar}") }}' 
                                    class="rounded-circle" style="
                                        width: 91px;
                                        height: 90px;
                                        border: solid 3px #a66ee5;
                                        "
                                    alt="Avatar" />
                        </a>

                        <p class="new-user-name-grid"> 
                            
                            {{$new_user->name}}

                        </p>
                    </div>

                    @endforeach

            @else

                    <p class="text-center">No users yet!! Feeling SAD :/ </p>

             @endif 



    </div>
</div>

<!-- Recent users -->


<!-- Recent Reviews -->


<div class="container mt-5 ">
    <div class="row">
        <div class="col-lg-10 col-8">
            <h2 class="title-bg-homepage">Recent Reviews</h2>
           
        </div>

        <!-- <div class="col-lg-2 col-4">
            <a href="" class="view-all-text">View All</a>
        </div> -->


    </div>

    <div class="col-lg-12">
        <hr>
        </div>

        
        @include('components.reviewList')


</div>


<!-- Recent Reviews -->


<!-- Top Ranked Anime -->



<div class="container mt-5 ">
    <div class="row">
        <div class="col-lg-10 col-8">
            <h2 class="title-bg-homepage">All Time Ranked Anime</h2>
           
        </div>

        <!-- <div class="col-lg-2 col-4">
            <a href="" class="view-all-text">View All</a>
        </div> -->


    </div>

    <div class="col-lg-12">
        <hr>
        </div>

        @include('components.rankAnime')


</div>

     
  
<!-- Top Ranked Anime -->
 



<!-- Popular Anime -->



<div class="container mt-5 ">
    <div class="row">
        <div class="col-lg-10 col-7">
            <h2 class="title-bg-homepage">Popular Anime</h2>
         
        </div>

        <!-- <div class="col-lg-2  col-2">
            <a href="" class="view-all-text">View All</a>
        </div> -->

        <div class="col-lg-12">
        <hr>
        </div>

    </div>

    @include('components.popularAnime')



</div>

     
  
<!-- Popular Anime -->
 
      


<!-- Horror Anime -->



<div class="container mt-5 " >
    <div class="row">
        <div class="col-lg-10 col-7">
            <h2 class="title-bg-homepage">Horror Anime</h2>
           
        </div>

        <!-- <div class="col-lg-2  col-2">
            <a href="" class="view-all-text">View All</a>
        </div> -->
        <div class="col-lg-12">
        <hr>
        </div>

    </div>

    @include('components.horrorAnime')



</div>

     
  
<!-- Horror Anime -->

@endsection
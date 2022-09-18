@extends('main')

@section('content')


<!-- Main Banner -->


<div class="container">
    <div class="row home-main-section">

            <div class="col-lg-8">
                <h1>Discover Anime.</h1>
                <h2>For Fans, By Fans</h2>
            </div>
      


        <div class="col-lg-4 ">
             <p class="home-main-section-text">Anime Recommendations, Wishlist, Anime Track, Reviews, Forum & Much More!</p>
        </div>

    </div>

</div>

<!-- Main Banner -->


<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10">
            <h2>Popular Anime</h2>
        </div>

        <div class="col-lg-2 ">
            <a href="" class="view-all-text">View All</a>
        </div>


    </div>

    @include('components.popularAnime')



</div>




     
  
 
    

@endsection
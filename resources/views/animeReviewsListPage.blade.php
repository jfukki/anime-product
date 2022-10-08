@extends('main')
@section('meta-description', 'Anime Recommendations, Anime Episodes, Anime wishlist, Anime track, Anime wallpapers, Famous Anime Characters & Much More')
@section('meta-keywords', 'anime, anime recommendations, anime record, anime track, anime characters, upcoming anime, popular anime')

@section('title', 'Anime Review, Recommendations & Much More')


@section('content')



<!-- review featured banner image -->

<div class="container-fluid mt-5 mb-5">
    
            <div class="row img-row">
               

                  <img src="{{$anime_detail->anime_image}}" alt="" />
        
                
                  <div class="small-image col-lg-6">
                        <div class="position-img">
            <a href="{{ route('animeDetail' , $anime_detail->anime_id)  }}">
                              <img src="{{$anime_detail->anime_image}}" alt="" />
            </a>
                        </div>
                        <div class="text-cente">
                              <h5 class="title">
                                    <a href="{{ route('animeDetail' , $anime_detail->anime_id)  }}">
                                    {{$anime_detail->english_title}} <br> <hr>
                                    {{$anime_detail->japanese_title}}
                                    
                              </a>
                            
                            </h5>
                              <p class="ranked-review-detail">Ranked: #{{$anime_detail->rank}} </p>
                    </div>

                    

                  </div>

                   

            </div>

</div>

<!-- review featured banner image -->
 

<!-- Reviews Listing Grid -->

@include('components.animeReviewsListing')

<!-- Reviews Listing Grid -->



@endsection
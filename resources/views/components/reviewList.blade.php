 

<div class="container">
    <div class="row">

     

    @if(count($anime_reviews) > 0)


        @foreach($anime_reviews as $anime_review)

        <div class="col-lg-4 col-12 mb-5  mt-2 zoom">
        
            <a href=" {{route('animeReviewsListing', $anime_review->anime_id)}}">

            <div class=" review-list-home-row"    >

                <img class="image" src="{{$anime_review->anime_image}}" alt="" />

                <h2 class="review-card-title-test">
                    <a href="{{route('animeReviewsListing', $anime_review->anime_id)}}" style="text-decoration:none !important; color: white "> 
                    {{Str::limit($anime_review->review_title, 40)}}
                </a>
                </h2>
                <div class="review-card-description-test" > 
                {!! Str::limit($anime_review->review_text, 130) !!}
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
                
                    <a href="{{route('animeReviewsListing', $anime_review->anime_id)}}" style="text-decoration:none !important; color: #54229E ">
                                {!! Str::limit($anime_review->japanese_title, 40) !!}
                    </a>

                        @else

                    <a href="{{route('animeReviewsListing', $anime_review->anime_id)}}" style="text-decoration:none !important; color: #54229E ">
                            
                {!! Str::limit($anime_review->english_title, 40) !!}
                        </a>

                @endif

                </small>

                </div>


                          </a>
                      </div>
 
                        @endforeach
                        
                        @else
                        
                        <div class="col-md-4">
                            <p   >No reviews yet!</p>
                        </div>
                
                    @endif
        
    </div>
</div>
 
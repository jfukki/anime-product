<div class="container extra-padding-container">
    <div class="row ">

    @if(count($anime_reviews) > 0)


    @foreach($anime_reviews as $anime_review)
        <div class="col-md-4 col-12 mb-5">

                <div class="card anime-review-list-card" >
                        <img src="{{$anime_review->anime_image}}"
                        class="card-img-top img-fluid" alt="..."  >
                        <div class="card-body">
                            <h5 class="card-title "><a href="{{route('reviewDeail')}}" class="review-card-title">
                                {{$anime_review->review_title}}
                            </a></h5>
                            <p class="card-text review-card-description">
                                
                                   {{ Str::limit($anime_review->review_text, 120) }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <img src='{{ URL::asset("images/user_images/{$anime_review->user_avatar}") }}' 
                                class="rounded-circle" style="width: 60px; height:60px;"
                                alt="Avatar" />
                                - <span class="review-card-username">{{$anime_review->user_name}}</span> </li>
                                
                            <li class="list-group-item">
                                
                            <span class="review-card-like-thumbsup">
                            <i class="fa fa-thumbs-up"></i> 56
                            </span>
                        
                            
                            <span class="review-card-like-thumbsdown">
                            <i class="fa fa-thumbs-down"></i> 7856
                            </span>
                        
                            </li>
                            
                        </ul>
                        
                </div>


        </div>

        @endforeach
        
       @else
       
        <div class="col-md-4">
            <p   >No reviews yet!</p>
        </div>

    @endif

        
    </div>
</div>
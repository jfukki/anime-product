 

<div class="container">
    <div class="row">

    @if(count($anime_reviews) > 0)


        @foreach($anime_reviews as $anime_review)

        <div class="col-lg-4 col-12 mb-5" >
                            
                    <div class="review-card-list">

                    <h2 class="review-card-title">
                        <a href="{{route('reviewDeail' ,  $anime_review->id )}}">{{Str::limit($anime_review->review_title, 40)}}</a>
                    </h2>
                                <!-- <p class="review-card-description" > {{ Str::limit($anime_review->review_text, 180) }}</p> -->
                                <div class="review-card-description" > {!! Str::limit($anime_review->review_text, 180) !!} </div>
<br>
<br>

                               <span class="review-card-username"> 
                                    <img src='{{ URL::asset("images/user_images/{$anime_review->user_avatar}") }}' 
                                    class="rounded-circle" style="width: 57px; height:57px;"
                                    alt="Avatar" />
                                    {{$anime_review->user_name}}
                               </span> <br> <small class="review-card-anime-title-bottom">
                                    
                                @if($anime_review->english_title == null)
    
                                    {{$anime_review->japanese_title}}

                                    @else

                                    {{$anime_review->english_title}}

                                @endif
                                
                                </small>
                                     
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
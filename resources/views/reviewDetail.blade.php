@extends('main')

@section('content')
 

<!-- review featured banner image -->

<div class="container-fluid mt-5">
    
            <div class="row img-row">
               

                    <img src="{{$anime_detail->anime_image}}" alt="" />
        
                
                  <div class="small-image col-lg-6">
                        <div class="position-img">
                              <img src="{{$anime_detail->anime_image}}" alt="" />
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
 



<!-- review cards section -->
 
<div class="d-block d-md-none" style="margin-top:26%;"  >
    <br>
</div>
<div class="container extra-padding-container review-rating-cards-container ">
    <div class="row text-center">
        <div class="col-md-2 col-5 review-detail-page-cards">
            <span class="review-detail-card-value">
                {{$anime_review_detail->story}}/9
            </span>
            <br>
            <span class="review-detail-card-title">Story</span>
        </div>

        <div class="col-md-2 col-5 review-detail-page-cards">
            <span class="review-detail-card-value">
            {{$anime_review_detail->animation}}/10
            </span>
            <br>
            <span class="review-detail-card-title">Animation</span>
        </div>

        <div class="col-md-2 col-5 review-detail-page-cards">
            <span class="review-detail-card-value">
            {{$anime_review_detail->characters}}/10
            </span>
            <br>
            <span class="review-detail-card-title">Characters</span>
        </div>

        <div class="col-md-2 col-5 review-detail-page-cards">
            <span class="review-detail-card-value">
            {{$anime_review_detail->music}}/10
            </span>
            <br>
            <span class="review-detail-card-title">Sound/Music</span>
        </div>

        <!-- <div class="col-md-2 review-detail-page-cards">
            <span class="review-detail-card-value">
                9.9/10
            </span>
            <br>
            <span class="review-detail-card-title">Overall</span>
        </div> -->

        

    </div>
</div>
<!-- review cards section -->

<!-- review section -->

<div class="container review-section extra-padding-container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="review-section-title">
			    {{$anime_review_detail->review_title}}
            </h1>
            <h5 class="review-section-username">    
			    A review by {{$anime_review_detail->user_name}}
		    </h5>

            <div>
                <p>
                {!!$anime_review_detail->review_text!!}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- review section -->

<!-- likes section -->

<div class="container mt-5 mb-5 extra-padding-container">
    <div class="row">
        <div class="col-md-5"></div>

        <div class="col-md-2 text-center review-detail-likes-section">
        <li class="list-group-item">
                                
                                <span class="review-card-like-thumbsup">
                                <i class="fa fa-thumbs-up"></i> 56
                                </span>
                            
                                
                                <span class="review-card-like-thumbsdown">
                                <i class="fa fa-thumbs-down"></i> 7856
                                </span>
                            
                                </li>
        </div>

        <div class="col-md-5"></div>

    </div>
</div>


<!-- likes section -->

 

@endsection
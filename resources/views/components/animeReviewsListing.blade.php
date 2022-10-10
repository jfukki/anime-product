 
<div class="container d-block d-md-none" style="margin-top:32%">
    <br>
</div> 
<div class="container mb-5 " style="margin-top:12%; ">
            <div class="col-lg-12 ">
                <h2>Totlal Reviews: {{$reviews_count}}</h2>
                <hr>
            </div>
@if(count($anime_reviews) > 0)


@foreach($anime_reviews as $anime_review)

    
    <div class="row p-5" style="background:#1F1F1F; margin-bottom:16px; border-radius:15px; border: solid 1px #54229E;box-shadow: rgb(0 0 0 / 20%) 0px 60px 40px -7px; ">
        <a href="{{route('reviewDeail' , $anime_review->id)}}" class="col-lg-12 ">
            <div>
            <span class=""> 
                                                    <img src='{{ URL::asset("images/user_images/{$anime_review->user_avatar}") }}' 
                                                    class="rounded-circle" style="width: 57px; height:57px;"
                                                    alt="Avatar" />
                                                   <span style="color: white !important;" > {{$anime_review->user_name}}</span>

                                            </span>  | <small style="font-size:10px; color: white !important;">Date here</small>
            </div>
            <div class="mt-4" >

               <span style="font-size:22px; !important; color: white !important;"> {{Str::limit($anime_review->review_title, 40)}}</span>

            </div>

            <div class="mt-3" > 
            
                <span style="color: white !important;">{!! Str::limit($anime_review->review_text, 330) !!}</span>
            <hr>
            </div>

            <div class="row mt-4">
                <div class="col-lg-3 col-6" style="color: white !important;">story: <span style="color: #AD9D49 !important; font-size:29px !important;">{{$anime_review->story}}</span> / 9 </div>
                <div class="col-lg-3 col-6" style="color: white !important;">animation:   <span style="color: #E5F961 !important; font-size:29px !important;">{{$anime_review->animation}}</span> / 9</div>
                <div class="col-lg-3 col-6" style="color: white !important;">sound:   <span style="color: #6FB42A !important; font-size:29px !important;">{{$anime_review->music}} </span>/ 9</div>
                <div class="col-lg-3 col-6" style="color: white !important;">characters:   <span style="color: #fff !important; font-size:29px !important;">{{$anime_review->characters}}</span> / 9</div>




            </div>
        </a>
    </div>


    
            @endforeach

        <!-- {{$anime_reviews->links()}} -->

        @else

        <div class="col-md-4">
            <p   >No reviews yet!</p>
        </div>

        @endif



</div>




 
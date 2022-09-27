@extends('main')

@section('content')


<div class="container user-edit-section">
    <div class="row">
        <div class="col-lg-12 text-center">

            <h2>Write a Review for {{$anime_basic->english_title}}</h2>
         
        </div>
        
        <div class="col-lg-12 mt-2">

        @php

             $user_name =  auth()->user()->name


            
        @endphp

             <form action="{{ route('reviewStore', 
                                    [
                                        'anime_id' => $anime_basic->anime_id, 
                                        'user_id' => auth()->user()->id,
                                        'user_name' =>  $user_name,

                                    ]
                                    
                                    )}}"  method="POST" enctype="multipart/form-data">

                <div class="row">
                    @csrf

                                        
                        <div class="col-lg-6 mb-3">
                            <label for="password" class="form-label review-label-text">Review Title</label>
                            @if(isset($anime_review->review_title))

                                <div class="mb-3">
                                    
                                    <input type="text" class="form-control" name="reviewTitle" id="reviewTitle" placeholder="Enter Your Name" 
                                    value="{{$anime_review->review_title}}" >  
                                </div>


                            @else
                           
                            
                                <div class="mb-3">
                                
                                    <input type="text" class="form-control" name="reviewTitle" id="reviewTitle" placeholder="for-example: It’s time to crack open another case " 
                                    >  
                                </div>

                                @endif    

                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="review" class="form-label review-label-text">Review</label>
                            @if(isset($anime_review->review_text))

                                <textarea name="review" class="form-control" rows="16" placeholder="Please Enter Your Review Here.">{{$anime_review->review_text}}</textarea>

                            @else
                            
                            <textarea name="review" class="form-control" rows="16" placeholder="Please Enter Your Review Here."></textarea>
                                @endif    

                        </div>



                        <div class="col-lg-2 col-6 mb-3">
                            <!-- <label for="password" class="form-label review-label-text">Review Title</label> -->
                            @if(isset($anime_review->story))

                                <div class="mb-3">

                                    <label for="story" class="form-label review-label-text">Rate Story</label>
                                    
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="story" id="story" placeholder="Out of 9" value="{{$anime_review->story}}" >

                                </div>


                            @else
                            
                            <div class="mb-3">

                                    <label for="story" class="form-label review-label-text">Rate Story</label>
                                    
                                    <input type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="story" id="story" placeholder="Out of 9"  >
                                    
                                </div>

                                @endif    

                        </div>



                        <div class="col-lg-2 col-6 mb-3">
                            <!-- <label for="password" class="form-label review-label-text">Review Title</label> -->
                            @if(isset($anime_review->animation))

                                <div class="mb-3">

                                    <label for="animation" class="form-label review-label-text">Rate Animation</label>
                                    
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="animation" id="animation" placeholder="Out of 9" value="{{$anime_review->animation}}" >

                                </div>


                            @else
                            
                            <div class="mb-3">

                                    <label for="animation" class="form-label review-label-text">Rate Animation</label>
                                    
                                    <input type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="animation" id="animation" placeholder="Out of 9"  >
                                    
                                </div>

                                @endif    

                        </div>




                        <div class="col-lg-2 col-6 mb-3">
                            <!-- <label for="password" class="form-label review-label-text">Review Title</label> -->
                            @if(isset($anime_review->characters))

                                <div class="mb-3">

                                    <label for="characters" class="form-label review-label-text">Rate Characters</label>
                                    
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="characters" id="characters" placeholder="Out of 9" value="{{$anime_review->characters}}" >

                                </div>


                            @else
                            
                            <div class="mb-3">

                                    <label for="characters" class="form-label review-label-text">Rate Characters</label>
                                    
                                    <input type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="characters" id="characters" placeholder="Out of 9"  >
                                    
                                </div>

                                @endif    

                        </div>



                        <div class="col-lg-2 col-6 mb-3">
                            <!-- <label for="password" class="form-label review-label-text">Review Title</label> -->
                            @if(isset($anime_review->music))

                                <div class="mb-3">

                                    <label for="sound" class="form-label review-label-text">Rate Sound/Music</label>
                                    
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="sound" id="sound" placeholder="Out of 9" value="{{$anime_review->music}}" >

                                </div>


                            @else
                            
                            <div class="mb-3">

                                    <label for="sound" class="form-label review-label-text">Rate Music</label>
                                    
                                    <input type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    class="form-control" name="sound" id="sound" placeholder="Out of 9"   >
                                    
                                </div>

                                @endif    

                        </div>






                        <div class="col-lg-12 col-12 mb-3">


                            <button type="submit" class="btn btn-outline-dark genres-detail-page"> Add Review </button>      
                        
                        </div>

                </div>


            </form>


            </div>
        </div>
    </div>

        </div>


    </div>
</div>


@endsection
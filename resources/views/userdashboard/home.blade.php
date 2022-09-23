@extends('main')



@section('content')


<!-- user dashboard sidebar -->

@if(isset($user->user_banner))

<div class="container-fluid" 
style='
                    margin-top:20px;
                    background-color: #242538;
                    background-position: 50% 35%;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                    height: 330px;
                    position: relative;
                  
                    background-image: 
                    url("http://127.0.0.1:8000/images/user_images/{{$user->user_banner}}") ;

                    '
                    
                    >

@else

<div class="container-fluid" 
style='
                    margin-top:20px;
                    background-color: #242538;
                    background-position: 50% 35%;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                    height: 330px;
                    position: relative;
                  
                  '
                    
                    >

@endif

                    
  
                    

    <div class="row" style="
        
        border-radius: 4px 4px 0 0;
        position: relative;
        top: 34%;        
        z-index: 11;
        
     "
     >
        <div class="col-lg-4 text-center ">

        @if(isset($user->user_avatar))

             <img src='{{ URL::asset("images/user_images/{$user->user_avatar}") }}
' alt="" style="width: 220px; height:auto;" >

@else

<img src='' alt="" style="width: 220px; height:auto;" >

@endif
        </div>

        <div class="col-lg-4 " style="
        
        border-radius: 4px 4px 0 0;
        position: absolute;
        top: 80%;
        left: 26%;      
        width: 50%;  
        z-index: 11;
     " >
            <h2 style="color: whitesmoke !important; font-weight:bold;font-size:32px !important;">{{auth()->user()->name}}</h2>
        </div>

    </div>
          </div>
    </div>
</div>


 

 <!-- tabs -->

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-12 text-center">
            <a href="" class="btn user-profile-tab-btn">  <i class="fa fa-heart"></i>  My Heart List</a>
        </div>

        <div class="col-lg-3 col-12 text-center">
            <a href="" class="btn user-profile-tab-btn">  <i class="fa fa-pencil"></i>  My Reviews</a>
        </div>

        <div class="col-lg-3 col-12 text-center">
            <a href="{{ route('user-edit' , auth()->user()->id) }}" class="btn user-profile-tab-btn">  <i class="fa fa-gear"></i>  My Settings</a>
        </div>

        <div class="col-lg-3 col-12 text-center">
            <a href="{{ route('editBannerAavatar' , auth()->user()->id) }}" class="btn user-profile-tab-btn">  <i class="fa fa-image"></i>  Bio & Banner</a>
        </div>
    </div>
</div>

 <!-- tabs -->



@yield('user-dashboard-content')

<!-- user dashboard content -->


<!-- user dashboard content -->


@endsection
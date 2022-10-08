@extends('main')
@section('meta-description', 'Anime Recommendations, Anime Episodes, Anime wishlist, Anime track, Anime wallpapers, Famous Anime Characters & Much More')
@section('meta-keywords', 'anime, anime recommendations, anime record, anime track, anime characters, upcoming anime, popular anime')

@section('title', 'Register For More Anime Recommendations & Much More')


@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 registeration-card my-3 ">
                <h2 class="text-center mb-5 mt-3">Signup To Discover More Anime</h2>
            <form action="{{route('userregister')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" value="{{old('name')}}" >  
                    <small class="form-alert">@error('name')  {{$message}} @enderror</small>                   
                </div>

               
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{old('email')}}" placeholder="Enter Your Email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <small class="form-alert">@error('email')  {{$message}} @enderror</small>   
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                    <small class="form-alert">@error('password')  {{$message}} @enderror</small>   
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Repeat Your Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Please Repeat Your Password">
                      
                </div>
                
                <button type="submit" class="btn btn-outline-secondary register-btn">Register</button>
                </form>
            </div>
        </div>
    </div>


@endsection
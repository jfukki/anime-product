@extends('main')
@section('meta-description', 'Anime Recommendations, Anime Episodes, Anime wishlist, Anime track, Anime wallpapers, Famous Anime Characters & Much More')
@section('meta-keywords', 'anime, anime recommendations, anime record, anime track, anime characters, upcoming anime, popular anime')

@section('title', 'Register For More Anime Recommendations & Much More')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 registeration-card my-3">
                
            <form action="{{route('login')}}" method="POST">
                @csrf

                @if(session('status'))
                <h3>{{session('status')}} </h3> 
                @endif
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{old('email')}}" placeholder="Enter Your Email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <small class="form-alert">@error('email')  {{$message}} @enderror</small>   
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Name">
                    <small class="form-alert">@error('password')  {{$message}} @enderror</small>   
                </div>
 
                
                <button type="submit" class="btn btn-outline-primary register-btn">Login</button>
                </form>
            </div>
        </div>
    </div>

@endsection
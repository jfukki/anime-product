@extends('userdashboard.home')
@section('user-dashboard-content')

<div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 registeration-card my-3 ">
                <h2 class="text-center mb-5 mt-3">About - Banner - Avatar</h2>
            <form action="{{route('bannerUpdate',  auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                
                <div class="mb-3">
                    <label for="password" class="form-label">About</label>
                    <textarea name="about" class="form-control" rows="4" placeholder="Please Your Bio Here.">{{$user->about}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Update Banner</label>
                    <input type="file" class="form-control"  name="image" value="{{$user->user_banner}}">
                    <small>Allowed Formats: JPEG, PNG. Max size: 6mb. Optimal dimensions: 1700x330</small>
   
   
                </div>

 
                


                <button type="submit" class="btn btn-outline-dark genres-detail-page">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection
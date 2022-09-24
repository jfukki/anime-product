@extends('userdashboard.home')
@section('user-dashboard-content')

<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 registeration-card my-3 ">
                <h2 class="text-center mb-5 mt-3">Update Your Information</h2>
            <form action="{{route('userUpdate',  auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" 
                    value="{{$user_detail->name}}" >  
                </div>

               
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" 
                    value="{{$user_detail->email}}" placeholder="Enter Your Email" aria-describedby="emailHelp">
                  
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" 
                    placeholder="Update Your Password"  >
                 </div>

                 <div class="mb-3">
                    <label for="avatar" class="form-label">Update Avatar</label>
                    @if(isset($user->user_avatar))

                    <input type="file" class="form-control"  name="avatar" >
                    <input type="text" class="form-control"  name="old_image" 
                     hidden   value="{{$user->user_avatar}}">

                     @else

                     <input type="file" class="form-control"  name="avatar" >

                     @endif
                    <small>Allowed Formats: JPEG, PNG. Max size: 6mb. Optimal dimensions: 1700x330</small>
                </div>

                <button type="submit" class="btn btn-outline-dark genres-detail-page">Update My Info</button>
                </form>
            </div>
        </div>
    </div>


@endsection
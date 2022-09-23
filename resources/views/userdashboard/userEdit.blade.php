@extends('userdashboard.home')
@section('user-dashboard-content')

<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 registeration-card my-3 ">
                <h2 class="text-center mb-5 mt-3">Update Your Information</h2>
            <form action="{{route('userUpdate',  auth()->user()->id)}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" value="{{$user->name}}" >  
                </div>

               
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{$user->email}}" placeholder="Enter Your Email" aria-describedby="emailHelp">
                  
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Update Your Name" >
                 </div>

                <button type="submit" class="btn btn-outline-dark genres-detail-page">Update My Info</button>
                </form>
            </div>
        </div>
    </div>


@endsection
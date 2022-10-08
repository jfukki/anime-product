@extends('main')

@section('content')


<div class="container user-edit-section">
    <div class="row">
        <div class="col-lg-6">
            <span class="user-edit-section-title" >Update Your Personal Settings</span>
            <hr>

            @if(isset($user->user_avatar))

            <img src='{{ URL::asset("images/user_images/{$user->user_avatar}") }}'  
                                                        style="width:160px; height:auto;" alt=""  >

            @else

             <small>Welcome!! Please upload your Avatar [ size: 160px - 160px ]</small> <br>
            <img src='https://media2.giphy.com/media/fJ1xbyUH5BV5u/200w.gif' alt=""  >


            @endif
        </div>

        <div class="col-lg-6 mt-2">
            
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
                    <small>Allowed Formats: JPEG, PNG. Max size: 6mb. Optimal dimensions: 160px-160px</small>
                </div>

                 

                <div class="row">
                            <div class="col-lg-3">
                                
                                 <button type="submit" class="btn btn-outline-dark genres-detail-page">Update</button>

                            </div>

                            <div class="col-lg-2" style="margin-left:10px;">
                                
                                 <a href="{{ route('my-profile')}}" class="btn btn-outline-dark genres-detail-page" >Cancle</a>

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
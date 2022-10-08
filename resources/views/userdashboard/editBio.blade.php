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

        <form action="{{route('bannerUpdate',  auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                
                <div class="mb-3">
                    <label for="password" class="form-label">About</label>
                    @if(isset($user->about))

                        <textarea name="about" class="form-control" rows="4" placeholder="Please Your Bio Here.">{{$user->about}}</textarea>

                    @else
                    
                    <textarea name="about" class="form-control" rows="4" placeholder="Please Your Bio Here."></textarea>
                         @endif    

                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Update Banner</label>
                    @if(isset($user->user_banner))

                    <input type="file" class="form-control"  name="image" >
                    <input type="text" class="form-control"  name="old_image" 
                     hidden   value="{{$user->user_banner}}">
                      


                         @else
                    
                         <input type="file" class="form-control"  name="image">
                    
                    @endif
                    <small>Allowed Formats: JPEG, PNG. Max size: 6mb. Optimal dimensions: 1700x330</small>
   
   
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
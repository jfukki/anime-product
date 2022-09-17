@extends('main')

@section('content')


<!-- Main Banner -->

<div class="container">
    <div class="row"><div class="col">
        <img src="" alt="">
    </div></div>
</div>

<!-- Main Banner -->


<!-- search bar -->


<!-- search bar -->

     
    @include('components.seasonListing')
    <div class="container mt-5" >
        <hr>
    </div>

    @include('components.trending')


    <div class="container mt-5" >
        <hr>
    </div>

     @include('components.comingsoon')


     <div class="container mt-5 d-none d-md-block" >
        <hr>
    </div>
 
    

@endsection
@extends('main')

@section('content')

<!-- search bar -->

@include('components.searchBar')

<!-- search bar -->

     @include('components.trending')

    <div class="container " >
        <hr>
    </div>

     @include('components.comingsoon')


     <div class="container mt-5 d-none d-md-block" >
        <hr>
    </div>
 
    

@endsection
@extends('main')

@section('content')

<!-- search bar -->

@include('components.searchBar')

<!-- search bar -->

    <div class="container extra-padding-container">
        <div class="row">
           @include('components.popularAnime')

           <div class="row " style="margin-top:10%;">
                <hr>
           </div>

           @include('components.movies')
           
           <div class="row " style="margin-top:10%;">
                <hr>
           </div>
           
           @include('components.airing')
           
           <div class="row " style="margin-top:10%;">
                
           </div>

        </div>
    </div>

@endsection
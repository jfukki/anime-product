@extends('main')

@section('title', 'Our Website Stats')

@section('content')

<div class="container mt-5 extra-padding-container">
    <div class="row ">
        <div class="col-md-4">
            <div class="card-counter primary site-stats-card">
                <i class="fa fa-search  site-stats-icon"></i>
                <span class="count-name site-stats-title">Total Anime Searches |</span>
                <span class="count-numbers site-stats-counter">{{$count}}</span>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="card-counter primary site-stats-card">
                <i class="fa fa-search  site-stats-icon"></i>
                <span class="count-name site-stats-title">Total Reviews |</span>
                <span class="count-numbers site-stats-counter">0</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-counter primary site-stats-card">
                <i class="fa fa-search  site-stats-icon"></i>
                <span class="count-name site-stats-title">Total Anime |</span>
                <span class="count-numbers site-stats-counter">{{$anime_count}}</span>
            </div>
        </div>

        
        
    </div>
</div>




@endsection
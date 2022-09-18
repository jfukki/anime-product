@extends('main')

@section('content')

<!-- search bar -->

@include('components.searchBar')

<!-- search bar -->

<div class="container extra-padding-container ">
    <div class="row" >
     <div class="col-lg-12">
        <h2>People Also Searched for</h2>
     </div>
     <hr>
    </div>


    <div class="row mb-5">

        @if(isset($search_list))


            @foreach($search_list as $search_list)

                <div  class="row searched-item-row" >
                
                

                    <div class="col-md-2 searched-item-image">
                            <a href="{{ route('animeDetail' , $search_list->anime_id)  }}"> <img src="{{$search_list->anime_image}}" alt=""> </a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <a href="" class="searched-item-title"> {{$search_list->english_title}}   <br> 
                    </a>
                        <span class="searched-item-rating">Rating: {{$search_list->rating}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-score">Score:  <br>Popularity:  {{$search_list->popularity}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-type">Type:<br>{{$search_list->type}}</span>
                    </div>
                    <div class="col-md-2 mt-3">
                    <span class="searched-item-status">Status:<br> {{$search_list->status}} </span>
                    </div>

            
                    </div>

            @endforeach

        @else
        <p>Please Refresh!</p>
        @endif



    </div>



  
     

@endsection
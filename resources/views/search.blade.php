@extends('main')

@section('content')

<!-- search bar -->

@include('components.searchBar')

<!-- search bar -->

<div class="container extra-padding-container ">
    <div class="row" >
       <div class="col"> <h1>Searched For "Death Note"</h1>  </div>
    </div>

</div>

 
<div class="container ">

@foreach($search as $search)
    <div  class="row searched-item-row" >
        
               
                <div class="col-md-2 searched-item-image">
                        <a href="{{ route('animeDetail' , $search['mal_id'])  }}"> <img src="{{$search['images']['jpg']['large_image_url']}}" alt=""> </a>
                </div>
                <div class="col-md-4 mt-3">
                     <a href="{{ route('animeDetail' , $search['mal_id'])  }}" class="searched-item-title">  {{$search['titles'][0]['title']}} <br> </a>
                     <span class="searched-item-rating">Rating: {{$search['rating']}}</span>
                </div>
                <div class="col-md-2 mt-3">
                  <span class="searched-item-score">Score: {{$search['score']}} <br>Popularity: {{$search['popularity']}} </span>
                </div>
                <div class="col-md-2 mt-3">
                   <span class="searched-item-type">Type:<br>{{$search['type']}}</span>
                </div>
                <div class="col-md-2 mt-3">
                   <span class="searched-item-status">Status:<br>  {{$search['status']}}</span>
                </div>
 
         
    </div>

    @endforeach

</div>

 
     

@endsection
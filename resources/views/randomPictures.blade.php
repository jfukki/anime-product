@extends('main')

@section('content')

<div class="container">
    
 
 <div class="row heading-row-title">
        <div class="col-md-10">
            
           <h2><b>{{$anime}}</b> Images</h2> 
            
        </div>
       
    </div>

<!-- Large Devices -->


<div class="row row-cols-5">   

    
@foreach($randomAnime as $d)
 @if(isset($d))
    <div class="col anime-grid-list d-none d-md-block">

        <a  >
        <img src="{{$d['jpg']['large_image_url']}}"
        alt="" class="anime-grid-list-image">
        </a>
        
        
    </div>
    @else
    <h2>Please Reload Again!</h2>
    @endif

@endforeach
</div>

<!-- Large Devices -->



<!-- Mobile Devices -->


<div class="row row-cols-2">   

    
@foreach($randomAnime as $d)
    <div class="col anime-grid-list d-md-none ">

        <a  >
            <img src="{{$d['jpg']['large_image_url']}}"
            alt="" class="anime-grid-list-image">
        </a>
        
    </div>
@endforeach
</div>

<!-- Mobile Devices -->

 



</div>

@endsection
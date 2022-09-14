

    <div class="row heading-row-title">
        <div class="col-md-10">
            <h2>Popular Anime</h2>
            
        </div>
        <div class="col-md-2">

            <p class="view-all-text"><a href="{{ route('home') }}">View all</a></p>
            
        </div>
    </div>

<!-- Large Devices -->


<div class="row row-cols-5">   

    
@foreach($popularAnime as $d)
@if(isset($popularAnime))    
    <div class="col anime-grid-list d-none d-md-block">

        <a href="{{ route('animeDetail' , $d['mal_id'])  }}">
        <img src="{{$d['images']['jpg']['large_image_url']}}"
        alt="" class="anime-grid-list-image">
        </a>
        <a href="{{ route('animeDetail' , $d['mal_id']) }}" class="text-decor">
            <p class="anime-title-list-grid">{{$d['title']}}</p>
        </a>
        
    </div>
   @endif 
@endforeach
</div>

<!-- Large Devices -->



<!-- Mobile Devices -->


<div class="row row-cols-2">   

    
@foreach($popularAnime as $d)
@if(isset($popularAnime))    

    <div class="col anime-grid-list d-md-none ">

        <a href="{{ route('animeDetail' , $d['mal_id'])  }}">
        <img src="{{$d['images']['jpg']['large_image_url']}}"
        alt="" class="anime-grid-list-image">
        </a>
        <a href="{{ route('animeDetail' , $d['mal_id']) }}" class="text-decor">
            <p class="anime-title-list-grid">{{$d['title']}}</p>
        </a>
        
    </div>
    @endif
@endforeach
</div>

<!-- Mobile Devices -->

 
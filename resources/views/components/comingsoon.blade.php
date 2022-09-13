
<div class="container extra-padding-container d-none d-md-block">
    <div class="row heading-row-title">
        <div class="col-md-10">
            <h2>Upcoming Soon </h2>
            
        </div>
        <div class="col-md-2">

            <p class="view-all-text"><a href="{{ route('home') }}">View all</a></p>
            
        </div>
    </div>

</div>

<div class="container d-none d-md-block">

        <div class="row row-cols-4">   

        @foreach($upcomingSeason as $upcomingSeason)

        <div class="col anime-grid-list d-none d-md-block">

            <a href="{{ route('animeDetail' , $upcomingSeason['mal_id'])  }}">
            <img src="{{$upcomingSeason['images']['jpg']['large_image_url']}}"
             alt="" class="anime-grid-list-image">
            </a>

            <a href="" class="text-decor">
                <p class="anime-title-list-grid">{{$upcomingSeason['titles'][0]['title']}}</p>
            </a>
            
        </div>

        @endforeach
  
   
    </div>

    

    
</div>
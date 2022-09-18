



<div class="row mb-5">   

    
@foreach($popular_anime as $d)
@if(isset($popular_anime))    
    <div class="col-lg-2 col-6 anime-grid-list ">

        <a href="{{ route('animeDetail' , $d->anime_id)  }}">
        <img src="{{$d->anime_picture}}"
        alt="" class="anime-grid-list-image">
        </a>
        <a href="{{ route('animeDetail' , $d->anime_id) }}" class="text-decor">
            <p class="anime-title-list-grid">{{$d->anime_title}}</p>
            
        </a>
        
    </div>
   @endif 
@endforeach
</div>







 
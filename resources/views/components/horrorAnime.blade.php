



<div class="row ">   

    
@foreach($horror_anime as $d)
@if(isset($horror_anime))    
    <div class="col-lg-2 col-4 anime-grid-list zoom  ">
        <a href="{{ route('animeDetail' , $d->anime_id)  }}">
        <img src="{{$d->anime_picture}}"
        alt="" class="anime-grid-list-image">
        </a>
        <a href="{{ route('animeDetail' , $d->anime_id) }}" class="text-decor">
            <p class="anime-title-list-grid"> {{ Str::limit($d->anime_title, 50) }}</p>
            
        </a>
        
    </div>
   @endif 
@endforeach
</div>







 
<div class="row ">   

    

@foreach($ranked_anime as $d)
@if(isset($ranked_anime))    
    <div class="col-lg-2 col-6 anime-grid-list zoom mb-4">
        <div class="ribbon-tag">Rank#{{$d->rank}}</div>
        <a href="{{ route('animeDetail' , $d->anime_id)  }}">
        <img src="{{$d->anime_picture}}"
        alt="" class="anime-grid-list-image">
        </a>
        <a href="{{ route('animeDetail' , $d->anime_id) }}" class="text-decor">
            <p class="anime-title-list-grid">
                {{ Str::limit($d->anime_title, 50) }}
            </p>
            
        </a>
        
        
    </div>
     
   @endif 
@endforeach
</div>







 
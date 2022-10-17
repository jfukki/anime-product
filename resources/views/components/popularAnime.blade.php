



<div class="row ">   

    
@foreach($popular_anime as $key => $d)
@if(isset($popular_anime))    
    <div class="col-lg-2 col-4 anime-grid-list zoom ">
    

        <a href="{{ route('animeDetail' , $d->anime_id)  }}">
        <img src="{{$d->anime_picture}}"
        alt="" class="anime-grid-list-image">
        </a>
        

        @if($d->english_title == null)
                
                <a  class="text-decor" href="{{route('animeDetail', $d->anime_id)}}" style="text-decoration:none !important; color: #54229E ">
                
                <p class="anime-title-list-grid">
                
                    {!! Str::limit($d->japanese_title, 30) !!}
                </p>
                
                </a>

                    @else

                <a href="{{route('animeDetail', $d->anime_id)}}" style="text-decoration:none !important; color: #54229E ">
                        
          
                <p class="anime-title-list-grid">
                    {{ Str::limit($d->english_title, 50) }}
                </p>

                    </a>

            @endif
        
    </div>
   @endif 
@endforeach
</div>







 
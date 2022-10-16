<div class="container mt-5">
    <div class="row">

         


        @foreach($top_airing_anime as $key => $top_airing)
        
        <div class="col-lg-4 col-10  zoom">

            <div class="row mb-4">
                <div class="col-lg-3 col-5">
                
                    <span class="top-airing-anime-count">{{$key+1}}</span>


                </div>

                <div class="col-lg-9 col-7">
                    
                   <a href="{{route('animeDetail', $top_airing->anime_id)}}">

                   <img src="{{$top_airing->anime_image}}" 
                    class="top-airing-anime-image" alt="">


                   </a>
                    
                    <p class="top-airing-anime-title">

                    @if($top_airing->english_title == null)
                
                <a href="{{route('animeDetail', $top_airing->anime_id)}}" style="text-decoration:none !important; color: #54229E ">
                            {!! Str::limit($top_airing->japanese_title, 30) !!}
                </a>

                    @else

                <a href="{{route('animeDetail', $top_airing->anime_id)}}" style="text-decoration:none !important; color: #54229E ">
                        
            {!! Str::limit($top_airing->english_title, 30) !!}
                    </a>

            @endif

                         

                    </p>

                </div>

            </div>

            <div>
                
            </div>
        </div>
        @endforeach

    </div>
</div>
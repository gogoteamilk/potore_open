<div class="carousel-item {{$loop->first ? 'active' : '' }}">
    <img class="carousel-photo" src="{{$photo[0]['photo'] ?? 'https://placehold.jp/1000x563.png'}}">
    <div class="carousel-caption d-md-block gallery-info">
        <h3>{{$photo[0]['title'] ?? ''}}</h3>

        <div class="photo-info">
            {{-- クリエイターがセットされていたら出力 --}}
            @if(current(array_column($photo,'name')) != null)
            <div class="photo-creaters">
                <span>creater:</span>
                @foreach ($photo as $photo_info)
                <img class="carousel-avatar img-fluid rounded-circle" src="{{ $photo_info['avatar'] ?? ''}}" alt="">
                <span><a href="/home/{{ $photo_info['user_id'] ?? ''}}">{{ $photo_info['name'] ?? ''}}</a></span>
                @endforeach
            </div>
            @endif
        </div> 
        <div class="photo-comment">
            {{$photo[0]['comment'] ?? ''}}
        </div>
    </div>
    {{var_dump($photo)}}
</div>
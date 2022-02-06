@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/pages/home.css" rel="stylesheet">
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
@endsection

{{-- 最後にcss,js読み込み --}}
@section('laterScript')
<link href="{{ asset('css/pages/index.css') }}" rel="stylesheet">
@endsection

{{-- ページ要素 --}}
@section('content')

{{-- メインキャンバス --}}
<div class="container main-canvas-container pb-4">
    <div id="img-rapper" style="background: url({{ $heroPhoto[0]['photo'] }});">
    </div>
        <div class="message">
            <div class="copy">
                <h1>ポトレ仲間がきっと見つかる</h1>
                <p>
                    写真で見つけるSNS potore
                </p>
            </div>
        </div>
    <div class="canvas-caption">
        @isset ($heroPhoto[0]['name'])
            <span>
                <span>creater: </span>
                @foreach ($heroPhoto as $users)
            <span><a href="/home/{{ $users['userID'] }}">{{ $users['name'] ?? ''}}</a></span> 
                @endforeach
            </span>
        @endisset
    </div>
</div>

{{-- 案内 --}}
<div class="app-guide">
    <div class="container">
        <h2>ポトレ仲間を増やして作品作りを楽しもう！</h2>
        <p>
            ポートレートが好きなクリエイター仲間を増やして、新しい作品作りを楽しみましょう。<br>
            potoreに掲載されたステキなポートレート写真を見て、『いいな』と思った時はすぐにクリエイターと繋がれます。
        </p>
        <p>
            まずはあなたの撮った写真を掲載しましょう！<br>
            そして、モデルや写真やメイクなど自分のスキルを活かして、ポトレ仲間と作品作りを楽しんでください。
        </p> 
        @guest
        <a class="get-start-button btn btn-primary" href="/register" role="button">potoreをはじめる</a>
        @endguest  
    </div>
</div>


{{-- おすすめユーザー --}}
<div class="recommended-user">
    <div class="container">
        <h2>gallery</h2>
        <div class="user-panel">
        @isset ($recommendedUser)
            @foreach ($recommendedUser as $galleryPhoto)
                <span><a href="/home/{{ $galleryPhoto->post_user_id }}">
                <img src="{{ $galleryPhoto->photo }}" class="galleryPhoto">
                </a></span> 
            @endforeach
        @endisset
        </div>
    </div>
</div>
@endsection
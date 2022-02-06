@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/pages/home.css" rel="stylesheet">
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
@endsection

{{-- 最後にcss,js読み込み --}}
@section('laterScript')
@endsection

{{-- ページ要素 --}}
@section('content')

<div class="container">
    <div class="row justify-content-center align-items-stretch">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="user-icon-box">
                        {{--ユーザーbadge 
                            <div class="user-icon-badge"></div> --}}
                            <img src="{{ $users->avatar ?? "/asset/empty_avatar.gif"}}"
                                class="user-icon img-fluid rounded-circle" alt="">
                    </div>
                    <h4 class="card-title">{{ $users->name }}</h4>
                    <p>{{ $users->intoro }}</p>
                    {{--いいねボタン
                         <p class="text-right"><i class="fas fa-heart likes"></i>10 --}}
                    </p>
                    <div>
                        @include('subviews.userProfile')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            {{-- gallery --}}
            @isset (current($photos)[0]['photo'])
                <div class="card gallery">
                    <div id="carouselId" class="carousel slide  carousel-fade" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($photos as $photo)
                                @include('subviews.userCarousel')  
                            @endforeach
                        </div>
                    </div>
                    <a class="gallery-info carousel-control carousel-control-prev" href="#carouselId" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="gallery-info carousel-control carousel-control-next" href="#carouselId" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @endisset
            {{-- comment --}}
            <div class="card">
                {{-- ログインしてたら --}}
                @auth
                    <div class="comment-box">
                        <form class="form-loading" action="{{ route('comment.store', ['id' => $users->id]) }}" method="post">
                            @csrf
                            <div class="card-haeder p-3 d-flex">
                                <img src="{{ Auth::user()->avatar ?? "/asset/empty_avatar.gif" }}" class="rounded-circle"
                                width="50" height="50">
                                <div id="commentWriter" class="ml-2 d-flex flex-column">
                                    <p> <textarea name="comment" required maxlength="500" placeholder="{{ $users->name }}さんの掲示板です。コメントを残せます。最大500文字。"></textarea>
                                    </p>
                                    <input class="btn btn-primary" type="submit" value="書込み">
                                </div>
                            </div>
                        </form>
                    </div>
                @endauth
                @guest
                {{-- ログインしていない場合 --}}
                    <p class="p-3">
                        掲示板にはログインしたユーザーが書き込めます。<br>
                        potoreに参加して写真をもっと楽しみましょう！
                    </p>
                    <p class="p-3">
                        <a class="btn btn-primary" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
                    </p>

                @endguest
                <hr>
                <div class="commentList scroll_area">
                    @each('subviews.userBBS', $comments, 'comment', 'empty.comment')
                </div>
                <div class="page-load-status">
                    <p class="infinite-scroll-error">No more pages to load</p>
                </div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
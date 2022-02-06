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
                        <a href="{{ route('home.profile') }}">
                            <img src="{{ $users->avatar ?? "/asset/empty_avatar.gif"}}"
                                class="user-icon img-fluid rounded-circle" alt="">
                        </a>
                    </div>
                    <h4 class="card-title">{{ $users->name }}</h4>
                    <p>{{ $users->intoro }}</p>
                    {{--いいね数表示
                    <p class="text-right"><i class="fas fa-heart likes"></i>10 <br> --}}
                        <a href="{{ route('home.setting') }}" class="btn btn-primary btn-lg btn-block"
                            role="button">セッティング</a>
                    </p>
                    <div>
                        @include('subviews.userProfile')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            {{-- gallery --}}
            <div class="card gallery">
                <div id="carouselId" class="carousel slide  carousel-fade" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @if ($photos)
                            @foreach ($photos as $photo)
                                @include('subviews.userCarousel')  
                            @endforeach                           
                        @else
                            {{-- 写真がない場合 --}}
                            @include('empty.homeCarousel')  
                        @endif
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
            {{-- comment --}}
            <div class="card">
                <div class="comment-box">
                    <form class="form-loading" action="{{ route('comment.store', ['id' => $users->id]) }}" method="post">
                        @csrf
                        <div class="card-haeder p-3 d-flex">
                            <img src="{{ $users->avatar ?? "/asset/empty_avatar.gif" }}" class="rounded-circle"
                            width="50" height="50">
                            <div  id="commentWriter" class="ml-2 d-flex flex-column">
                            <p> <textarea name="comment" required maxlength="500" placeholder="{{ $users->name }}さんの掲示板です。コメントを残せます。最大500文字。"></textarea>
                                </p>
                                <input class="btn btn-primary" type="submit" value="書込み">
                            </div>
                        </div>
                        <p>{{ $result ?? '' }}</p>
                    </form>
                </div>
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
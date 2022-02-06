@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/pages/home.css" rel="stylesheet">
@endsection

{{-- ページ要素 --}}

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-stretch">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="user-icon-box">
                        {{--ユーザーbadge 
                            <div class="user-icon-badge"></div> --}}
                    <img src="{{Auth::user()->avatar ?? "https://placehold.jp/150x150.png"}}" class="user-icon img-fluid rounded-circle" alt="">
                    </div>
                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                    <p>{{ Auth::user()->intoro }}</p>
                    {{--いいねボタン 
                        <p class="text-right"><i class="fas fa-heart likes"></i>10 <br> --}}
                    <a href="{{ route('home.profile') }}" class="btn btn-primary btn-lg btn-block" role="button">プロフィールを変更する</a>
                    <a href="{{ route('home.gallery') }}" class="btn btn-primary btn-lg btn-block" role="button">ギャラリーの写真を変更する</a>
                    <a href="{{ route('home.security.edit') }}" class="btn btn-primary btn-lg btn-block" role="button">登録情報を変更する</a>
                    <hr>
                    <a class="btn btn-secondary float-right"  type="button" href="{{ route('home') }}">戻る</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
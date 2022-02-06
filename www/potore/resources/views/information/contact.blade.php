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
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h1>お問合せフォーム</h1>
                    <form method="POST" action="{{ route('contact.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input required type="text" id="email" name="email" class="form-control" placeholder=""
                                value="{{ old('email', Auth::user()->email ?? '')}}" aria-describedby="helpId" maxlength="50">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <input required type="text" id="name" name="name" class="form-control" placeholder=""
                                value="{{ old('name', Auth::user()->name ?? '')}}" aria-describedby="helpId" maxlength="50">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input required type="text" id="title" name="title" class="form-control" placeholder=""
                                value="{{ old('title')}}" aria-describedby="helpId" maxlength="50">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="body">お問い合わせ内容</label>
                            <textarea required name="body" class="form-control" maxlength="500">{{ old('body') }}</textarea>
                            @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="送信する">
                        </div>
                    </form>
                    <hr>
                    <a class="btn btn-secondary float-right"  type="button" href="{{ route('home') }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <h1>お問合せフォーム　確認画面</h1>
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <p class="bg-light p-3">
                                {{ $inputs['email'] }}
                            </p>
                            <input type="hidden" id="email" name="email" class="form-control" placeholder=""
                                value="{{ $inputs['email'] }}" aria-describedby="helpId" maxlength="50">
                        </div>

                        <div class="form-group">
                            <label for="name">お名前</label>
                            <p class="bg-light p-3">
                                {{ $inputs['name'] }}
                            </p>
                            <input type="hidden" id="name" name="name" class="form-control" placeholder=""
                                value="{{ $inputs['name'] }}" aria-describedby="helpId" maxlength="50">
                        </div>

                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <p class="bg-light p-3">
                                {{ $inputs['title'] }}
                            </p>
                            <input type="hidden" id="title" name="title" class="form-control" placeholder=""
                                value="{{ $inputs['title'] }}" aria-describedby="helpId" maxlength="50">
                        </div>

                        <div class="form-group">
                            <label for="body">お問い合わせ内容</label>
                            <p class="bg-light p-3">
                                {!! nl2br(e($inputs['body'])) !!}
                            </p>
                            <input type="hidden" name="body" type class="form-control" maxlength="500"
                                value="{{ $inputs['body'] }}">
                        </div>
                        <hr>
                        <div class="float-right">
                            <button class="btn btn-secondary" name="action" value="back">
                                入力内容修正
                            </button>
                            <button class="btn btn-primary pl-5 pr-5" name="action" value="submit">
                                送信する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
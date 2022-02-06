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
                    <h1>送信完了しました</h1>
                    <p>ご返信まで通常1週間ほど頂いております。ご了承ください。</p>
                    <hr>
                    <a class="btn btn-secondary float-right"  type="button" href="{{ route('home') }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
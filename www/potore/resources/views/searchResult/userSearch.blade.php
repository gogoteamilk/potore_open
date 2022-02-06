@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/pages/userSearch.css" rel="stylesheet">
@endsection

{{-- 最後にcss,js読み込み --}}
@section('laterScript')
@endsection

{{-- ページ要素 --}}
@section('content')
<div class="container">
    <div class="list list-row block">
        @each('subviews.userList', $userList, 'userData', 'empty.userSearch')
    </div>
</div>
@endsection
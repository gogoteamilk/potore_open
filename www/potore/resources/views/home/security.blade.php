@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/pages/home.css" rel="stylesheet">
@csrf
<!--フォームが多いのでfetchにしておく-->
@endsection

{{-- 後で読ませたいスクリプト --}}
@section('laterScript')
<script src="{{ asset('js/pages/security.js') }}" defer></script>
@endsection

{{-- ページ要素 --}}
@section('content')

<!-- Attachment Modal -->
<div id="user-delete-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ユーザーの削除</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>ユーザー情報を全て削除して退会します。<br>
                    一度削除すると、元に戻せません。</p>
                <form>
                    <p>
                        <label for="pw-check">パスワード</label>
                        <input type="text" id="pw-check" name="pw-check" class="form-control">
                    </p>
                    <p>
                        <button type="button" class="btn btn-danger" id="withdrawal">退会する</button>
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->

<!-- 通常view -->
<div class="container">
    <div class="row justify-content-center align-items-stretch">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h2>登録情報の変更</h2>
                    <div class="form-group">
                        <div class="user-icon-box">
                            <img id="avatar_img" src="{{Auth::user()->avatar ?? "https://placehold.jp/150x150.png"}}"
                                class="user-icon img-fluid rounded-circle" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <h3>ユーザー名</h3>
                        <p>{{ Auth::user()->name}}</p>
                    </div>
                    <div class="form-group">
                        <h3>メールアドレス</h3>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ Auth::user()->email}}"  maxlength="50">
                        <div id="mail_alert" class="validation-feedback"></div>
                        <button type="button" class="btn btn-primary mt-3" id="change-email">メールアドレスを変更する</button>
                    </div>
                    <div class="form-group">
                        <h3>パスワード</h3>
                        <input required type="password" id="pw" name="pw" class="pw form-control" placeholder="新しいパスワード" minlength="6" maxlength="50">
                        <input required type="password" id="pw_confirmation" name="pw_confirmation" class="pw form-control mt-1"
                            placeholder="パスワードを確認">
                        <div id="pw_alert" class="validation-feedback"></div>
                        <button type="button" class="btn btn-primary mt-3" id="change-pw">パスワードを変更する</button>
                    </div>
                    <div class="form-group">
                        <form method="post" enctype="multipart/form-data">
                            <h3>退会</h3>
                            <p>全ての登録情報を削除し、退会します。</p>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#user-delete-modal">退会する</button>
                        </form>
                    </div>
                    <hr>
                    <a class="btn btn-secondary float-right"  type="button" href="{{ route('home.setting') }}">戻る</a>
                    <p>{{ $result ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
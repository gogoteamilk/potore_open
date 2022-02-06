@extends('layouts.app')
{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/choices.min.css" rel="stylesheet">
<link href="/css/pages/gallery.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="{{ asset('js/Sortable.min.js') }}" defer></script>
<script src="{{ asset('js/choices.js') }}" defer></script>
@endsection

{{-- 後で読ませたいスクリプト --}}
@section('laterScript')
<script src="{{ asset('js/pages/gallery.js') }}" defer></script>
@endsection

{{-- ページ要素 --}}
@section('content')

<!-- Attachment Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" name="modaleForm" class="form-horizontal" method="POST"
                    action="{{ route('photo.update') }}">
                    @csrf
                    <input type="hidden" id="modal-input-photoID" name="photoID">
                    <div class="card text-white bg-dark mb-0">
                        <div class="card-header">
                            <h2 class="m-0 editer">写真の編集</h2>
                            <h2 class="m-0 store">写真の新規追加</h2>
                        </div>
                        <div class="card-body">
                            <!-- photo view -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-photo">photo</label>
                                <img class="modalImg" id="modal-input-photo" src="https://placehold.jp/150x150.png">
                            </div>
                            <!-- /photo view -->
                            <!-- photo uplode -->
                            <div class="form-group store">
                                <label class="photo button_label btn btn-primary mt-2 mr-2" for="uplode_img_file">
                                    ＋写真を選択
                                    <input type="file" id="uplode_img_file" name="uplode_img_file" value="写真を追加する"
                                        accept="image/*">
                                </label>
                                <div id="photo_alert" class="validation-feedback"></div>
                            </div>
                            <!-- /photo uplode -->
                            <div class="photo-update-common">
                            <!-- title -->
                                <div class="form-group">
                                    <label class="col-form-label" for="modal-input-title">タイトル </label>
                                    <input type="text" name="title" class="form-control" id="modal-input-title">
                                    <div id="title_alert" class="validation-feedback"></div>
                                </div>
                                <!-- /title -->
                                <!-- creaters -->
                                <div class="form-group">
                                    <label class="col-form-label" for="creaters-input-name">creaters</label>
                                    <select id="creaters_search" name="creaters_search[]" multiple></select>
                                    <div id="creaters_alert" class="validation-feedback"></div>
                                </div>
                                <!-- /creaters -->
                                <!-- comment -->
                                <div class="form-group">
                                    <label class="col-form-label" for="modal-input-comment">comment</label>
                                    <input type="text" name="comment" class="form-control" id="modal-input-comment">
                                    <div id="comment_alert" class="validation-feedback"></div>
                                </div>
                                <!-- /comment -->
                            </div>
                            <!-- photo delete check -->
                            <div class="delete">
                                <div class="form-group">
                                    <label class="col-form-label d-block mb-2" for="delete-photo-done">本当に削除しますか？</label>
                                    <button type="button" class="btn btn-danger" id="delete-photo-done">写真を削除する</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-block clearfix">
                <button type="button" class="btn btn-danger float-left editer" id="delete-photo-check">写真を削除</button>
                <div class="float-right">
                    <button class="btn btn-primary photo-update-common" id="edit_done" data-form-action="">保存する</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->

<div class="container">
    <div class="row justify-content-center align-items-stretch">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h2>ギャラリー編集</h2>
                    <p id="test">10個まで写真を登録できます</p>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <hr>         
                    {{-- ul要素に sortable クラスを付けると動かせられる --}}
                    <ul id="photoList" class="list-group list-group-flush">
                        @foreach ($photos as $photo_key => $photo_value)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4">
                                    <img class="listImg" src="{{$photo_value[0]['photo']}}">
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-success" id="edit-item"
                                        data-item-id="{{$photo_key}}">edit</button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary btn-lg btn-block mt-3" id="store-item">+ 写真を追加</button>

                    <a class="btn btn-secondary float-right mt-3"  type="button" href="{{ route('home.setting') }}">戻る</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
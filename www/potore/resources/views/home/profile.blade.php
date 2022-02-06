@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="{{ asset('css/pages/profile.css')}}" rel="stylesheet">
@endsection

{{-- 後で読ませたいスクリプト --}}
@section('laterScript')
<script src="{{ asset('js/bootstrap-multiselect.js') }}" defer></script>
<link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap-datepicker.ja.min.js') }}" defer></script>
<script src="{{ asset('js/pages/profile.js') }}" defer></script>
@endsection

{{-- ページ要素 --}}
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-stretch">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h2>プロフィール編集</h2>
                    <form class="form-loading" action="{{ route('home.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar">アイコン</label>
                            <div class="user-icon-box">
                                <img id="avatar_img"
                                    src="{{Auth::user()->avatar ?? "https://placehold.jp/150x150.png"}}"
                                    class="user-icon img-fluid rounded-circle" alt="">
                                <img class="user-icon img-fluid rounded-circle" id="next_avatar_img" src="" alt="">
                            </div>
                            <label class="button_label btn btn-primary mt-2 mr-2" for="avatar_img_file">
                                ＋写真を選択
                                <input type="file" id="avatar_img_file" name="avatar_img_file" value="アイコンを変更する" accept="image/*">
                            </label>
                            <a class="btn btn-outline-secondary" id="reset_img">アイコンをリセット</a>
                        </div>
                        @error('avatar_img_file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder=""
                                value="{{ old('name', Auth::user()->name)}}" aria-describedby="helpId" maxlength="50">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="roll">rolls</label>
                            <select class="form-control" id="roll" name="id_m_rolls">
                                @foreach ($rolls as $roll)
                                <option value="{{ $roll->id }}" {{ old('id_m_rolls', Auth::user()->id_m_rolls == $roll->id ? 'selected' : '')}}>{{ $roll->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_m_rolls')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="sex">性別</label>
                            <select class="form-control" id="sex" name="sex">
                                <option value="noneType" {{ old('sex', Auth::user()->sex == "noneType" ? 'selected' : '')}}>noneType</option>
                                <option value="男性" {{ old('sex', Auth::user()->sex == "男性" ? 'selected' : '')}}>男性</option>
                                <option value="女性" {{ old('sex', Auth::user()->sex == "女性" ? 'selected' : '')}}>女性</option>
                            </select>
                        </div>
                        @error('sex')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="areas-large-dataprovider">活動地</label>
                            <select id="areas-large-dataprovider" class="multiSelecter" id="areas" name="areas[]"
                                multiple="multiple">
                                @foreach ($areas as $area)
                                <option {{ old('areas[]', $activity_areas->contains('id_areas',$area->id) ? 'selected' : '')}}
                                    value="{{ $area->id }}">
                                    {{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('areas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="fee">希望報酬</label>
                            <select class="form-control" id="fee" name="id_m_fees">
                                @foreach ($fees as $fee)
                                <option value="{{$fee->id }}" {{ old('id_m_fees', Auth::user()->id_m_fees == $fee->id ? 'selected' : '')}}>{{ $fee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_m_fees')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="birthday">誕生日</label>
                            <div class="input-group date" id="birthday">
                                <input type="text" class="form-control" id="datePicker" name="birthday" value="{{ old('birthday', Auth::user()->birthday)}}">
                                <span class="input-group-addon"><i class="glyphicon fa fa-calendar"></i></span>
                            </div>
                        </div>
                        @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="intoro">自己紹介</label>
                            <textarea id="intoro" name="intoro" maxlength="50">{{ old('intoro', Auth::user()->intoro)}}</textarea>
                        </div>
                        @error('intoro')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input class="btn btn-primary btn-block" type="submit" value="変更する">
                    </form>
                    <hr>
                    <a class="btn btn-secondary float-right"  type="button" href="{{ route('home.setting') }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
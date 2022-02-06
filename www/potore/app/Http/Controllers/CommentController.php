<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\commentRequest;
use App\Models\t_user_comment;
use Illuminate\Support\Facades\Auth;



class CommentController extends Controller
{
    public function store(commentRequest $requset, t_user_comment $t_user_comment){
        //書き込みターゲットの判定
        if (!empty($requset->id)) {
            $id = $requset->id > 0 ? $requset->id : Auth::id();
        }else{
            $id = Auth::id();
        }

        //データのセーブ
        $requset->merge(['send_user_id' => Auth::id()]);
        $requset->merge(['target_user_id' => $id]);
        $t_user_comment->fill($requset->except('_token'))->save();
        return redirect('home/'. $id)->with([
            '$type' => 'success',
            '$message' => 'メッセージを投稿しました'
        ]);
    }
}

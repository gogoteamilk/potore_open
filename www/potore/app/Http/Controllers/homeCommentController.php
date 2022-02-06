<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class homeCommentController extends Controller
{
    //ログインしていないと、Postされた時の処理ができないようにする。
    public function __construct() {
        $this->middleware('verified');
    }


    public function store(Request $req){
    //ログインしているユーザーを取得
    $user = Auth::user();   
    $comment_data = new 

    }

}
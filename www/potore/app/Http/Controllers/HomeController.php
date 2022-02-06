<?php

namespace App\Http\Controllers;


use App\Models\t_user_comment;
use App\Models\t_photo;
use App\Models\t_activity_areas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\AppServicesUtility;


class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(int $usreID = 0, User $users, t_user_comment $t_user_comment, t_photo $t_photo, t_activity_areas $activity_areas, AppServicesUtility $AppServicesUtility)
    {
        //ログインの確認
        Auth::check() ? $loginUserID = Auth::id() : $loginUserID = '';

        //idの確認
        if($usreID==0){ $usreID = $loginUserID;} //自分のページにアクセスした場合
        //非ログインユーザーがuser home編集画面に入ろうとした場合
        if($usreID==0 && empty($loginUserID)){ 
            return redirect('/');
        } 
                     
        
        //データの取得
        $users = $users->userShow($usreID);
        //ユーザーの確認
        if(empty($users)){
            return redirect('/');
        }
        $birthday = isset($users->birthday) ? $users->pluck('birthday')->first() : '';
        $users['age'] = AppServicesUtility::ageCalculate($birthday);
        $activity_areas = $activity_areas->userShow($usreID);
        $photos = $t_photo->photoShow($usreID);
        $comments = $t_user_comment->userShow($usreID);


        //自分のページならeditモードで返す
        if($loginUserID == $usreID){
            //editMode
            return view('home' ,compact('users','activity_areas','photos','comments'));
        }else{
            //viewMode
            return view('visiterHome' ,compact('users','activity_areas','photos','comments'));
        }
    }

}

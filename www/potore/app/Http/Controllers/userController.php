<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\emailUpdateRequest;
use App\Http\Requests\passwordUpdateRequest;
use App\Http\Requests\profileUpdateRequest;
use App\Models\t_user_comment;
use App\Models\t_photo;
use App\Models\t_user_photo;
use App\Models\t_activity_areas;
use App\Models\m_area;
use App\Models\m_roll;
use App\Models\m_fee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;  // 追加


class userController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }


    /**
     * ユーザープロフィール編集画面
     * 
     */
    public function profileEdit(t_activity_areas $activity_areas, m_area $areas, m_roll $rolls, m_fee $m_fee)
    {
        $activity_areas = $activity_areas->userShow(Auth::id());
        $rolls = $rolls->index();
        $areas = $areas->index();
        $fees = $m_fee->index();
        return view('home/profile',compact('rolls','activity_areas','areas','fees'));
    }
    /**
     * プロフィール編集画面での変更を反映
     * 
     */
    public function updateUser(profileUpdateRequest $request,t_activity_areas $t_activity_areas)
    {
        //user情報編集処理
        User::updateUser($request);
        //活動地編集処理
        $t_activity_areas->areasUpdate($request);
        return redirect()->route('home.profile')->with('message_alert',"更新しました");
    }

    /**
     * セキュリティ情報の更新画面表示
     * 
     */
    public function securityEdit()
    {
        //user情報を返す
        $user = Auth::user();
        return view('home/security' , compact('user'));
    }

    /**
     * email更新
     */
    public function emailUpdate(emailUpdateRequest $request,User $User)
    {
        $User->emailUpdate($request);
        $response['data']    = [];
        $response['status']  = 'OK';
        $response['summary'] = 'メールアドレス登録に成功しました';

        throw new HttpResponseException(
            response()->json( $response, 200 )
        );
    }

    /**
     * パスワード更新
     */
    public function passwordUpdate(passwordUpdateRequest $request,User $User)
    {
        $User->passwordUpdate($request);
        $response['data']    = [];
        $response['status']  = 'OK';
        $response['summary'] = 'パスワード変更に成功しました';

        throw new HttpResponseException(
            response()->json( $response, 200 )
        );
    }

    /**
     * 全てのデータを消して退会する
     * 
     */
    public function userWithdrawal(Request $request)
    {
        //pwチェック
        if(!(Hash::check($request->request->get('pw'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }
        
        #
        #   多対多はそのユーザーが作成したもの、ユーザーが関連しているものの両方を消す必要がある
        #
       
        
        //t_activity_areas
        $t_activity_areas = new t_activity_areas;
        $t_activity_areas->allDelete();
        
        //t_user_comments
        $t_user_comment = new t_user_comment;
        $t_user_comment->allDelete();
        
        //t_comment_likes
        //$t_comment_likes = new t_comment_likes;
        
        //t_photo_likes
        //$t_photo_likes = new t_photo_likes;
        
        //t_user_photos
        $t_user_photo = new t_user_photo;
        $t_user_photo->allDelete();
        
        //t_photos
        $t_photo = new t_photo;
        $t_photo->allDelete();

        //t_tags
        //$t_tags = new t_tags;
        
        //t_user_tags
        //$t_user_tags = new t_user_tags;       
        
        //t_user_likes
        //$t_user_likes = new t_user_likes;
        
        //user
        $user = new User;
        $user->userDelete();
        return;
    }
}

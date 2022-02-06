<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as httpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'id_m_rolls', 'sex', 'birthday', 'intoro', 'id_m_fees', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    #
    #   index
    #

    /**
     * ユーザー名を検索して返す
     * @return ['name', 'id', 'avater']
     */
    public function fetch(httpRequest $request, string $searchQuery)
    {
        $user = new User();
        $data = $user
            ->whereRaw("match(name) against (? IN BOOLEAN MODE)", [DB::connection()->getPdo()->quote($searchQuery)])
            ->select('name', 'id', 'avatar')
            ->get();
        return $data;
    }

    /**
     * 
     * ユーザー情報から検索して返します
     * @return ['name', 'id', 'avater', 'intoro']
     * 
     */
    public function userSearch(httpRequest $request, string $searchQuery)
    {
        $user = new User();
        $query = $user::query();
        //検索語句
        if(isset($searchQuery)){
            $query->whereRaw("match(name,intoro) against (? IN BOOLEAN MODE)", [DB::connection()->getPdo()->quote($searchQuery)]);
        }
        if(isset($request->sex)){
            $query->where('sex', $request->sex);
        }
        if(isset($request->areas)){
            $query->whereIn('id_m_areas',$request->areas);
        }        
        if(isset($request->fee)){
            $query->where('id_m_fees',$request->fee);
        }
        $data = $query->select('name', 'id', 'avatar', 'intoro')
                ->simplePaginate(10);
        return $data;       
    }


    /**
     * ユーザーの詳細情報を返す
     * 
     * @return id,name,avatar,sex,birthday,intoro,rolls,fees
     * 
     */
    public function userShow(int $id)
    {
        $data = $this
            ->leftJoin('m_rolls', 'users.id_m_rolls', 'm_rolls.id')
            ->leftJoin('m_fees', 'users.id_m_fees', 'm_fees.id')
            ->select('users.id as id', 'users.name as name', 'users.avatar', 'users.sex', 'users.birthday', 'users.intoro', 'm_rolls.name as rolls', 'm_fees.name as fees')
            ->find($id);

        return $data;
    }

    #
    #   update
    #

    public static function updateUser($request)
    {
        //変数宣言
        $user = Auth::user();

        //画像をアップしてた場合
        if ($request->hasFile('avatar_img_file')) {
            $img = $request->file('avatar_img_file');
            $extension = $request->file('avatar_img_file')->getClientOriginalExtension();
            $avatar = $user->avatar;
            if (!empty($avatar)) {
                $photoURL = ltrim($avatar, "/"); //最初の文字が/なら取り除く
                Storage::disk('sftp-disk')->delete("avatar/". basename($photoURL));
            }
            Storage::disk('sftp-disk')->putFileAs( 'avatar' , $img, $user->id . "." . $extension);
            $request->merge(['avatar' => env('SFTP_FILE_PATH'). 'avatar/' . $user->id . "." . $extension]);
            //ftpの保存先を変更した場合は、files/avatar/のところにURLを入れる
        }

        //データ保存
        DB::table('users')
            ->where('id', $user->id)
            ->update($request->except(['_token', 'avatar_img_file', 'areas']));
    }


    /**
     * メールアドレスを変更する
     */
    public function emailUpdate(httpRequest $request)
    {
        $user = Auth::user();
        $user->email = $request->get('email');
        $user->save();
        return;
    }

    /**
     * パスワードを変更する
     */
    public function passwordUpdate(httpRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->get('pw'));
        $user->save();
        return;
    }

    #
    #   delete
    #

    /**
     * ユーザー削除
     */
    public function userDelete()
    {
        //avatar
        $userData = Auth::user();
        $avatar = $userData->avatar;
        if (!empty($avatar)) {
            $photoURL = ltrim($avatar, "/"); //最初の文字が/なら取り除く
            Storage::disk('sftp-disk')->delete("avatar/". basename($photoURL));
        }

        //userData
        $user = new User();
        $user
            ->where('id', Auth::ID())
            ->delete();
        return;
    }
}

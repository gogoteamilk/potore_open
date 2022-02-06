<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class t_photo extends Model
{
    protected $fillable = ['photo', 'title', 'comment', 'post_user_id'];

    #
    #   index
    #

    /**
     * ユーザーに属するgallery画像を返します
     * 
     * @return post_user_id
     * 
     */
    public function photoShow(int $id)
    {
        $photos = $this
            ->leftJoin('t_user_photos', 't_photos.id', 't_user_photos.id_t_photos')
            ->leftJoin('users', 't_user_photos.id_users', 'users.id')
            ->where('t_photos.post_user_id', $id)
            ->select('t_photos.id', 't_photos.photo', 't_photos.title', 't_photos.comment', 'users.id as user_id', 'users.name', 'users.avatar', 't_photos.created_at')
            ->orderBy('t_photos.created_at')
            ->get();

        return $photos->sortBy('id')->groupBy('id')->toArray();
    }

    /**
     * 写真idに紐づくデータを返す
     */
    public function photoInfo(int $id)
    {
        $photos = $this
            ->where('id', $id)
            ->get();

        return $photos;
    }

    /**
     * トップページの写真を取得
     * 現在はランダム
     * @return [ id, photo, userID, name ]
     * 
     */
    public function getHeroPhoto()
    {
        $randomPhotoID = $this->inRandomOrder()->first();
        $photos = $this
            ->leftJoin('t_user_photos', 't_photos.id', 't_user_photos.id_t_photos')
            ->leftJoin('users', 't_user_photos.id_users', 'users.id')
            ->where('t_photos.id', $randomPhotoID->id)
            ->select('t_photos.id', 't_photos.photo', 'users.id as userID', 'users.name')
            ->get();
        
            $photos_array = $photos->groupBy('id')->toArray();
            $photos_array = array_values($photos_array)[0];
            return $photos_array;
    }

    /**
     * おすすめユーザー一覧
     * 現在はランダム
     * @return [ photo, post_user_id, photoID ]
     * 
     */
    public function recommendedUserIndex()
    {
        $data = $this
            ->select('photo', 'post_user_id', 'id as photoID')
            ->inRandomOrder()
            ->limit(10)
            ->get();
        return $data;
    }

    #
    #   update
    #

    /**
     * 写真に付随するデータの更新
     */
    public function photoUpdate(Request $request)
    {
        $this
            ->where('id', $request->request->get('photoID'))
            ->update($request->only(['title', 'comment']));

        return $request->request->get('photoID');
    }

    #
    # store
    #

    /**
     * 写真を新規登録
     */
    public function photoStore(Request $request)
    {
        //データの追加
        $userid = Auth::id();
        $request->merge(['post_user_id' => $userid]);

        //画像処理
        if ($request->hasFile('photoFile')) {
            $img = $request->file('photoFile');
            $extension = $img->getClientOriginalExtension();
            $rand = mt_rand(1000000, 46466464030);
            $newFileName = $rand;
            $newFileName = $userid . '_' . $rand . '.' . $extension;
            Storage::disk('sftp-disk')->putFileAs( 'userphoto', $img, $newFileName);
            $request->merge(['photo' => env('SFTP_FILE_PATH'). 'userphoto/'  . $newFileName]);
            //ftpの保存先を変更した場合は、files/userphoto/のところにURLを入れる
        }
        //データ保存、写真IDが返る
        $id = $this
            ->create($request->only(['photo', 'post_user_id', 'title', 'comment']));

        return $id;
    }

    #
    #   delete
    #

    /**
     *  特定の写真を削除する
     */
    public function photoDelete(Request $request)
    {
        //データの準備
        $photoID = $request->request->get('photoID');
        $photo = $this->where('id', $photoID)->get('photo');
        $photoURL = $photo[0]->photo;

        //画像の削除
        if (!empty($photoURL)) {
            $photoURL = ltrim($photoURL, "/"); //最初の文字が/なら取り除く
            Storage::disk('sftp-disk')->delete("userphoto/". basename($photoURL));
            //ftpの保存先を変更した場合は、/files/など削除
        }

        //レコードの削除
        $this->destroy($photoID);
        return $photoURL;
    }

    /**
     *  userに紐づく写真を全て削除する
     */
    public function allDelete()
    {
        //データの準備
        $userID = Auth::ID();
        $photos = $this->where('post_user_id', $userID)->get();
        $photoURLs = $photos->pluck('photo');
        $photoIDs = $photos->pluck('id');
        
        //画像の削除
        if (!empty($photoURLs)) {
            foreach ($photoURLs as $photoURL) {
                $photoURL = ltrim($photoURL, "/"); //最初の文字が/なら取り除く
                Storage::disk('sftp-disk')->delete("userphoto/". basename($photoURL));
                //ftpの保存先を変更した場合は、/files/など削除
            }
        }

        //レコードの削除
        $this->destroy($photoIDs);
        return;
    }
}

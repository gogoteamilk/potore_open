<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;


class t_user_photo extends Model
{

    #
    #   index
    #

    /**
     * 選択した写真に紐づくクリエイターユーザーを返す
     * @return [ label, value, avatar ]
     * 
     */
    public function creatersIndex(Request $request)
    {
        $data = $this
            ->join('users', 't_user_photos.id_users', 'users.id')
            ->where('id_t_photos', $request->request->get('searchQuery'))
            ->select('users.name as label', 'users.id as value', 'users.avatar')
            ->get();
        return $data;
    }

    #
    #   update
    #

    /**
     * 写真に紐づくクリエイター情報を更新する
     * 
     */
    public function creatersUpadate(Request $request)
    {
        //変数
        $selectPhotoID = $request->request->get('photoID');
        $selectCreaters = $request->request->get('creaters');

        //データ整形
        $nowData = $this
            ->where('id_t_photos', $selectPhotoID)
            ->get();

        if (empty($selectCreaters) && $nowData->isEmpty()) {
            return;
        } //現在のクリエイターと編集後のクリエイターが選ばれていなかったら終了
        $nowCreaters = $nowData->pluck('id_users')->toArray();
        $deleteCreaters = array_diff($nowCreaters, $selectCreaters);
        $newCreaters = array_diff($selectCreaters, $nowCreaters);

        //削除
        if (!empty($deleteCreaters)) {
            $deleteRecord =  $nowData->whereIn('id_users', $deleteCreaters);
            t_user_photo::destroy($deleteRecord->pluck('id')->toArray());
        }
        //追加
        if (!empty($newCreaters)) {
            $merged_collection = new Collection();
            foreach ($newCreaters as $Creaters_id) {
                $merged_collection->push(['id_t_photos' => $selectPhotoID, 'id_users' => $Creaters_id]);
            }
            t_user_photo::insert($merged_collection->toArray());
        }

        return $selectCreaters;
    }

    #
    #   delete
    #

    /**
     *  写真削除に伴う、ユーザーとのリレーションを削除
     */
    public function creatersDelete(Request $request)
    {
        $selectPhotoID = $request->request->get('photoID');
        $this->where('id_t_photos', $selectPhotoID)->delete();
        return;
    }

    /**
     * ユーザー削除に伴う、写真とのリレーションを削除
     */
    public function allDelete()
    {
        $userID = Auth::ID();

        $this
        ->join('t_photos', 't_user_photos.id_t_photos', 't_photos.id')
        ->where('t_photos.post_user_id', $userID)
        ->orwhere('t_user_photos.id_users', $userID)
        ->delete();

        return;        
    }
}

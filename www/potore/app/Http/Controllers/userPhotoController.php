<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_photo;
use App\Models\t_user_photo;
use Illuminate\Support\Facades\Auth;
use App\Services\AppServicesUtility;
use App\Models\User;
use App\Http\Requests\photoUpdateRequest;
use Illuminate\Http\Exceptions\HttpResponseException;  // 追加

class userPhotoController extends Controller
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
     * ユーザーphotoの編集画面表示
     * 
     */
    public function edit(t_photo $t_photo)
    {
        $photos = $t_photo->photoShow(Auth::id());
        return view('home/gallery', compact('photos'));
    }

    /**
     * 検索したユーザを返す
     * @return [id,name,avater]
     */
    public function usersFetch(Request $request, AppServicesUtility $AppServicesUtility)
    {
        $user = new User();
        $searchQuery = $AppServicesUtility->keywordArrange($request->searchQuery);
        $output_list_data = $user->fetch($request, $searchQuery);
        return $output_list_data;
    }

    /**
     * 写真に紐づくユーザを返す
     * choices.jsに合わせるため、用意したよ
     * @return [id,name,avater]
     */
    public function creatersIndex(Request $request, t_user_photo $t_user_photo)
    {
        $output_list_data = $t_user_photo->creatersIndex($request);
        return $output_list_data;
    }

    /**
     * 写真に紐づく情報を返す
     * @return [id,title,comment]
     */
    public function photoInfo(Request $request, t_photo $t_photo)
    {
        $output_list_data = $t_photo->photoInfo($request->request->get('searchQuery'));
        return $output_list_data;
    }


    /**
     * 写真データを更新する
     * 
     */
    public function photoUpdate(photoUpdateRequest $request, t_photo $t_photo, t_user_photo $t_user_photo)
    {
        #photo update
        $newImgID = $t_photo->photoUpdate($request);

        #creaters update
        $t_user_photo->creatersUpadate($request);

        #成功レスポンス
        $response['summary'] = '写真を更新しました';
        $response['id'] = $newImgID;

        throw new HttpResponseException(
            response()->json( $response, 200 )
        );
    }

    /**
     * 写真データを新規追加する
     * 
     */
    public function photoStore(photoUpdateRequest $request, t_photo $t_photo, t_user_photo $t_user_photo)
    {
        #photo store
        $newImgID = $t_photo->photoStore($request);

        #配列にidを追加
        $request->merge(['photoID' => $newImgID->id]);

        #creaters update
        $t_user_photo->creatersUpadate($request);

        #成功レスポンス
        $response['summary'] = '写真を追加しました';
        $response['id'] = $newImgID->id;

        throw new HttpResponseException(
            response()->json( $response, 200 )
        );
    }

    /**
     * 写真データを削除する
     */
    public function photoDelete(Request $request, t_photo $t_photo, t_user_photo $t_user_photo)
    {
        #creaters delete
        $t_user_photo->creatersDelete($request);

        #photo delete
        $t_photo->photoDelete($request);
        
        return;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class t_activity_areas extends Model
{
    public function userShow(int $id)
    {
        return $this
        ->leftJoin('m_areas','t_activity_areas.id_areas','m_areas.id')
        ->where('t_activity_areas.id_users', $id)
        ->select('t_activity_areas.id_areas', 'm_areas.name')
        ->get();
    }

    public function areasUpdate($request){
        //データ整形
        $id = Auth::id();
        $request_areas = $request->areas;
        $nowData =DB::table('t_activity_areas')
        ->where('t_activity_areas.id_users', $id)
        ->select('id','id_users','id_areas')
        ->get();

        $nowAreas = $nowData->pluck('id_areas')->toArray();
        if (!empty($request_areas)) {
            //活動地が設定されている場合
            $deleteAreas = array_diff($nowAreas,$request_areas);
            $newAreas = array_diff($request_areas,$nowAreas);
        }else{
            //活動地の設定が無い場合
            $deleteAreas = $nowAreas;
            $newAreas = "";
        }

        //削除
        if (!empty($deleteAreas)) {   
            $deleteRecord =  $nowData->whereIn('id_areas', $deleteAreas);
            t_activity_areas::destroy($deleteRecord->pluck('id')->toArray());
        }
        //追加
        if (!empty($newAreas)) {   
            $merged_collection = new Collection();
            foreach ($newAreas as $area_id) {
                $merged_collection->push(['id_users'=>$id, 'id_areas' => $area_id]);
            }
            t_activity_areas::insert($merged_collection->toArray());
        }
        return;
    }

    #
    #   delete
    #

    public function allDelete()
    {
        $this
        ->where('id_users', Auth::ID())
        ->delete();
    }
}
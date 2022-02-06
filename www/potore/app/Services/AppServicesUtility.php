<?php

namespace App\Services;

class AppServicesUtility
{
    /**
     * 
     * 誕生日から年齢を計算する
     * 
     */
    public static function ageCalculate($birthday)
    {
        //ガード節
        if(empty($birthday)){return null;}

        //通常処理
        $currentDate = date('Y/m/d');

        $c = (int) date('Ymd', strtotime($currentDate));
        $b = (int) date('Ymd', strtotime($birthday));
        $age = (int) (($c - $b) / 10000);

        return $age;
    }

    /**
     * 
     * 検索ワードを整える
     * 
     */
    public function keywordArrange($requestkeyword)
    {
        //空白で区切る
        $keywordList = preg_split('/(\s|　)/', $requestkeyword);
        $searchQuery = "";
        foreach ($keywordList as $keyword) {
            $searchQuery = $searchQuery. '+'. $keyword. '*';
        } 

        return $searchQuery;
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|max:50", //string('name',50)
            'avatar' => 'bail|image|file|max:5060', //string('avatar')->nullable()
            "id_m_rolls" => "nullable|integer|max:10", //bigInteger('id_m_rolls')
            "sex" => "nullable|max:10", //string('sex',5)->nullable()
            "birthday" => "nullable|date", //date('birthday')->nullable()
            "areas" => "nullable|array|max:5", //bigInteger('id_m_areas')->nullable()
            "areas.*" => "integer|max:50", 
            "intoro" => "nullable|max:500", //text('intoro')->nullable()
            "id_m_fees" => "nullable|integer|max:10", //bigInteger('id_m_fees')->nullable()
        ];
    }

        /**
     * エラー時に表示する項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            "name" => "名前",
            'avatar' => 'アイコン',
            "id_m_rolls" => "rolls",
            "sex" => "性別",
            "birthday" => "誕生日",
            "areas" => "活動地",
            "intoro" => "自己紹介", 
            "id_m_fees" => "希望報酬", 
        ];
    }
}

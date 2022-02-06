<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'body'  => 'required|max:500'
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
            "email" => 'メールアドレス',
            "name" => "ユーザー名",
            "title" => "タイトル",
            "body" => "お問合せ内容"
        ];
    }


}

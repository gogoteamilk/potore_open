<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\t_photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;  // 追加
use Illuminate\Http\Exceptions\HttpResponseException;  // 追加

class photoUpdateRequest extends FormRequest
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
            "photoFile" => [
                'bail',
                'image',
                'file',
                'max:5060',
                function ($attribute, $value, $fail) {
                    #すでに登録画像が10個以上なら速終了させる
                    $t_photo = new t_photo;      
                    if ($t_photo->where('post_user_id',Auth::ID())->get('id')->count() >= 10) {             
                        $fail(':attributeは10個までしか登録できません');
                    }
                }
            ],
            "title" => "nullable|string|max:50",
            "creaters" => "nullable|array|max:5",
            "creaters.*" => "integer",
            "comment" => "nullable|string|max:200"
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
            "photoFile" => '写真',
            "title" => "タイトル",
            "creaters" => "creater",
            "comment" => "コメント"
        ];
    }

    /**
     * エラー時のレスポンス
     *
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        $response['data']    = [];
        $response['summary'] = 'Failed validation.';
        $response['errors']  = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json( $response, 422 )
        );
    }
}

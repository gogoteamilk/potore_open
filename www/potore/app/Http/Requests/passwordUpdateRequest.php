<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;  // 追加
use Illuminate\Http\Exceptions\HttpResponseException;  // 追加

use Illuminate\Foundation\Http\FormRequest;

class passwordUpdateRequest extends FormRequest
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
            "pw" => "required|string|min:6|max:50|confirmed"
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
        $response['status']  = 'NG';
        $response['summary'] = 'Failed validation.';
        $response['errors']  = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json( $response, 200 )
        );
    }
}

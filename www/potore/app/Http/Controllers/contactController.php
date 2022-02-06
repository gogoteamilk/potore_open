<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendmail;
use App\Http\Requests\contactRequest;

class contactController extends Controller
{
    public function confirm(contactRequest $request)
    {
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('information/contact_confirm', [
            'inputs' => $inputs,
        ]);
    }

    public function send(contactRequest $request)
    {

        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        
        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                ->route('contact')
                ->withInput($inputs);
        } else {
            //入力されたメールアドレスにメールを送信
            \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            \Mail::to(config('app.ADMIN_MAIL'))->send(new ContactSendmail($inputs));//管理者に同じメールを送る

            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('information/contact_thanks');
            
        }
    }
}

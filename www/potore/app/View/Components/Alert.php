<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * alertのタイプ
     *
     * @var string
     */
    public $type;

    /**
     * alertのメッセージ
     *
     * @var string
     */
    public $message;

    /**
     * コンポーネントインスタンスの生成
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * コンポーネントを表すビュー／コンテンツの取得
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
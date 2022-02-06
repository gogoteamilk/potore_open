@component('mail::message')
# 【potore】お問合せありがとうございます

お問い合わせ内容を受け付けました。
ご返信まで1週間ほどいただいております。
ご了承ください。

@component('mail::panel')
■メールアドレス<br>
{!! $email !!}<br>
<br>
■ユーザー名<br>
{!! $name !!}<br>
<br>
■タイトル<br>
{!! $title !!}<br>
<br>
■お問い合わせ内容<br>
{!! nl2br($body) !!}<br>
@endcomponent

@endcomponent

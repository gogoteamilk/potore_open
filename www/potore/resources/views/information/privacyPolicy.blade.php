@extends('layouts.app')

{{-- header内でcss,js読み込み --}}
@section('headerScript')
<link href="/css/pages/home.css" rel="stylesheet">
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
@endsection

{{-- 最後にcss,js読み込み --}}
@section('laterScript')
@endsection

{{-- ページ要素 --}}
@section('content')
<div class="container">

    <h1>
        プライバシーポリシー
    </h1>

    <h2>
        個人情報の利用目的
    </h2>

    <p>
        potore(以下「当サイト」という）では、メールでのお問い合わせ、会員登録、メールマガジンへの登録などの際に、名前（ハンドルネーム）、メールアドレス等の個人情報をご登録いただく場合がございます。<br>
        これらの個人情報は質問に対する回答や必要な情報を電子メールなどをでご連絡する場合に利用させていただくものであり、個人情報をご提供いただく際の目的以外では利用いたしません。
    </p>

<h2>
    個人情報の第三者への開示
</h2>

<p>
    当サイトでは、個人情報は適切に管理し、以下に該当する場合を除いて第三者に開示することはありません。
</p>

<ol>
    <li>本人のご了解がある場合</li>
    <li>法令等への協力のため、開示が必要となる場合</li>
</ol>


<h2>
    個人情報の開示、訂正、追加、削除、利用停止
</h2>

<p>
    ご本人からの個人データの開示、訂正、追加、削除、利用停止のご希望の場合には、ご本人であることを確認させていただいた上、速やかに対応させていただきます。
</p>

<h2>
    アクセス解析ツール、およびクッキー(cookie)について
</h2>

<p>
    当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。<br>
    このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。このトラフィックデータは匿名で収集されており、個人を特定するものではありません。この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。
</p>
<p>
    この規約に関して、詳しくは<a href="http://www.google.com/analytics/terms/jp.html" target="_blank" rel="nofollow">こちら</a>、または<a href="https://www.google.com/intl/ja/policies/privacy/partners/" target="_blank" rel="nofollow">こちら</a>をクリックしてください。
</p>


<h2>
    広告の配信について
</h2>
<p>
    当サイトでは、第三者配信の広告サービス（<a href="http://www.google.com/adsense/start/" target="_blank" rel="nofollow">Googleアドセンス</a>、<a href="http://www.a8.net/" target="_blank" rel="nofollow">A8.net</a>、<a href="https://affiliate.amazon.co.jp/" target="_blank" rel="nofollow">Amazonアソシエイト</a>、<a href="https://www.valuecommerce.ne.jp/" target="_blank" rel="nofollow">バリューコマース</a>、<a href="https://www.apple.com/jp/itunes/affiliates/" target="_blank" rel="nofollow">iTunes アフィリエイトプログラム</a>）を利用しています。
このような広告配信事業者は、ユーザーの興味に応じた商品やサービスの広告を表示するため、当サイトや他サイトへのアクセスに関する情報 『Cookie』(氏名、住所、メール アドレス、電話番号は含まれません) を使用することがあります。
またGoogleアドセンスに関して、このプロセスの詳細やこのような情報が広告配信事業者に使用されないようにする方法については、<a href="http://www.google.co.jp/policies/technologies/ads/" target="_blank" rel="nofollow">こちら</a>をクリックしてください。
</p>

<h2>
    免責事項
</h2>
<p>
    当サイトからリンクやバナーなどによって他のサイトに移動された場合、移動先サイトで提供される情報、サービス等について一切の責任を負いません。
</p>
<p>
    当サイトのコンテンツ・情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。
</p>
<p>
    当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。
</p>

<h2>
    プライバシーポリシーの変更について
</h2>
<p>
    当サイトは、個人情報に関して適用される日本の法令を遵守するとともに、本ポリシーの内容を適宜見直しその改善に努めます。
</p>
<p>
    修正された最新のプライバシーポリシーは常に本ページにて開示されます。
</p>
    
</div>
@endsection
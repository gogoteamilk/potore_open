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
    <h1>利用規約</h1>
    <p>
        お客様がStarBrake（以下「管理人」という）が提供する「potore」（以下「本サービス」という）をご利用いただく際の取り扱いにつき定めるものです。<br>
        本利用規約に同意した上で本サービスをご利用ください。
    </p>
    <h2>
        第1条（利用規約について）
    </h2>
    <ol>
        <li>管理人が運営する本サービスについて、これを利用する者（以下「ユーザー」という）は、本利用規約に必ず同意頂き、ご利用ください。</li>
        <li>管理人は、ユーザーの承諾を得ることなく、本規約の内容を改定することができるものとし、会員はこれを承諾するものとする。本規約が改定された後の本サービスの提供条件は、改定後の本規約の条件によるものとします。</li>
        <li>管理人は、本規約を改定するときは、その内容について管理人所定の方法によりユーザーに通知します。</li>
        <li>前2項に定める本規約の改定の効力は、管理人が前項により通知を行った時点から生じるものとします。本規約の内容の改定を承諾しない会員については、本サービスを利用できないものとします。</li>
        <li>本利用規約の等の他、本サービスからリンクされた外のサイトについては、そのサイトの利用規約に同意した上でご利用ください。</li>
        <li>会員登録せず、閲覧のみの場合も本サービスのユーザーとして、当利用規約に基づいて本サービスを利用する必要があります。</li>
    </ol>

    <h2>
        第2条（会員登録）
    </h2>
    <ol>
        <li>本サービスの会員(以下「会員」という)とは、本サービスの利用を申請し、管理人が承認した人のことをいいます。会員は、本サービスの利用申請に際して、管理人の定める一定の情報（以下、「登録事項」という）を管理人に提供していただきます。</li>
        <li>会員は、本サービスの利用にあたり、その都度、本サービス所定の画面で登録事項を入力し、認証を受けること（以下、「ログイン」とする）とします。</li>
        <li>会員は、本サービス利用中に、何らかの事情でデータが破損・滅失した場合のために、会員側で定期的にデータをバックアップすることを遵守するものとします。会員がバックアップを取らなかった場合による損害については、管理人は責任を持たないものとします。</li>
        <li>管理人は、会員登録を申請したユーザーが、過去に会員登録を取り消された者であった場合、本規約に違反するおそれがあると管理人が判断した場合等、 管理人が登録を適当でないと判断した場合、登録を拒否することができるものとし、ユーザーはこれに対して一切異議を述べないものとします。</li>
    </ol>
    
    
    <h2>
        第3条（会員情報について）
    </h2>
    <ol>
        <li>会員になろうとするユーザーは、登録事項について、自己責任の下、任意に登録、管理するものとします。会員は、第三者にパスワードを使用されることのないよう、以下の事項を守らなければなりません。</li>
        <ol>
            <li>メールアドレスを変更した場合は、システムを通して正規の手段により管理人へ変更通知を行うこと</li>
            <li>不審なログインの兆候が確認された場合は、速やかにパスワードを変更すること</li>
            <li>容易に第三者に推測されないパスワードとすること</li>
            <li>第三者に自己のパスワードを公開しないこと</li>
            <li>複数の人間が使用するコンピューター並びに携帯端末上で本サービスを利用する場合は、本サービスの利用を終えるときに必ずログアウトしウェブブラウザを終了させること</li>
        </ol>
        <li>会員になろうとするユーザーは第三者の情報を入力して、第三者になりすまして会員登録をすることは許されません。</li>
        <li>会員は登録メールアドレス及びパスワード、会員としての地位、本規約及び本サービスに関する権利及び義務について、 これを第三者に対して譲渡し、貸与し、承継し、名義変更し又は担保として提供等してはならず、これを第三者の用に供することはできないものとします。</li>
        <li>管理人は、登録されたパスワードによって本サービスの利用があった場合、利用登録を行った本人が利用したものと扱うことができ、当該利用によって生じた結果ならびにそれに伴う一切の責任については、利用登録を行った本人に帰属するものとします。</li>
        <li>会員は、パスワードの不正使用によって管理人または第三者に損害が生じた場合、管理人および第三者に対して、当該損害を賠償するものとします。また、登録情報の管理は、会員が自己の責任の下で行うものとし、登録情報が不正確または虚偽であったために会員が被った一切の不利益及び損害に関して、管理人は責任を負わないものとします。</li>
        <li>会員は、本サービスを、年齢や利用環境等の条件に応じて、管理人の定める範囲内で利用できるものとします。</li>
        <li>会員登録情報は、管理人が所有するものとし、個人が特定できる情報（氏名・住所・電話番号・メールアドレス）については、本サービス提供に必要な範囲内での委託先への預託の他、会員本人による開示の承諾があるものを除き、原則として、第三者への提供は行わないこととします。</li>
        <li>
            前項にかかわらず、以下の場合については、当該会員の同意なく会員情報の一部を開示することがあります。
        </li>
        <ol>
            <li>管理人及び他の会員もしくは第三者に不利益を及ぼすと判断した場合、警察または関連諸機関に開示する場合</li>
            <li>警察、裁判所、検察庁、弁護士会、消費者センターまたはこれらに準じた権限を有する機関から、登録情報の開示を求められた場合、管理人がこれに応じることを判断した場合</li>
            <li>その他管理人が開示を相当であると判断した場合</li>
        </ol>
    </ol>
    
    <h2>
        第4条（未成年者）
    </h2>
    <p>
        未成年者が会員になろうとする場合、当該未成年者は、その責任において、会員登録及び本サービスを利用する都度、事前に、 保護者の同意を得るものとします。万一、保護者の同意がない場合、管理人は当該同意がないことに関し一切責任を負いません。
    </p>
      

    <h2>
        第5条（個人情報について）
    </h2>
    <p>
    個人情報は、管理人が別途定めるプライバシー・ポリシーに則り、適正に取り扱うものとします。
    </p>

    <h2>
        第6条（禁止行為）
    </h2>
    <p>
        本サービスの利用に際し、管理人は、ユーザー及び会員（以下「ユーザー等」という）に対し、次に掲げる行為を禁止します。違反した場合、利用停止、投稿削除等、管理人が必要と判断した措置を取ることができます。
    </p>
    <ol>
        <li>管理人または第三者の知的財産権を侵害する行為</li>
        <li>管理人または第三者の名誉・信用を毀損または不当に差別もしくは誹謗中傷する行為</li>
        <li>管理人または第三者の財産を侵害する行為、または侵害する恐れのある行為</li>
        <li>管理人、他の会員若しくは利用者又は第三者の保有する著作権等の知的財産権、肖像権、プライバシーの権利、名誉、その他の権利又は利益を侵害する行為</li>
        <li>管理人または第三者に経済的損害を与える行為</li>
        <li>管理人または第三者に対する脅迫的な行為</li>
        <li>会員が、以下の情報を投稿すること</li>
        <ol>
            <li>第三者の権利及び財産に対して損害を与えるリスクのある情報</li>
            <li>第三者に対して有害な情報、第三者を身体的・心理的に傷つける情報</li>
            <li>自殺、自傷行為、薬物乱用を誘引または助長する表現</li>
            <li>露骨な性的表現</li>
            <li>過度に暴力的な表現</li>
            <li>犯罪や不法行為、危険行為に属する情報及びそれらを教唆、幇助する情報</li>
            <li>不法、有害、脅迫、虐待、人種や性別による差別、中傷、名誉棄損、侮辱、ハラスメント、扇動、不快を与えることを意図し、もしくはそのような結果を生じさせる恐れのある内容を持つ情報</li>
            <li>事実に反する、または存在しないとわかっている情報</li>
            <li>会員自身がコントロール可能な権利を持たない情報</li>
            <li>第三者の著作物を含む知的財産権やその他の財産権を侵害する情報、公共の利益または個人の権利を侵害する情報</li>
            <li>わいせつ、児童ポルノまたは児童虐待にあたる内容を持つ情報</li>
            <li>その他管理人が不適切と判断した情報</li>
        </ol>
        <li>反社会的勢力に対して直接または間接に利益を供与する行為</li>
        <li>コンピュータウィルス、有害なプログラムを使用またはそれを誘発する行為</li>
        <li>宗教やビジネス、政党等の勧誘、マーケティング、広告等の行為</li>
        <li>面識のない異性との出会いや交際を目的とする行為</li>
        <li>本サービス用インフラ設備に対して過度な負担となるストレスをかける行為</li>
        <li>当サイトのサーバーやシステム、セキュリティへの攻撃</li>
        <li>第三者のアカウント情報を取得しようと試みる行為</li>
        <li>管理人提供のインターフェース以外の方法で管理人サービスにアクセスを試みる行為</li>
        <li>上記の他、管理人が不適切と判断する行為</li>
    </ol>
 
    <h2>
        第7条（本サービス内コンテンツの権利）
    </h2>
    <ol>
        <li>ユーザー等は、本サービスのコンテンツを管理人の定める範囲内でのみ使用することができるものとします。</li>
        <li>本サービスで提供されるすべてのコンテンツに関する権利は管理人または管理人にライセンスを許諾している者に帰属しており、ユーザーに対し、管理人ウェブサイト、管理人または管理人にライセンスに許諾している者の知的財産権の使用許可を意味するものではありません。</li>
        <li>ユーザー等は、管理人の定める使用範囲を超えていかなる方法によっても複製、送信、譲渡（会員同士の売買も含みます）、貸与、翻訳、翻案、無断転載、二次使用、営利目的の使用、改変、逆アセンブル、逆コンパイル、リバースエンジニアリング等を行うことを禁止します。</li>
        <li>前項にかかわらず、退会等により会員が会員資格を喪失した場合は、提供されたコンテンツの使用権も消滅するものとします。</li>
        <li>ユーザー等は、投稿データについて、自らが投稿その他送信することについての適法な権利を有していること、および投稿データが第三者の権利を侵害していないことについて、管理人に対し表明し、保証するものとします。</li>
        <li>ユーザー等は、投稿データについて、管理人に対し、無償にて、世界的、非独占的、サブライセンス可能かつ譲渡可能な使用、複製、配布、派生著作物の作成、表示及び実行に関するライセンスを付与します。</li>
        <li>ユーザー等が投稿したデータの著作権は、ユーザー等に帰属します。</li>
    </ol>
    
    
<h2>
    第8条（免責）
</h2>
<ol>
    <li>管理人は、ユーザー等の本サービス利用環境について一切関与せず、また一切の責任を負いません。</li>
    <li>管理人は、本サービスの内容変更、中断、終了によって生じたいかなる損害についても、一切責任を負いません。</li>
    <li>管理人は、本サービスの各ページからリンクしているホームページに関して、合法性、道徳性、信頼性、正確性について一切の責任を負いません。</li>
    <li>管理人は、本サービスを利用したことにより直接的または間接的にユーザー等に発生した損害について、一切賠償責任を負いません。</li>
    <li>管理人は、ユーザー等その他の第三者に発生した機会逸失、業務の中断その他いかなる損害（間接損害や逸失利益を含みます）に対して、管理人係る損害の可能性を事前に通知されていたとしても、一切の責任を負いません。</li>
    <li>第1項ないし前項の規定は、管理人に故意または重過失が存する場合または契約書が消費者契約法上の消費者に該当する場合は適用しません。</li>
    <li>ユーザー等同士の個別の連絡については、会員同士が責任をもって行うものとし、管理人は一切責任を負わないものとします。会員同士でトラブルになった場合でも、会員同士の責任で解決するものとし、管理人には一切の責任を請求しないものとします。</li>
    <li>本サービスの利用に関し管理人が損害賠償責任を負う場合、ユーザー等が管理人に本サービスの対価として、過去12か月間に支払った総額を上限とします。</li>
    <li>ユーザー等は、本サービスの利用に関連し、ほかのユーザー等に損害を与えた場合または第三者との間に紛争を生じた場合、自己の費用と責任において係る損害を賠償または係る紛争を解決するものとし、管理人には一切の迷惑や損害を与えないものとする。</li>
    <li>ユーザー等の行為により、第三者から管理人が損害賠償の請求をされた場合には、ユーザー等の費用（弁護士費用）と責任で、これを解決するものとします。管理人が、当該第三者に対して、損害賠償金を支払った場合には、ユーザー等は、管理人に対して当該損害賠償金を含む一切の費用（弁護士費用および逸失利益を含む）を支払うものとします。</li>
    <li>ユーザー等が本サービスの利用に関連して管理人に損害を与えた場合、ユーザー等の費用と責任において管理人に対して損害を賠償（訴訟費用および弁護士費用を含む）するものとします。</li>
    <li>本サービスは、第三者の提供するＳＮＳサービス等、外部サービスと連携してサービスを提供する場合がありますが、 ユーザー等は、自らの責任において外部サービスを利用するものとし、当社は、外部サービスの利用に関連して利用者に発生した損害について、 一切責任を負いません。利用者は、外部サービスの利用にあたっては、当該外部サービスの利用規約等を遵守するものとします。</li>
</ol>

    <h2>
        第9条（広告の掲載について）
    </h2>
    <p>
        ユーザー等は、本サービス上にあらゆる広告が含まれる場合があること、管理人またはその提携先があらゆる広告を掲載する場合があることを理解し、これを承諾したものとみなします。本サービス上の広告の形態や範囲は、管理人によって随時変更されます。
    </p>

    <h2>
        第10条（権利譲渡の禁止）
    </h2>
    <ol>
        <li>ユーザー等は、あらかじめ管理人の書面による承諾がない限り、本規約上の地位および本規約に基づく権利または義務の全部または一部を第三者に譲渡してはならないものとします。</li>
        <li>管理人は、本サービスの全部または一部を管理人の裁量により第三者に譲渡することができ、その場合、譲渡された権利の範囲内で会員のアカウントを含む、本サービスに係るユーザー等の一切の権利が譲渡先に移転するものとします。</li>
    </ol>   

    <h2>
        第11条（分離可能性）
    </h2>
    <p>
        本規約のいずれかの条項またはその一部が、消費者契約法その他の法令等により無効または執行不能と判断された場合であっても、本規約の残りの条項および一部が無効または執行不能と判断された条項の残りの部分は、継続して完全に効力を有するものとする。
    </p>

    <h2>
        第12条（本サービスの変更または終了）
    </h2>
    <ol>
        <li>管理人は、管理人の都合により、本サービスの内容を変更し、または提供を終了することができるものとします。ただし、管理人が本サービスを終了する場合には、管理人指定の方法により、管理人はユーザー等に事前に通知するものとします。</li>
        <li>管理人は、前項に基づき本サービスの内容を変更したこと、または提供を終了したことによりユーザー等に生じた損害について、一切の責任を負いません。</li>
   </ol>

    <h2>
        第13条（存続規定）
    </h2>
    <p>
        本規約のうち会員情報に関する条項、および、本サービス内コンテンツの権利に関する条項については、退会その他の事由により会員の会員登録が取り消された後も有効に存続するものとし、 当該会員の退会後もなお適用されるものとします。
    </p>

    <h2>
        第14条（事業譲渡等）
    </h2>
    <p>
        管理人が本サービスに関する事業を他社に譲渡等した場合には、当該事業譲渡に伴い管理人が本規約上有する地位、 本規約に基づく権利及び義務並びにユーザー等及びユーザー等の情報や投稿したコンテンツその他の顧客情報を当該事業譲渡の譲受人に譲渡することができるものとし、 ユーザー等は、かかる譲渡につき予め承諾します。なお、本項に定める事業譲渡等には、通常の事業譲渡のみならず、 会社分割その他事業が移転する一切の場合を含むものとします。
    </p>

    <h2>
        第15条（準拠法）
    </h2>
    <p>
        本規約の有効性、解釈および履行については、日本法に準拠し、日本法に従って解釈されるものとします。
    </p>

    <h2>
        第16条（管理裁判所）
    </h2>
    <p>
        ユーザー等と管理人との間で訴訟が生じた場合、東京地方裁判所を専属的管轄裁判所とします。
    </p>


    <p>
        以上
    </p>

    <p>2020年7月1日制定</p>

</div>
@endsection
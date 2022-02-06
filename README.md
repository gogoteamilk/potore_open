# 写真で見つけるSNS potore

## 概要
ポートレート写真を撮るカメラマンやモデルが作品を掲示して交流を楽しむSNSです。<br>
ユーザーページはログインせず閲覧可能です。<br>
また、ログイン後は自分のページを持ち、作品を公開することができ、掲示板機能で交流することができます。<br>
本プログラムは2020年3月~2020年8月に作成しました。<br>
当時社内システムを整備していくことから、PHPやjavascript(jQuery)のスキルアップのために始めました。<br>
やる気を出すために、フレームワークやDBなど他の興味も合わせてSNSを作成することにしました。<br>

## 本プログラム作成の目的
 - PHPの操作に慣れる
 - jQueryに慣れる
 - MVCモデルのフレームワークの構造を理解し、実際に作成する。
 - DBをER図から設計し、実装する
 - Dockerを利用してローカルで開発する
 - ストレージやメールサーバーなど外部システムを利用する
 - DNS設定をできるようになる

## 機能一覧
 - ユーザー登録
 - ソーシャルログイン機能(twitter)
 - ユーザー削除（関連情報も合わせて削除します）
 - ログイン
 - プロフィール編集
 - アイコン画像登録(外部サーバーにSFTP接続して保存しています)
 - 写真作品の投稿(外部サーバーにSFTP接続して保存しています)
 - 写真作品に対しての情報登録
 - 写真作品に共同制作者情報を登録できる
 - 登録された写真作品のディスプレイ
 - 登録された写真からランダムにトップページのヒーロー画像に使用する
 - 登録された写真からランダムにトップページのギャラリーに掲載する
 - ユーザー検索（ユーザー名、ユーザー情報から広くOR検索します）
 - 各ユーザーのマイページに掲示板機能

## ディレクトリ構造
laravelの基本通りのMVCの配置をしています。<br>
以下に主要ファイルの構造を紹介します。<br>
### 管理用ファイル
ルーター設定: ./www/potore/routes/web.php<br>
### 主なVIEW
VIEWに関するファイルを格納する: ./www/potore/resources/views<br>
トップページ: ./www/potore/resources/views/index.blade.php<br>
ユーザーマイページ系: ./www/potore/resources/views/home<br>
お問合せ系: ./www/potore/resources/views/contact<br>
認証系: ./www/potore/resources/views/auth<br>
### MODEL
MODELファイルを格納する: ./www/potore/app/Models<br>
各ファイル名とテーブル名が一致しています<br>
### 主なCONTROLLER
CONTROLLERファイルを格納する: ./www/potore/app/Http/Controllers<br>
ユーザー情報操作: ./www/potore/app/Http/Controllers/userController.php<br>
投稿写真操作: ./www/potore/app/Http/Controllers/userPhotoController.php<br>
ユーザー検索: ./www/potore/app/Http/Controllers/userSearchController.php<br>
掲示板投稿: ./www/potore/app/Http/Controllers/CommentController.php<br>
問合せ: ./www/potore/app/Http/Controllers/contactController.php<br>
### マイグレーションファイル
各種テーブルの設定: ./www/potore/database/migrations/<br>
シーダー: ./www/potore/database/seeds<br>
ER図: ./ERDiagram.jpg<br>

## Docker
### Dockerを採用した理由
Dockerを使用し、ローカルで開発しました。<br>
Dockerを利用した理由は、VMよりも柔軟に環境を用意でき、作成過程をDockerファイルやdocker-compose.ymlに残るため今後の参考にすることができるからです。<br>
また、パフォーマンスを考えなければ、そのままVPSにデプロイできたことから丁度よいと考えました。<br>
### 各コンテナ
https-portal: フロントのWebサーバー。SSL化に利用しました。後から試しに乗せたため、webサーバーが複数あるという構造になっています。<br>
nginx: Webサーバー。requestに合わせて、phpコンテナへ流すか、nginx内のファイルを参照するかを判断しています。<br>
php: アプリケーションサーバー。Laravelが実行されています。<br>
mysql: DBサーバー。mariadb:10.4を使用しています。<br>
phpmyadmin: データベース接続クライアントツール。8080ポートで公開しています。<br>
mailhog: テスト用のメールクライアント。8025ポートで受信ボックスを見ることができます。<br>
### 実行方法
本リポジトリをクローンしてください。<br>
docker環境を整えます。<br>
その後、コンテナ間のネットワークの追加のため「docker network create appnet」を実行します。<br>
docker-compose.ymlと同じディレクトリで、「docker-compose up -d」を実行します。<br>
laravelの初期化処理が自動化できなかったため、phpのコンテナに入ります「docker container exec -it ドッカーコンテナ名 bash」を実行します。<br>
なおドッカーコンテナ名は「docker ps」で一覧表示されるNAMESを参照します。<br>
phpのコンテナ内で「sh /root/docker-entrypoint.sh」を実行します。<br>
自動的に必要なファイルのインストールおよび、DBのマイグレーション、初期データの追加が行われます。<br>
ブラウザで「http://localhost:8000/」にアクセスするとトップページを開くことができます。<br>
※本実行をテストするため当リポジトリに.envファイルが含まれています。<br>

## 本番環境
VPSを借りてDockerのままデプロイしています。<br>
Webサーバーからアプリケーションサーバー、DBサーバーまで全てが1つのインスタンスに含まれています。<br>
オーケストレーションを利用してサーバーを分けなかった理由は、動作テストのためであり、パフォーマンスを気にしなかったためです。<br>
また、本番環境ではテスト環境と異なり、外部メールサーバーから実際にメールを送信しています。<br>
なお、画像はSFTPで外部のレンタルサーバーに保存していましたが、保存先の環境を変えてしまったため、現在は保存できません。<br>
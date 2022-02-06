#!/bin/sh

#初回起動時のみlaravelインストール
if [ ! -d "/var/www/potore/vendor" ]; then
  cd /var/www/potore
  composer install
  #npmの準備
  npm install
  npm run production
fi

#sosilite googleproviderのエンドポイント変更
sed -i -e "s|https://www.googleapis.com/plus/v1/people/me|https://accounts.google.com/o/oauth2/auth|g" vendor/socialiteproviders/google/Provider.php

#envファイルの生成
cd /var/www/potore
cp .env.example .env
php artisan key:generate

#マイグレーション
php artisan migrate --force
php artisan db:seed --force

#パーミッション設定
chmod 777 /var/tmp
chmod 777 -R storage/
chmod 700 /var/www/potore/.ssh
chmod 600 /var/www/potore/.ssh/hoshikabi.key
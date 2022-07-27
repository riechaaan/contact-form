## 概要
Laravelの学習のために、お問い合わせフォーム(入力画面→　確認画面　→　完了画面)を作成しました。

## 環境
* PHP 7.2以上
* Laravel 6.x
* Composer 2
* MySQL 5.7

## ローカル環境構築手順
1. git clone
2. .env.example をリネームして.env作成
3. .envにDB接続情報記載
4. スキーマ(DB)作成
5. composer install
6. php artisan migrate
7. php artisan key:generate

# Atte(勤怠管理システム)
- 企業の勤怠管理システムです。

## 機能一覧
- Fortifyを用いた認証機能付き
- 勤怠ページ
- 日付別勤怠ページ

## 使用技術
- PHP 7.4.9
- Laravel 8.x
- MySQL 8.0.26

# 環境構築
## Docker
- git clone git@github.com:sakuya10969/atte.git
- docker-compose up -d --build

## Laravel
- docker-compose exec php bash
- composer install
- cp .env.example .env
- .envファイルのDBの環境変数を下記に変更

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

- php artisan key:generate
- php artisan migrate
- php artisan db:seed

# URL
- 開発環境:https://localhost/
- phpMyAdmin:https://localhost:8080/

# テストユーザー
- username:test
- email:test@a.com
- password:testpass

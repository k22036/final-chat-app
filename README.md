# chat app

## 環境設定

### .env

・52行目

```env
MAIL_USERNAME=example@gmail.com
```

適切なメールアドレスに変える

・53行目

```env
MAIL_PASSWORD=password
```

適切なアプリパスワードに変える

以下はアプリパスワードへのリンク

[https://myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords)

## Dockerを使って動かす

```zsh
make build
```

```zsh
make start
```

## cloneした場合

.env.exampleに従って環境設定をする必要があります

## 開発用

以下は開発用

### start

```zsh
php artisan serve
```

### DB migrate

```zsh
php artisan migrate
```

freshする場合

```zsh
php artisan migrate:fresh
```

## 利用技術

・Supabase

・Laravel Breeze

## 課題

・同じ名前のユーザが存在している時の処理が怪しい

・アイコンの機能が未実装

・ユーザ情報を変更した際の処理を考える必要あり

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

Docker環境が必要です

### ビルド

```zsh
make build
```

### アプリケーションの起動

```zsh
make start
```

起動するとターミナルにアプリケーションのリンクが出てきます

## cloneした場合

以下はこのプロジェクトのgithubのレポジトリです

こちらからクローンしてください

[https://github.com/k22036/final-chat-app](https://github.com/k22036/final-chat-app)

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

### 参考

[GitのコミットメッセージにPrefixをつけよう！](https://qiita.com/a_ya_ka/items/c472a02051d78e4c0855)

[Creating a Laravel Project](https://laravel.com/docs/11.x/installation#creating-a-laravel-project)

[Use Supabase with Laravel](https://supabase.com/docs/guides/getting-started/quickstarts/laravel)

## 課題

・同じ名前のユーザが存在している時の処理が怪しい

・アイコンの機能が未実装

・ユーザ情報を変更した際の処理を考える必要あり

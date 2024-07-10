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

## 開発用

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

## 課題

・同じ名前のユーザが存在している時の処理が怪しい
・アイコンの機能が未実装

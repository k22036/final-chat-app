# chat app

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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>エラー</title>

    <style>
        body {
            background: linear-gradient(90deg, rgba(233,238,242,1) 0%, rgba(158,184,188,1) 33%, rgba(132,165,169,1) 66%, rgba(97,139,144,1) 100%);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            width: 60%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }

        .header {
            background-color: rgb(176, 239, 218);
            border-radius: 10px 10px 0 0;
            padding: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .content-container {
            padding: 20px;
            text-align: center;
        }

        .error-message {
            color: red;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .home-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #119160;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #0a5e44;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            エラー
        </div>
        <div class="content-container">
            <p class="error-message">申し訳ありませんが、エラーが発生しました。</p>
            <p>以下のリンクからトップページに戻ることができます。</p>
            <a href="/" class="home-link">トップページへ</a>
        </div>
    </div>
</body>
</html>

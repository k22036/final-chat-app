<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー</title>

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
            width: 40%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .close-icon {
            width: 30px;
            height: 30px;
            fill: #333;
            cursor: pointer;
            transition: fill 0.3s;
        }

        .close-icon:hover {
            fill: #555;
        }

        .img-container {
            margin-bottom: 20px;
        }

        .profile-img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }

        .name-container {
            font-size: 20px;
            margin-bottom: 40px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .talk-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .to-talk {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .talk-icon {
            width: 100%;
            height: 100%;
            fill: #333;
            transition: fill 0.3s;
        }

        .talk-icon:hover {
            fill: #555;
        }

        .talk-text {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="close-icon"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        </div>
        <div class="img-container">
            <img src="https://placehold.jp/150x150.png" alt="" class="profile-img">
        </div>
        <div class="name-container">
            {{ $user['name'] }}
        </div>
        <div class="talk-container">
            <div class="to-talk">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="talk-icon"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M168.2 384.9c-15-5.4-31.7-3.1-44.6 6.4c-8.2 6-22.3 14.8-39.4 22.7c5.6-14.7 9.9-31.3 11.3-49.4c1-12.9-3.3-25.7-11.8-35.5C60.4 302.8 48 272 48 240c0-79.5 83.3-160 208-160s208 80.5 208 160s-83.3 160-208 160c-31.6 0-61.3-5.5-87.8-15.1zM26.3 423.8c-1.6 2.7-3.3 5.4-5.1 8.1l-.3 .5c-1.6 2.3-3.2 4.6-4.8 6.9c-3.5 4.7-7.3 9.3-11.3 13.5c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c5.1 0 10.2-.3 15.3-.8l.7-.1c4.4-.5 8.8-1.1 13.2-1.9c.8-.1 1.6-.3 2.4-.5c17.8-3.5 34.9-9.5 50.1-16.1c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9zM144 272a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
            </div>
            <div class="talk-text">
                トーク
            </div>
        </div>
    </div>
</body>
</html>
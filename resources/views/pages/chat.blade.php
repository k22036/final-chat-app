<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>チャット</title>

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
            height: 90vh;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            justify-content: space-between;
            background-color: rgb(176, 239, 218);
            border-radius: 10px 10px 0 0;
            padding: 20px;
            font-size: 24px;
            text-align: center;
            font-weight: bold;
        }

        .back {
            width: 15px;
            height: 15px;
            fill: #333;
            cursor: pointer;
            transition: fill 0.3s;
        }

        .reload {
            width: 20px;
            height: 20px;
            fill: #333;
            cursor: pointer;
            transition: fill 0.3s;
        }

        .chat-container {
            flex: 1;
            padding: 20px;
            overflow-y: scroll;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .msg-container {
            display: flex;
            align-items: flex-end;
            margin: 10px 0;
        }

        .msg-right {
            justify-content: flex-end;
            text-align: right;
        }

        .msg-right > .msg {
            text-align: left;
        }

        .msg-left {
            justify-content: flex-start;
            text-align: left;
        }
        
        .msg {
            max-width: 60%;
            padding: 10px 15px;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow-wrap: break-word;
        }

        .img-container {
            margin: 0 10px;
        }

        .img-container img {
            border-radius: 50%;
        }

        .msg-right .msg {
            background-color: #119160;
            color: white;
        }

        .msg-left .msg {
            background-color: #f1f1f1;
        }

        .send-container {
            display: flex;
            padding: 10px 0 10px 20px;
            border-top: 1px solid #ddd;
        }

        .text-container {
            flex: 1;
            margin-right: 10px;
        }

        textarea {
            width: 98%;
            height: 50px;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
            resize: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .submit-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
            width: 50px;
            height: 50px;
            background-color: #119160;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-container:hover {
            background-color: #0a5e44;
        }

        .send-icon {
            width: 24px;
            height: 24px;
            fill: white;
        }
    </style>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
        const chatArea = document.getElementById('chat-container');
        const chatAreaHeight = chatArea.scrollHeight;
        chatArea.scrollTop = chatAreaHeight;
        })
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="back" onclick="window.location='/home';">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
            </div>
            {{ $user['name'] }}
            <form method="POST" action="{{ route('chat') }}">
                @csrf
                <input type="hidden" name="target" value="{{ hash('sha256', $user['user_id']) }}">
                <div class="reload" onclick="event.preventDefault();this.closest('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M386.3 160H336c-17.7 0-32 14.3-32 32s14.3 32 32 32H464c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32s-32 14.3-32 32v51.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0s-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3s163.8-62.5 226.3 0L386.3 160z"/></svg>
                </div>
            </form>
        </div>
        <div class="chat-container" id="chat-container">
            @foreach ($contents as $content)
                @if ($content['created_by'] === $user['user_id'])
                    <div class="msg-container msg-left">
                        <div class="img-container">
                            <img src="https://placehold.jp/150x150.png" alt="" width="50px" height="50px">
                        </div>
                        <div class="msg">
                            {{ $content['content'] }}
                        </div>
                    </div>
                @else
                    <div class="msg-container msg-right">
                        <div class="msg">
                            {{ $content['content'] }}
                        </div>
                        <div class="img-container">
                            <img src="https://placehold.jp/150x150.png" alt="" width="50px" height="50px">
                        </div>
                    </div>
                    
                @endif
            @endforeach
        </div>

        <form method="POST" action="{{ route('add-content') }}">
            @csrf
            <input type="hidden" name="target" value="{{ hash('sha256', $user['user_id']) }}">
            <input type="hidden" name="room_id" value="{{ $room_id }}">
            <div class="send-container">
                <div class="text-container">
                    <textarea name="content"></textarea>
                </div>
                <div class="submit-container" onclick="event.preventDefault();this.closest('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="send-icon"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z"/></svg>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
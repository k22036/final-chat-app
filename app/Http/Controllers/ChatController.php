<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;


class ChatController extends Controller
{
    public function chat(Request $request)
    {
        if ($request->has('target')) {
            $User = new User();
            $user = $User->fetchUser($request->input('target'));
            $me = $request->user();

            $Room = new Room();
            if (!$Room->exitRoom($me, $user)) {
                $Room->createRoom($me, $user);
            }
            $room_id = $Room->getRoomID($me, $user);
            $contents = $Room->fetchContents($room_id);

            return view('pages.chat', ['user' => $user, 'room_id' => $room_id, 'contents' => $contents]);
        }
        return view('pages.error');
    }

    public function addContent(Request $request)
    {
        if ($request->has('room_id') && $request->has('content')) {
            if (empty($request->input('content'))) {
                return $this->chat($request);
            }
            $Room = new Room();
            $Room->addContent($request->input('room_id'), $request->input('content'), $request->user());
            return $this->chat($request);
        }
        return view('pages.error');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'content',
        'created_by',
    ];

    /**
     * Get the room ID
     *
     * @param array<string, string> $user1
     * @param array<string, string> $user2
     * @return string
     */
    public function getRoomID($user1, $user2)
    {
        $temp = [$user1, $user2];
        usort($temp, function ($a, $b) {
            return $a['user_id'] <=> $b['user_id'];
        });
        $hash1 = hash('sha256', $temp[0]['user_id'] . $temp[0]['email']);
        $hash2 = hash('sha256', $temp[1]['user_id'] . $temp[1]['email']);

        return $hash1 . $hash2;
    }

    /**
     * Check if the room exists
     *
     * @param array<string, string> $user1
     * @param array<string, string> $user2
     * @return bool
     */
    public function exitRoom($user1, $user2)
    {
        return Room::where('room_id', $this->getRoomID($user1, $user2))->count() > 0;
    }

    /**
     * Create a room
     *
     * @param array<string, string> $user1 this is the current user
     * @param array<string, string> $user2
     * @return void
     */
    public function createRoom($user1, $user2)
    {
        $room = new Room();
        $room->room_id = $this->getRoomID($user1, $user2);
        $room->content = '';
        $room->created_by = $user1['user_id'];

        $manager = new RoomsManager();
        $manager->openRoom($room->room_id, $user1['name'], $user2['name'], $user1['user_id'], $user2['user_id']);

        $room->save();
    }

    /**
     * Fetch the contents of the room
     *
     * @param string $roomID
     * @return string
     */
    public function fetchContents($roomID)
    {
        $contents = Room::where('room_id', $roomID)->get()->sortBy('created_at')->toArray();
        $res = array_filter($contents, function ($content) {
            return $content['content'];
        });
        return $res;
    }

    /**
     * Add content to the room
     *
     * @param string $roomID
     * @param string $content
     * @param array<string, string> $user
     * @return void
     */
    public function addContent($roomID, $content, $user)
    {
        $room = new Room();
        $room->room_id = $roomID;
        $room->content = $content;
        $room->created_by = $user['user_id'];

        $manager = new RoomsManager();
        $manager->updateRoom($room->room_id);

        $room->save();
    }

    /**
     * Delete contents by user
     * 
     * @param array<string, string> $user
     * @return void
     */
    public function deleteContentsByUser($user)
    {
        $hashedID = hash('sha256', $user['user_id'] . $user['email']);

        // 前方一致または後方一致するものを削除
        Room::where('room_id', 'like', $hashedID . '%')->delete();
        Room::where('room_id', 'like', '%' . $hashedID)->delete();
    }
}

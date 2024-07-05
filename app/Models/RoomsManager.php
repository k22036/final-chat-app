<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomsManager extends Model
{
    // use HasFactory;

    /**
     * open a room
     * 
     * @param string $room_id
     */
    public function openRoom($room_id, $name1, $name2, $user_id1, $user_id2)
    {
        DB::table('roomsManager')->insert([
            'room_id' => $room_id,
            'name1' => $name1,
            'name2' => $name2,
            'user_id1' => $user_id1,
            'user_id2' => $user_id2
        ]);
    }

    /**
     * update the room
     *
     * @param string $room_id
     */
    public function updateRoom($room_id)
    {
        DB::table('roomsManager')
            ->where('room_id', $room_id)
            ->update(['last_updated' => now()]);
    }

    /**
     * fetch all rooms by user
     *
     * @param string $user_id
     * @return array
     */
    public function fetchRoomsByUser($user)
    {
        $allRooms = DB::table('roomsManager')->get()->sortByDesc('last_updated')->toArray();
        $rooms = array_filter($allRooms, function ($room) use ($user) {
            $target = hash('sha256', $user['user_id'] . $user['email']);
            return Str::startsWith($room->room_id, $target) || Str::endsWith($room->room_id, $target);
        });

        return $rooms;
    }
}

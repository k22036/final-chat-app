<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoomsManager extends Model
{
    // use HasFactory;

    /**
     * open a room
     * 
     * @param string $room_id
     */
    public function openRoom($room_id)
    {
        DB::table('roomsManager')->insert([
            'room_id' => $room_id
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
}

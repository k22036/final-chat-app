<?php

namespace App\Http\Controllers;

use App\Models\RoomsManager;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class HomeController extends Controller
{
    public function home(Request $request): View
    {
        $User = new User();
        $user = $request->user();

        $users = $User->fetchAllUsersExceptMe($user->id);

        $manager = new RoomsManager();
        $rooms = $manager->fetchRoomsByUser($user);

        return view('pages.home', ['users' => $users, 'rooms' => $rooms]);
    }

    public function user(Request $request)
    {
        if ($request->has('target')) {
            $User = new User();
            $user = $User->fetchUser($request->input('target'));
            return view('pages.user', ['user' => $user]);
        }
        return view('pages.error');
    }
}

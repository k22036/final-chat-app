<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class HomeController extends Controller
{
    public function home(Request $request): View
    {
        $User = new User();
        $user = $request->user();
        return view('pages.home')->with('users', $User->fetchAllUsersExceptMe($user->id));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function indexHome()
    {
        $user = auth()->user();
        return view('user.landing-page.home', compact('user'));
    }

    public function indexProfile()
    {
        $user = auth()->user();
        return view('user.profile.profile', compact('user'));
    }


}

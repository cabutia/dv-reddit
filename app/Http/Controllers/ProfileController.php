<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view() {
        return view('pages.profile.personal.personal');
    }

    public function avatar() {
        return view('pages.profile.avatar.avatar');
    }
}

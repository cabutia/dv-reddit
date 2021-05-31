<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function view() {
        return '<h1>Only admins page</h1>';
    }
}

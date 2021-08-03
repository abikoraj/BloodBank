<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $admin = User::all();
        return view('admin.users', ['users' => $admin]);
    }

    public function donationReq()
    {
        return view('admin.requests');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        $admin = User::where('role', 2)->get();
        return view('admin.users', ['users' => $admin]);
    }

    public function donationReq()
    {
        return view('admin.requests');
    }
}

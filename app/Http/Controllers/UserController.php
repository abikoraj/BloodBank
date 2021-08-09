<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $request->validate([
                'name' => 'required',
                'phone' => 'required|numeric|starts_with:98|digits:10|unique:users,phone',
                'password' => 'required|min:8|alpha_num'
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->role = 2;
            $user->password = bcrypt($request->password);
            $user->save();
            // dd($user);
            return redirect()->route('user.login')->with('message', 'User Registration Successful!');
        } else {
            return view('users.signup');
        }
    }

    public function apiSignup(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|starts_with:98|digits:10|unique:users,phone',
            'password' => 'required|min:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->role = 2;
        $user->password = bcrypt($request->password);
        $user->save();
        // dd($user);
        $user->accessToken = $user->createToken('authToken')->accessToken;
        return response()->json($user);
    }

    public function login(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
                return back()->with('error', 'Phone Number or Password Wrong');
            } else {
                if (Auth::user()->city_id == NULL) {
                    return redirect()->route('user.edit');
                } else {
                    return redirect()->route('user.profile');
                }
            }
        } else {
            return view('users.login');
        }
    }

    public function apiSignin(Request $request)
    {
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $user = Auth::user();
            $user->accessToken = $user->createToken('authToken')->accessToken;
            return response()->json($user);
        } else {
            return response("wrong phone number or password", 500);
        }
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function edit()
    {
        return view('users.edit_profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $user->image = $request->image->store('data/user-pics', 'public');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->ispublic = $request->ispublic ?? 0;
        $user->blood_group = $request->blood_group;
        $user->ldd = $request->ldd;
        $user->city_id = $request->city_id;
        $user->save();
        // dd($user);
        // $user->save();
        return redirect()->route('user.profile')->with('message', 'Profile Updated Successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }
}

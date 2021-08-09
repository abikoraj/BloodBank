<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function nearme()
    {
        $ct = Auth::user()->city_id;
        $dr = DonationRequest::where('city_id', $ct)->where('isComplete', 0)->get();
        return view('nearme', ['drnme' => $dr]);
    }

    public function apiNearMe()
    {
        $ct = Auth::user()->city_id;
        $dr = DonationRequest::where('city_id', $ct)->where('isComplete', 0)->get();
        dd($ct);
        // return response()->json($dr);
    }

    public function  index(Request $request)
    {
        $data = User::where('blood_group', $request->bg);
        if ($request->city != -1) {
            $data = $data->where('city_id', $request->city);
        }
        $result = $data->get();
        // dd($result);
        return response()->json($result);
    }
}

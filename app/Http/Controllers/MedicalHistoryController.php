<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalHistoryController extends Controller
{
    public function add_mh()
    {
        return view('users.medicalHistroy.step1');
    }

    public function submit_mh(Request $request)
    {
        $medicalHistory = new MedicalHistory();
        $medicalHistory->user_id = Auth::user()->id;
        $medicalHistory->hospital = $request->hospital;
        $medicalHistory->date = $request->date;
        // dd($medicalHistory);
        $medicalHistory->save();
        return back();
    }

    public function add_mh_report()
    {
        return view('users.medicalHistroy.step2');
    }

    public function add_report_image()
    {
        return view('users.medicalHistroy.step3');
    }
}

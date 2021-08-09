<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\MedicalHistoryRepo;
use App\Models\MedicalHistoryReportImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalHistoryController extends Controller
{

    public function view(MedicalHistory $mh)
    {
        return view('users.medicalHistroy.index', ['mhs' => $mh]);
    }

    public function submit_mh(Request $request)
    {
        $medicalHistory = new MedicalHistory();
        $medicalHistory->user_id = Auth::user()->id;
        $medicalHistory->hospital = $request->hospital;
        $medicalHistory->date = $request->date;
        // dd($medicalHistory);
        $medicalHistory->save();
        return redirect()->back()->with('message', 'Medical History Added Successfully!');
    }

    public function apiSubmit_mh(Request $request)
    {
        $medicalHistory = new MedicalHistory();
        $medicalHistory->user_id = Auth::user()->id;
        $medicalHistory->hospital = $request->hospital;
        $medicalHistory->date = $request->date;
        // dd($medicalHistory);
        $medicalHistory->save();
        return response()->json($medicalHistory);
    }

    public function update_mh(Request $request, MedicalHistory $mh)
    {
        $mh->hospital = $request->hospital;
        $mh->date = $request->date;
        // dd($mh);
        $mh->save();
        return redirect()->back()->with('message', 'Medical History Updated Successfully!');
    }

    public function delete_mh(MedicalHistory $mh)
    {
        $mh->delete();
        return redirect()->back()->with('message', 'Medical History Deleted Successfully!');
    }

    public function submit_report(Request $request)
    {
        $report = new MedicalHistoryRepo();
        $report->medical_history_id = $request->medical_history_id;
        $report->title = $request->title;
        // dd($report);
        $report->save();
        return redirect()->back()->with('message', 'Report Added Successfully!');
    }

    public function apiSubmit_report(Request $request)
    {
        $report = new MedicalHistoryRepo();
        $report->medical_history_id = $request->medical_history_id;
        $report->title = $request->title;
        // dd($report);
        $report->save();
        return response()->json($report);
    }

    public function update_report(Request $request)
    {
        $report = MedicalHistoryRepo::find($request->id);
        $report->title = $request->title;
        // dd($report);
        $report->save();
        return redirect()->back()->with('message', 'Report Updated Successfully!');
    }

    public function delete_report(MedicalHistoryRepo $report)
    {
        $report->delete();
        return redirect()->back()->with('message', 'Report Deleted Successfully!');
    }

    public function submit_image(Request $request)
    {
        $image = new MedicalHistoryReportImage();
        $image->medical_history_repo_id = $request->medical_history_repo_id;
        $image->rep_image = $request->rep_image->store('data/report', 'public');
        // dd($image);
        $image->save();
        return redirect()->back()->with('message', 'Image Uploaded Successfully!');
    }

    public function apiSubmit_Image(Request $request)
    {
        $image = new MedicalHistoryReportImage();
        $image->medical_history_repo_id = $request->medical_history_repo_id;
        $image->rep_image = $request->rep_image->store('data/report', 'public');
        // dd($image);
        $image->save();
        return response()->json($image);
    }

    public function del_image(MedicalHistoryReportImage $image)
    {
        $image->delete();
        return redirect()->route('user.profile')->with('message', 'Image Deleted Successfully!');
    }
}

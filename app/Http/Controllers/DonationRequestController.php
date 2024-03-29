<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{
    public function add()
    {
        return view('donation_request.add');
    }

    public function submit(Request $request)
    {
        $donationRequest = new DonationRequest();
        $donationRequest->user_id = Auth::user()->id;
        $donationRequest->city_id = $request->city_id;
        $donationRequest->address = $request->address;
        $donationRequest->hospital = $request->hospital;
        $donationRequest->blood_group = $request->blood_group;
        $donationRequest->required_date = $request->required_date;
        $donationRequest->required_amount = $request->required_amount;
        $donationRequest->isComplete = $request->isComplete ?? 0;
        $donationRequest->save();
        // dd($donationRequest);
        return redirect()->route('user.profile')->with('message', 'Request Added Successfully!');
    }

    public function apiSubmitRequest(Request $request)
    {
        $donationRequest = new DonationRequest();
        $donationRequest->user_id = Auth::user()->id;
        $donationRequest->city_id = $request->city_id;
        $donationRequest->address = $request->address;
        $donationRequest->hospital = $request->hospital;
        $donationRequest->blood_group = $request->blood_group;
        $donationRequest->required_date = $request->required_date;
        $donationRequest->required_amount = $request->required_amount;
        $donationRequest->isComplete = $request->isComplete ?? 0;
        $donationRequest->save();
        return response()->json($donationRequest);
    }

    public function edit(DonationRequest $donreq)
    {
        return view('donation_request.edit', ['donreq' => $donreq]);
    }

    public function update(Request $request)
    {
        $donationRequest = DonationRequest::where('id', $request->id)->first();
        $donationRequest->city_id = $request->city_id;
        $donationRequest->address = $request->address;
        $donationRequest->hospital = $request->hospital;
        $donationRequest->blood_group = $request->blood_group;
        $donationRequest->required_date = $request->required_date;
        $donationRequest->required_amount = $request->required_amount;
        $donationRequest->save();
        return redirect()->route('user.profile')->with('message', 'Request Updated Successfully!');
        // dd($donationRequest);
    }

    public function apiUpdateRequest(Request $request)
    {
        $donationRequest = DonationRequest::where('id', $request->id)->first();
        $donationRequest->city_id = $request->city_id;
        $donationRequest->address = $request->address;
        $donationRequest->hospital = $request->hospital;
        $donationRequest->blood_group = $request->blood_group;
        $donationRequest->required_date = $request->required_date;
        $donationRequest->required_amount = $request->required_amount;
        $donationRequest->save();
        return response()->json($donationRequest);
        // dd($donationRequest);
    }

    public function markComplete(DonationRequest $donreq, Request $request)
    {
        $donreq->isComplete = $request->isComplete ?? 1;
        // dd($donreq);
        $donreq->save();
        return redirect()->back()->with('message', 'Request Marked as Completed!');
    }

    public function delete(DonationRequest $donreq)
    {
        $donreq->delete();
        return redirect()->back()->with('message', 'Request Deleted Successfully!');
    }

    public function apiDel_Request(Request $request)
    {
        $donreq = DonationRequest::find($request->id);
        $donreq->delete();
        return response()->json("Deleted Successfully!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.city');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        // return $request->all();
        $city = new City();
        $city->name = $request->name;
        // dd($city);
        $city->save();
        return back()->with('message', 'City Added Successfully!');
    }

    public function update(Request $request, City $city)
    {
        $city->name = $request->name;
        // dd($city);
        $city->save();
        return back()->with('message', 'City Updated Successfully!');
    }

    public function delete(City $city)
    {
        $city->delete();
        return back()->with('message', 'City Deleted Successfuly!');
    }
}

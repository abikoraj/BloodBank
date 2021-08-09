<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'image' => 'image|required'
        ]);
        $slider = new Slider();
        $slider->image = $request->image->store('data/sliders', 'public');
        // dd($slider);
        $slider->save();
        return back()->with('message', 'Slider Image Uploaded Successfully!');
    }

    public function update(Request $request)
    {
        $slider = Slider::find($request->id);
        if ($request->hasFile('image')) {
            $slider->image = $request->image->store('data/sliders', 'public');
        }
        // dd($slider);
        $slider->save();
        return back()->with('message', 'Slider Image Updated Successfully!');
    }

    public function delete(Slider $slider)
    {
        $slider->delete();
        return back()->with('message', 'Slider Image Deleted Successfully!');
    }
}

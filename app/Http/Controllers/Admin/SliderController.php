<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = SLider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        $sliders = new Slider();
        return view('admin.slider.create', compact('sliders'));
    }

    public function store(SliderRequest $request)
    {
        $sliders = new Slider();
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('uploads/slider', $fileName);
        }
        $request['image'] = 'uploads/slider/' . $fileName;
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $sliders->create($request->all());

        session()->flash('success', 'Slider was be created');
        return redirect('admin/sliders');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $slider)
    {
        $slider = Slider::findOrFail($slider);

        if ($request->file('gambar')) {
            $path = 'storage/' . $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('uploads/slider', $fileName);
            $request['image'] = 'uploads/slider/' . $fileName;
        } else {
            $fileName = $slider->image;
        }
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $slider->update($request->all());

        session()->flash('success', 'Slider was be updated');
        return redirect('admin/sliders');
    }

    public function destroy(Slider $slider)
    {
        $path = 'storage/' . $slider->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        session()->flash('success', 'Slider was be deleted');
        return redirect('admin/sliders');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->paginate(5);
        return view('admin.color.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.color.create', [
            'color' => new Color(),
        ]);
    }

    public function store(ColorRequest $request, Color $color)
    {
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $color->create($request->all());
        session()->flash('success', 'Color has been added');
        return redirect('admin/colors');
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }
    public function update(ColorRequest $request, $color)
    {
        $colors = Color::findOrFail($color);
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $colors->update($request->all());

        session()->flash('success', 'Color has been update');
        return redirect('admin/colors');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        session()->flash('success', 'Color has been deleted');
        return redirect()->back();
    }
}

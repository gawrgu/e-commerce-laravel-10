<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function store(SettingRequest $request)
    {
        $setting = Setting::first();
        if ($setting) {
            $setting->update($request->all());
            return redirect()->back()->with('success', 'Setting Saved');
        } else {
            Setting::create($request->all());
        }
        return redirect()->back()->with('success', 'Setting Created');
    }
}

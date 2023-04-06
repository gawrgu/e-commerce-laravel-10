<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.user.user-profile');
    }
    public function updateUserDetail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'digits:12',],
            'pin_code' => ['required', 'digits:5',],
            'address' => ['required', 'string', 'max:400'],
        ]);
        $user->update([
            'name' => $request->username
        ]);
        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'phone' => $request->phone,
                'pin_code' => $request->pin_code,
                'address' => $request->address
            ]
        );
        return redirect('profile')->with('message', 'Profile Have Changed');
    }

    public function passwordCreate()
    {
        return view('frontend.user.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $currentPasswordsStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordsStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect('profile')->with('message', 'Password has changes');
        } else {
            return redirect()->back()->with('message', 'Current password does not match with old password');
        }
    }
}

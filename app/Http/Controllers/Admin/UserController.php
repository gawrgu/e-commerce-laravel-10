<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Int_;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_as', 0)->latest()->paginate(10);
        return view('admin.user.index', compact('user'));
    }

    public function showAdmin()
    {
        $user = User::where('role_as', 1)->latest()->paginate(10);
        return view('admin.user.admin', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
        ]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_as' => $request['role_as']
        ]);
        return redirect('admin/user')->with('success', 'User Created Successfully');
    }
    public function edit(Int $userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, int $userId)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
        ]);

        User::findOrFail($userId)->update([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'role_as' => $request['role_as']
        ]);
        return redirect('admin/user')->with('success', 'User Updated Successfully');
    }

    public function destroy(Int $userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('admin/user')->with('success', 'User deleted Successfully');
    }
}

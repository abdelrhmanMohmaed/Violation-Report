<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function show()
    {
        $roles = Role::get();
        return view('user.add', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $role_id = ($request->role_id) ? $request->role_id : 2;
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $role_id,
            ]);
            // event(new NewUserAdded($user));
            Alert::success('New user added successfully');
            return redirect()->route('report.home');
        } catch (Exception $e) {
            Alert::error('Something is wrong please try again!!');
            return back();
        }
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            // 'email' => ['required', 'string', 'unique:users,email,' . $user->id],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (isset($request->password) && $request->password != null) {
            $data['password'] = Hash::make($request->password);
        }
        // $data['email'] = $request->email;
        // $data['role_id'] = $user->role_id;
        try {
            $user->update($data);

            Auth::logout();
            return redirect()->route('login');
        } catch (Exception $e) {
            Alert::error('Something is wrong please try again!!');
            return redirect()->route('report.home');
        }
    }
}

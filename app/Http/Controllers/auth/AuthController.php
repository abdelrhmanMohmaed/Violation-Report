<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //start view and update ch-password 
    public function index()
    {
        return view('auth.ch-password');
    }
    public function updatePass(Request $request)
    {
        // start validtion in password inputs 
        $request->validate([
            'oldPassword' => 'required|min:4|max:25',
            'newPassword' => 'required|min:4|max:25',
            'password_confirmation' => 'required|same:newPassword',
        ]);
        // End validtion in password inputs 

        $user = Auth::user();
        $dataUser = User::findOrFail($user->id);

        //Start check the old password in Db == the old password in input and update the new password
        if (Hash::check($request->oldPassword, $dataUser->password)) {
            // dd($userId);
            $dataUser->update([
                // hash new password 
                'password' => Hash::make($request->newPassword)
            ]);
            Auth::logout();
            return redirect('/');
        }
        //End check the old password in Db == the old password in input and update the new password
        return back()->with('error', 'Old Password dose not match..');
    }
    //end view and update ch-password 
}

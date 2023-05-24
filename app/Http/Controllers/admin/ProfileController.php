<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function changePassword(Request $request) 
    {
        $id = Auth::guard('admin')->user()->id;
        
        if($request->all()) {
            if(!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) 
            {
                Session::flash('error_message', 'Password is wrong! Please enter correct password.');
                return redirect()->back();
            }
    
            $user = User::find($id);
            $user->password = Hash::make($request->new_password);
            $user->update();
    
            Session::flash('success_message', 'Password changed succuessfully!');
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.pages.auth.change-password');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\commonTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use commonTrait;

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return $this->adminFile('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::guard('admin')->user();

            if(isset($user) && !empty($user))
            {
                Session::flash('success_message', 'Login successfully');
                return redirect()->route("admin.dashboard");
            }
        } else {
            Session::flash('error_message', "Entered email address or password incorrect.");
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return $this->adminFile('dashboard');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Validator, Auth;

class AdminLoginController extends Controller
{
    
	// Admin Login Form
	public function adminLoginForm(){
		return view('admin.auth.admin-login');
	}

	public function adminLogin(Request $request){
		// dd($request->all());
		$this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('admin.dashboard');

        } else {
            session()->flash('error','Either Email/Password is incorrect');
            return back()->withInput($request->only('email'));
        }

	}

	public function adminLogout(Request $request){
		auth()->guard('admin')->logout();
		return redirect()->route('admin.login');
	}


}

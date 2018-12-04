<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      //validasi form Login
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);

      if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //if success, redirect tempat sebelumnya
        return redirect()->intended(route('admin.dashboard'));
      }
      //if fail, redirect back
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}

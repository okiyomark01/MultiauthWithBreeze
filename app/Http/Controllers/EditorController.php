<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EditorController extends Controller
{
    public function dashboard()
    {
        return view('EditorDashboard');
    }

    public function login()
    {
        return view('EditorLogin');
    }

    public function login_submit(Request $request)
    {
        $request ->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request ->only('email', 'password');

        if(Auth::guard('admin')->attempt($credentials))
        {
            $user = Editor::where('email', $request->input('email'))->first();
            Auth::guard('editor')->login($user);
            return redirect()->route('editor_dashboard')->with('success','Login Successful');
        }else{
            return redirect()->route('editor_login')->with('error', 'Login unsuccessful');
        }
    }

    public function logout()
    {
        Auth::guard('editor')->logout();
        return redirect()->route('editor_login')->with('success', 'Logout successfully');
    }
}

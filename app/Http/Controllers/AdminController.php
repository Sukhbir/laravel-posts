<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *  * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        
        return view('layouts.main');
    }
    // public function Views()
    // {
       
      
    //     return view('admin.boot');
    // }
    public function test()
    {
        
           return view('student.post');
        
    }
    public function index()
    {
        
        return view('frontend.login');
    }

     

    public function login(Request $request)
    {
         
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('layouts.main');
        }

        return redirect('frontend.login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
      Auth::logout();

      return redirect('frontend.login');
    }
    
    public function error()
    {
        
        return view('frontend.error');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{    
    /**
     * show login page
     *
     * @return void
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        \Auth::attempt($request->only('email', 'password'));
        return redirect('/home');
    }
}

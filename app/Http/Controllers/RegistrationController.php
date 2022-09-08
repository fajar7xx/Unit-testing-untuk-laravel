<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //     return view('auth.register');
    // }
    
    /**
     * return view register
     *
     * @return void
     */
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        // langsung login setelah daftar
        \Auth::login($user);

        return redirect('/home');
    }
}

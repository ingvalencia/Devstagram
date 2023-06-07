<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
         //validación
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required',

        ]);

        if( !(auth()->attempt($request->only('email','password'),$request->remember)) ){
                return back()->with('mensaje','Credenciales Incorrectas');
        }

        //Redireccionando
        return redirect()->route('post.index', auth()->user()->username );

    }

}

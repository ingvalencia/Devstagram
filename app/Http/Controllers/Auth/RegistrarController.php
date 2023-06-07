<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    //
    public function index()
    {
        return view('auth.registrar ');
    }

    public function store(Request $request)
    {
       //dd($request);

       //validación
       $this->validate($request,[
            'name'=> 'required|max:30',
            'username'=> 'required|unique:users|min:3|max:20',
            'email'=> 'required|unique:users|email|max:60',
            'password'=> 'required|confirmed|min:6',

       ]);

      //Insertando
      //Modificando el Request
      $request->request->add(['username' => Str::slug($request->username)]);
      User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Autentificación

        /*auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/

        //otra forma de autentificar
        auth()->attempt($request->only('email','password'));


        //Redireccionando
        return redirect()->route('post.index');

    }
}

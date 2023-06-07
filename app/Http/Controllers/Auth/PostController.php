<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user )
    {
        //dd(auth()->user());
        return view('dashboard',[
            'user' => $user
        ]);
        return view('auth.registrar');
    }

    public function create()
    {
        return view('post.create');
    }
}

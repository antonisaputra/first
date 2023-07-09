<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //membuat controller register

    public function index(){
        return view('register.index',[
            'title' => "Register"
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','max:255','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        // $request->session()->flash('success','Registration Success! Please Login');
        return redirect('/login')->with('success','Registration Success! Please Login');
    }
}

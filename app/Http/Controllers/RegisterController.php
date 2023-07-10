<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function index()
    {
        
        return view("/register");
    }

    public function store(Request $request){
        
        
        $validateddata=$request->validate([
            'name' => 'required|max:255',
            'email'=> 'required|email:rfc,dns|unique:users',
            'fakultas'=>'required',
            'password'=>'required|min:8|max:20'
        ]);
        

       User::create($validateddata);
       $request->session()->flash('success', 'Registration is successful, please login');
       return redirect('/login');
    }
}

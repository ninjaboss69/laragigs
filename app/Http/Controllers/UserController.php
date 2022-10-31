<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFileds=$request->validate(
            [
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','confirmed','min:6']
            ]
        );

        //Hash Password

        $formFileds['password']=bcrypt($formFileds['password']);
        
        //Creat Usr
        $user=User::create($formFileds);

        //Login
        auth()->login($user);

        return redirect('/')->with('message',"User created and Login");
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with('message',"Successfully Logout");
    }

    public function show(){
        return view('users.login');
    }

    public function login(Request $request){
       $formFileds=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
       ]);
       if(auth()->attempt($formFileds)){
        $request->session()->regenerate();
        return redirect('/')->with('message','successfully login');
       }
       return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}

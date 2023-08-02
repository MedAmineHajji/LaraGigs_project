<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    //Store new user
    public function store(Request $req){
        $formFields = $req->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => 'required | confirmed | min:6'
        ]);

        //Hash Password 
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);
        
        return redirect('/')->with('message',
        'User created and logged in');
    }

    //Logout User
    public function logout(Request $req){
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();
        
        return redirect('/')->with('message',
            'You have been Logged out');
    }

    //Show Login Form
    public function login(){
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(Request $req){
        $formFields = $req->validate([
            'email' => ['required', 'email' ],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $req->session()->regenerate();

            return redirect('/')->with('message', 
                    'You are now Logged In !');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])
                    ->onlyInput('email');
    }



}

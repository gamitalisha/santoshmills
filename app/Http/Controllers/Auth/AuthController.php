<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class AuthController extends Controller
{

    public function index(Request $request){
      return view("login");
    }


    public function customLogin(Request $request){

      // return $request;
      $request->validate([
        'email' =>  'required',
        'password'  =>  'required'
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended('home')
                    ->withSuccess('Signed in');
    }

      return redirect("login")->withSuccess('Login details are not valid');

    }




    function logout()
    {
        Session::flush();

        Auth::logout();
        return Redirect('login');
    }

  }

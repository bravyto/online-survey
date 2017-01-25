<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input, Auth, App\User, App\UsersSurvey;

class LoginController extends Controller{
    //

    public function login(){

        $recentYear = date('Y');

        return view('auth/login')->with('year', $recentYear);
    }

    public function logout(){

        $id = Auth::user()->id;
        $role = User::getRole($id);
        
        if($role != "admin"){

            Auth::logout();
            
            if(UsersSurvey::getStatus($id)  == "Completed"){

                return redirect('auth/login')->with('successMsg', 'Thanks for your participation!');    
            }

            return redirect('auth/login')->with('loginError', 'You have not finished this survey!');
        }

        Auth::logout();        
        return redirect('auth/login');
    }

    public function loginProcess(){

        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password') 
        );

        if(Auth::attempt($user)){

            $id = Auth::user()->id;
            $role = User::getRole($id);

            if($role == "admin"){

                return redirect('admin/pages/dashboard');
            }

            return redirect('apps/webapps');
        }

        return redirect('auth/login')->with('loginError', 'Wrong username or password'); 
    }

}

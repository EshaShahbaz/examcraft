<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class RegisterController extends Controller
{
    public function register()
    {
        $url = url('/signup');
        $title = "Signup";
        $user = new User();
        return view('user.signup',compact('url','user','title'));
    }
    Public function registerpost(Request $request)
    {
        //  dd($request->all());
          $request->validate
          (
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required|in:teacher,student,admin'
            ]);
            
            if($users=User::where('email','=',$request->email)->first())
            {
                return redirect()->route('login')->with('success', "You are already registered, please log in.");
            }
            else
            {
                $users = new User; //create the new user
                $users->name = $request['name'];
                $users->email = $request['email'];
                $users->password = Hash::make($request['password']);
                $users->role = $request['role'];
                $users->save(); 
                return redirect()->route('login')->with("success","Registration success, Login to access the website");
            }
          
        }
    }












































































































        // echo "hello";
        // if(Auth::login($users)) 
        //  {
        //     return redirect()->route('login')->with('sucess', "you are already registered plz logged in ");
        //  }
        //  else
        //  {
            // $users->save(); 
    //      }
    //     if(!$users)
    //     {
    //         return redirect()->route('register')->with("error","Registration failed, try again!");

    //     }
    //     return redirect()->route('login')->with("success","Registration success, Login to access the website");


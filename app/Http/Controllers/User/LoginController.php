<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class LoginController extends Controller
{
    public function login()
    {
        // if(Auth::check())
        // {
        //     return redirect()->route('home');
        // }
        return view('user.login');
    }
    public function loginpost(Request $request)
    {
        // dd($request->all());
        $request->validate
        (
          [
              'email' => 'required|email',
              'password' => 'required',
              'role' => 'required|in:teacher,student,admin'
          ]);
        $users=User::where('email','=',$request->email)->first();
        if (!$users) {
            return back()->withErrors(['email' => 'This email is not registered.Kindly use other one or register first']);
        }
        if($users && $request->password == $users->password)
        {
            if($users && $request->role == $users->role)
            {
                Auth::login($users);
            if ($users->role == 'admin') {
                return redirect()->route('admindashboard');
            } elseif ($users->role == 'teacher') {
                return redirect()->route('teacherdashboard');
            } elseif ($users->role == 'student') {
                return redirect()->route('studentdashboard');
            }
            }
            else{
                return back()->withErrors(['role' => 'The selected role does not match our records.']);
                }
            }
            else
            {
                return back()->withErrors(['password' => 'The password is incorrect.']);
            }
    }
    public function logout()
    {
        Auth::logout();
        return view('home.home');
    }
}





















































































//     if($users && $request->role == $users->role)
        // {
        //     Auth::login($users);
        //    return redirect()->route('admin.dashboard');
        // }
        // else{
        //     return "your role is invalid";
        // }

        // $role=$request->input('role');
        //      if($role == 'teacher')
        //      {
        //         return view('admin.content.dashboard');
        //      }
        //      elseif($role == 'student')
        //      {
        //         return view('home.home');
        //      }
        //      else
        //      {
        //         return redirect()->back();
        //      }
         
        // return match($user->role) {
        //     'admin' => redirect()->route('admindashboard'),
        //     'teacher' => redirect()->route('teacherdashboard'),
        //     'student' => redirect()->route('studentdashboard'),
        //     default => redirect()->route('home'),
        // };

        // if($users && Hash::check($request->password, $users->password))
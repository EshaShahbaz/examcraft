<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function manageaccount()
    {
        $user = Auth::user(); // Get the authenticated user
        // dd($user);
        return view('user.user', compact('user'));
    }
    public function edit($id)
    {
        // dd($id);
        $user = Auth::user(); // Get the authenticated user
        $url = url('/user/update'). "/" . $id;
        $title = "Update Account";
        return view('user.signup', compact('user','url','title'));
    }
    public function update($id,Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password =$request['password'];
        $user->role = $request['role'];
        $user->save(); 
        return redirect()->route('home')->with("success","Your Account has been Updated");
    }
}


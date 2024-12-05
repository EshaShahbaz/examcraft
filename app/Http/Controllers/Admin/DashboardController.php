<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admeen.admindashboard',compact('users'));
    }

    public function destroy($id)
{
    $user = User::find($id);    

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully.');
}
}

<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Teacher\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index()
    {
        return view('teacher.class');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',            
            ]);
       
        $user_id =  $request->user()->id;
        $year = Year::firstOrCreate(
            [
            'name' => $request['name'], 
            'id' => $user_id
            ]);

        return redirect('subject'); 
    }
}

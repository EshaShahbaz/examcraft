<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher\Year;
use Illuminate\Http\Request;
use App\Models\Teacher\Subject;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    
    public function create(Request $request)
    {
        $years = Year::all()->where('id', $request->User()->id);
        return view('teacher.subject',compact('years'));
    }
    public function store(Request $request)
    {

        $request->validate(
            [
               'name' => 'required',
               'year_id'=> 'required|exists:years,year_id',
            ]
            );
       
        // $subject = new Subject;    
        // $subject->name = $request->name;
        // $subject->year_id = $request->year_id; 
        // $subject->save();
        $user_id =  $request->user()->id;
        $subject = Subject::firstOrCreate(
            [
            'name'=> $request['name'],
            'year_id'=> $request['year_id'],
            'id'=> $user_id
            ]);
            
        $year_id = $request['year_id'];
        $subject_id= $request['name'];
        // dd($subject_id);
      
        return redirect('chapter')->with([
            'year_id' => $year_id,
            'subject_id' => $subject_id,
        ]);
   
}    
}

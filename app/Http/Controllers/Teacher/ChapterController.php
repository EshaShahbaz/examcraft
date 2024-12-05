<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher\Year;
use Illuminate\Http\Request;
use App\Models\Teacher\Chapter;
use App\Models\Teacher\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        // $selected_subject_id = $request->input('subject_id');
        $year_id = session('year_id');  
        $subject_id = session('subject_id');  

        // dd($subject_id);
        $subjects = Subject::where('year_id', $year_id)
                           ->where('id', Auth::id())
                           ->where('name',$subject_id)
                           ->first();
                            // dd($subjects);
        return view('teacher.chapter',compact('subjects','year_id'));
    }
    public function store(Request $request)
    {   
              $request->validate(
            [
               'chapter_name' => 'required',
               'chapter_no'=> 'required',
               'subject_id'=> 'required|exists:subjects,subject_id',
            ]);
       
        $user_id = $request->User()->id; 
        $chapter = Chapter::firstOrCreate(
            [
                'chapter_name' => $request['chapter_name'], 
                'chapter_no' => $request['chapter_no'],
                'subject_id' => $request['subject_id'], // Ensure this is being passed
                'id' => $user_id
            ]
        );
        
        $subject_id = $request['subject_id'];
        $chapter_name = $request['chapter_name'];
         return redirect('question')->with(['subject_id'=> $subject_id,'chapter_name' => $chapter_name]); 
    }
}

<?php

namespace App\Http\Controllers\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Teacher\Chapter;
use App\Models\Teacher\Question;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function create(Request $request)
    {
        $subject_id = session('subject_id');
        $chapter_name = session('chapter_name');  

        $chapters = Chapter::where('subject_id', $subject_id)
                         ->where('id', Auth::id())  // Assuming you want to filter by user_id
                         ->where('chapter_name',$chapter_name)
                         ->first();  
        return view('teacher.question',compact('chapters','subject_id'));
    }
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'add_question_text' => 'required',
            'question_type' => 'required|in:short,long',
            'rating' => 'required|in:normal,medium,hard',
            'chapter_id'=> 'required|exists:chapters,chapter_id',
        ]);

        $question = new Question;
        $question->add_question_text = $request->add_question_text;
        $question->question_type = $request->question_type;
        $question->rating = $request->rating;
        $question->chapter_id = $request->chapter_id;
        // When you call $request->user(), it returns an instance of the User model. This model instance represents the authenticated user, and you can access all of the user's attributes and relationships through it.
        $question->id = $request->User()->id;
        $question->save();
       
         
        $questions = Question::where('chapter_id',$request->chapter_id)->where('id',$request->User()->id)->get();
         return view('teacher.paperview', compact('questions'));

    }


    public function questionview(Request $request)
    {
            //  $questions = Question::where('id',$request->User()->id)->where('chapter_id',$request->chapter_id)->get();
            //  return view('teacher.paperview', compact('questions'));
    }
   
}

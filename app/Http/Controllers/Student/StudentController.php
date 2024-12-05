<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\StudentTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.studentdashboard');
    }
    //////////////////////////////////////// List of Teachers //////////////////////////////////////////////////////////////
    public function list(Request $request)
      {
        $search = strtolower($request['search']);
        if($search != "")
        {
          //ILIKE is a case-insensitive version of the LIKE operator LIKE is case-sensitive in PostgreSQL.
            $teachers = Teacher::where('subjects', 'ILIKE', "%$search%")
            ->orWhere('city', 'ILIKE', "%$search%")->get();

        }
        else
        {
          $teachers = Teacher::with('users')->get();
          //  return $teachers;
        }

      
          // foreach($teachers->users as $user){
            // echo $user->name;
          // }
          // endforeach
        // }
        // $ratings = StudentTeacher::whereNotNull('rating')->get();
        // $feedbacks = StudentTeacher::whereNotNull ('feedback')->get();
        // dd($feedbacks);
        return view('teacher.listofteacher', compact('teachers')); 
      
      }
      ///////////////////////////////////////////////// Mark Teacher ////////////////////////////////////////////////////
    public function markteacher($teacher_id , Request $request)
      {
          if(Auth::user()->role == "student")
          {
             $student_id = Auth::user()->id;
          }
          $relationshipExists = StudentTeacher::where('id', $student_id)
                              ->where('teacher_id', $teacher_id)
                              ->exists();
          if ($relationshipExists) {
              return redirect()->back()->with('error', 'You already confirmed this teacher.');
          }
          else
          {
          $studentTeacher = new StudentTeacher();
          $studentTeacher->id = $student_id;
          $studentTeacher->teacher_id = $teacher_id;
          $studentTeacher->save();
          return redirect()->back()->with('success', 'Tutor has been confirmed.');
          }
      }
      
      public function rating($id, $teacher_id , Request $request)
      {
        $request->validate([
          'rating' => 'required',
          'feedback' => 'required',
        ]);
        
        $relationshipExists = StudentTeacher::where('id', $id)
                              ->where('teacher_id', $teacher_id)
                              ->exists();
          if ($relationshipExists) { 
            StudentTeacher::where('teacher_id', $teacher_id)
                                       ->where('id', $id)
                                       ->update([
                       'rating' =>  $request->rating,
                       'feedback' => $request->feedback,
                                       ]);
            return redirect()->route('listofteacher')->with('error','your feedback is submitted succesfully');
          }
          else
          {
            return redirect()->back()->with('error', 'You can not rate this teacher.');
          }
      }
}

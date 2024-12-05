<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Paper;
use App\Models\Teacher\Year;
use Illuminate\Http\Request;
use App\Models\Teacher\Chapter;
use App\Models\Teacher\Subject;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Teacher\Question;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreatePaperController extends Controller
{
   
    public function selectform(Request $request)
    {
        $years = Year::all()->where('id', $request->User()->id);
        return view('teacher.select',compact('years'));
    }

    public function fetch(Request $request)
    {
       
        $data = $request->all();
       
         $request->validate([
            'year_id' => 'required|exists:years,year_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'chapters' => 'required|array|min:1|exists:chapters,chapter_id',
            'short_questions' => 'required|integer|min:0',
            'long_questions' => 'required|integer|min:0',
            'name_of_institute' => 'required|string|min:3',
            'title_of_test' => 'required|string|min:3',
            'total_marks' => 'required|integer|min:1',
            'duration' => 'required|string|min:1',  
               'normal' => 'required|integer|min:0',  
               'medium' => 'required|integer|min:0',  
               'hard' => 'required|integer|min:0',  

        ]); 
        $year = Year::find($request->input('year_id'));
        $subject = Subject::find($request->input('subject_id'));

        $year_name = $year->name;
        $subject_name = $subject->name; 
        $name_of_institute = $request->name_of_institute;
        $title_of_test = $request->title_of_test;
        $total_marks = $request->total_marks;
        $duration = $request->duration;
        $selected_chapters = $request->input('chapters');
         
        $short_questions = $request->short_questions;
        $long_questions = $request->long_questions;
        $normal = $request->normal;
        $medium = $request->medium;
        $hard = $request->hard;

        //array=['key'=> value];
        $ratings=[
        'normal' => $normal,
        'medium' => $medium,
        'hard' => $hard,
        ];
        // Total number of questions required
        $total_questions = $short_questions + $long_questions;

        // Total number of ratings provided by the user
        $total_ratings_provided = array_sum($ratings);

        if ($total_ratings_provided !== $total_questions) {
            // Notify the user about the mismatch

          return redirect()->back()->with('error','Total no of ratings should be equal to total no of questions e.g (total questions =8 then total ratings should be 8');
        }

        $ratingArray =[];
        //foreach(array as key => value)
        foreach ($ratings as $rating => $count) {
            for ($i = 0; $i < $count; $i++) {
                $ratingArray[] = $rating;
            }
        }
        //   dd($ratingArray);
        shuffle($ratingArray);

        // Step 3: Split the shuffled ratings into short and long questions
        // array_slice(array,start,length);
        $shortQuestionRatings = array_slice($ratingArray, 0, $short_questions);
        $longQuestionRatings = array_slice($ratingArray, $short_questions, $long_questions);

        
       
        // Step 1: Initialize collections for short questions and long questions
        $shortQuestions = collect();
        $longQuestions = collect();
         
        $sc=0;
        $lc=0;
        // Step 2: Iterate over the shuffled short question ratings and fetch one question per rating
        foreach ($shortQuestionRatings as $rating) 
        {
            // Fetch the questions for the specified rating and type
            $shortquestions = Question::whereIn('chapter_id', $selected_chapters)
                ->where('rating', $rating)
                ->where('question_type', 'short') // Only short questions
                ->where('id', $request->user()->id)
                ->inRandomOrder()
                ->first(); 
                if ($shortquestions) {
                    $sc++;
                    $shortQuestions->push($shortquestions); // Add the question to the shortQuestions collection
                } 
               
        }
      
        foreach ($longQuestionRatings as $rating) 
        {
            // Fetch the questions for the specified rating and type
            $longquestions = Question::whereIn('chapter_id', $selected_chapters)
                ->where('rating', $rating)
                ->where('question_type', 'long') // Only short questions
                ->where('id', $request->user()->id)
                ->inRandomOrder()
                ->first(); 
                if ($longquestions) {
                    $lc++;
                    $longQuestions->push($longquestions); // Add the question to the shortQuestions collection
                } 
        }

        if ($sc < $short_questions || $lc < $long_questions) {
            // Notify user about missing questions
           return redirect()->back()->with('error','you have not enough short or long questions in your database plz add some more questions with different different ratings');
        } 
       
        
        //If $selectedChapters = [9, 10], using whereIn the query will select questions where chapter_id is either 9 or 10
     
        $data = 
        [ 
           'name_of_institute' =>  $name_of_institute,
           'title_of_test' => $title_of_test,
           'duration' => $duration,
           'chapters' => $selected_chapters,
           'shortQuestions' => $shortQuestions,
           'longQuestions'  => $longQuestions,
           'total_marks'    => $total_marks,
           'no_of_short'    => $short_questions,
           'no_of_long'     => $long_questions,
           'yearname'       => $year_name,
           'subjectname'    => $subject_name,
        ];
        // dd($data);
         return view('teacher.show', compact('data'));
        
    }
    
      public function save(Request $request)
    {
        $data = json_decode($request->input('data'), true);
        //  dd($data);

        $paper = new Paper();
        $paper->yearname          = $data['yearname'];
        $paper->subjectname       = $data['subjectname'];
        $paper->name_of_institute = $data['name_of_institute'];
        $paper->title_of_test     = $data['title_of_test'];
        $paper->duration          = $data['duration'];
        $paper->chapters          = $data['chapters']; // or however you want to store it
        $paper->shortQquestions   = json_encode($data['shortQuestions']);
        $paper->longQuestions     = json_encode($data['longQuestions']);
        $paper->total_marks       = $data['total_marks'];
        $paper->id                = $request->User()->id;    
        $paper->save();
   

          // Redirect to the savedpaper method
          return redirect()->route('paperslist')->with('success','paper saved successfully');


    }
    public function generatepdf(Request $request)
    {
        // dd($request->all());
        // $data= $request->all();
        $data = json_decode($request->input('data'), true);
        //    dd($data);
        
        $pdfdata = 
        [
        'name_of_institute' => $data['name_of_institute'],
        'title_of_test' => $data['title_of_test'],
        'duration' => $data['duration'],
        'chapters' => $data['chapters'], // or however you want to store it
        'shortQuestions' => $data['shortQuestions'] ?? [],
        'longQuestions' => $data['longQuestions'] ?? [],
        'total_marks' => $data['total_marks'],
        // 'no_of_short' => $data['no_of_short'],
        // 'no_of_long' => $data['no_of_long'],
        'yearname' => $data['yearname'],
        'subjectname' => $data['subjectname'],
        ];
        //  dd($pdfdata);         

        $pdf = PDF::loadView('teacher.genpdf',compact('pdfdata'));
        return $pdf->download('question-paper.pdf');
    }

       public function savedpaper()
       {
        $papers = Paper::all()->where('id', Auth::user()->id);
        return view('teacher.paperslist',compact('papers'));
       }

       public function viewp($paper_id)
       {
           $paper = Paper::findOrFail($paper_id);
            // dd($paper);
           // No need to split, JSON fields are automatically cast to arrays
           $data = 
           [ 
              'name_of_institute' => $paper->name_of_institute,
              'title_of_test'     => $paper->title_of_test,
              'duration'          => $paper->duration,
              'chapters'          => $paper->chapters,
              'shortQuestions'    => $paper->shortQquestions  ? json_decode($paper->shortQquestions, true) : [],
              'longQuestions'     => $paper->longQuestions    ? json_decode($paper->longQuestions, true) : [],
              'total_marks'       => $paper->total_marks,
              'yearname'          => $paper->yearname,
              'subjectname'       => $paper->subjectname,
           ];
            //    dd($data);
        //   
           return view('teacher.viewpaper',compact('data'));

       }
       public function getSubjects($year_id)
       {
           $subjects = Subject::where('year_id', $year_id)->get();
           return response()->json(['subjects' => $subjects]);
       }
       public function getChapters($subject_id)
       {
           $chapters = Chapter::where('subject_id', $subject_id)->get(['chapter_id', 'chapter_name']);
           return response()->json(['chapters' => $chapters]);
       }
       public function userquestions()
       {
         $years = Year::all()->where('id',Auth::user()->id);
         return view('teacher.userquestions',compact('years'));
       }

       public function viewquestions(Request $request)
       {
        //  dd($request->all());
        //  $questions = Question::all()->where('id',Auth::user()->id);
        $year_id = $request->year_id;
        $subject_id = $request->subject_id;
    

    $questions = Question::with('chapter.subject')
    ->where('id', Auth::User()->id) // Filter by the logged-in user
    ->whereHas('chapter.subject', function ($query) use ($year_id, $subject_id) {
        $query->where('year_id', $year_id)
              ->where('subject_id', $subject_id);
    })
    ->get()
    ->groupBy('chapter_id');
    // dd($questions);
         return view('teacher.viewuserquestions',compact('questions'));
       }

       public function destroy($paper_id)
       {
           $paper = Paper::findOrFail($paper_id);
           $paper->delete();
           return redirect()->back();
       }
}


























































// $name_of_institute = $request->input('name_of_institute');
        // $title_of_test = $request->input('title_of_test');
        // $total_marks = $request->input('total_marks');
        // $duration = $request->input('duration');
        // $yearname = $request->input('yearname');
        // $subjectname = $request->input('subjectname');
        // $short_questions = $request->input('short_questions');
        // $long_questions = $request->input('long_questions');
    
        // $chapters = $data['data']['chapters'] ?? []; // Default to empty array if not found
        // $shortQuestions = $data['data']['shortQuestions'] ?? []; // Default to empty array if not found
        // $longQuestions = $data['data']['longQuestions'] ?? [];
<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
    <link rel="stylesheet" href="css/teacher/show.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</head>
<body>

<div class="paper-container">
    <!-- Header Section -->
    <div class="header">
        <h1 class="institute-name">{{$data['name_of_institute']}}</h1>
        <h3 class="institute-name">{{$data['title_of_test']}}</h3> <!-- Centered -->
         <!-- Centered -->
        <div class="paper-details">
            <div class="left"> 
                <p><strong >Class:</strong>{{$data['yearname']}}</p> <!-- Left Aligned -->
                <p><strong>Subject:</strong>{{$data['subjectname']}}</p> <!-- Left Aligned -->
                {{-- <p><strong>chapter:</strong>{{$data['chapters']}}</p> <!-- Left Aligned --> --}}
                <p><strong>Chapters:</strong></p>
                
                  @foreach($data['chapters'] as $chapter)
                  <li>{{ $chapter }}</li> <!-- Assuming chapters is a simple array -->
                  @endforeach
                

            </div>
            <div class="right">
                <p><strong>Total Marks:</strong>{{$data['total_marks']}}</p> <!-- Right Aligned -->
                <p><strong>Time Allowed:</strong>{{$data['duration']}}</p> <!-- Right Aligned -->
                <p><strong>Date:</strong>{{ \Carbon\Carbon::now('Asia/Karachi')->format('F j, Y') }}</p> <!-- Right Aligned -->
            </div>
        </div>
    </div>

    @if($data['shortQuestions']->isEmpty())
        <p>No questions available.</p>
    @else
    <div class="section">
        <h2>Section A: Short Questions</h2> <!-- Centered -->
        <p>Total Questions:{{$data['no_of_short']}}</p> <!-- Left Aligned -->
    <h5>Q.1. Answer the following Short Questions.</h5>
        <ol>
            @foreach($data['shortQuestions'] as $question)
                <li>{{ $question->add_question_text}}{{$question->chapter_id}}</li>
            @endforeach
        </ol>
        @endif
    </div>
        @if($data['longQuestions']->isEmpty())
        <p>No questions available.</p>
        @else
        <div class="section">
            <h2>Section B: Long Questions</h2> <!-- Centered -->
            <p>Total Questions:{{$data['no_of_long']}}</p> <!-- Left Aligned -->

        <h5>Q.2. Answer the following Questions.</h5>
        <ol>
            @foreach($data['longQuestions'] as $question)
                <li>{{ $question->add_question_text}}{{$question->chapter_id}}</li>
            @endforeach
        </ol>

    @endif
        </div>
@php
        $data = [
            'name_of_institute' => $data['name_of_institute'],
            'title_of_test'     => $data['title_of_test'],
            'duration' => $data['duration'],
            'chapters' => $data['chapters'],
            'shortQuestions' => $data['shortQuestions'],
            'longQuestions' => $data['longQuestions'],
            'total_marks' => $data['total_marks'],
            'no_of_short' => $data['no_of_short'],
            'no_of_long' => $data['no_of_long'],
            'yearname' => $data['yearname'],
            'subjectname' => $data['subjectname'],
        ]; 
        // dd($data);
@endphp    
 
        <form action="{{url('/')}}/pdf" method="POST">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="button">Generate PDF</button>
    </form>
    <form action="{{url('/')}}/savethispaper" method="POST">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="button">Save This Paper</button>
    </form>
    <a href="{{url('/teacherdashboard')}}" class="button">Back to Dashboard</a>
</body>
</html>


























































 <!-- Hidden fields to pass data -->
        {{-- <input type="hidden" name="name_of_institute" value="{{ $data['name_of_institute'] }}">
        <input type="hidden" name="title_of_test" value="{{ $data['title_of_test'] }}">
        <input type="hidden" name="total_marks" value="{{ $data['total_marks'] }}">
        <input type="hidden" name="duration" value="{{ $data['duration'] }}">
        <input type="hidden" name="short_questions" value="{{ $data['no_of_short'] }}">
        <input type="hidden" name="long_questions" value="{{ $data['no_of_long'] }}">
        <input type="hidden" name="yearname" value="{{ $data['yearname'] }}">
        <input type="hidden" name="subjectname" value="{{ $data['subjectname'] }}">
        
        @foreach ($data['chapters'] as $index => $chapter)
        <input type="hidden" name="data[chapters][{{ $index }}][text]" value="{{ $chapter }}">
        @endforeach
           @foreach ($data['shortQuestions'] as $index => $question)
        <input type="hidden" name="data[shortQuestions][{{ $index }}][text]" value="{{ $question->add_question_text }}">
        @endforeach
        @foreach ($data['longQuestions'] as $index => $question)
        <input type="hidden" name="data[longQuestions][{{ $index }}][text]" value="{{ $question->add_question_text }}">
        @endforeach --}}
        
        {{-- @foreach ($longQuestions as $question)
            <input type="hidden" name="longQuestions[]" value="{{ $question->add_question_text }}">
        @endforeach  --}}


        {{-- {{$question->id}}{{$question->rating}}{{$question->chapter_id}}{{$question->question_type}} --}}
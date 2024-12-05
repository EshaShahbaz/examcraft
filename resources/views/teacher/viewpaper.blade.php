<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
    <link rel="stylesheet" href="{{asset('css/teacher/paperview.css')}}">
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
  @include('layouts.header')
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
                    <p><strong>Time:</strong>{{$data['duration']}}</p> <!-- Right Aligned -->
                    <p><strong>Date:</strong>{{ \Carbon\Carbon::now('Asia/Karachi')->format('F j, Y') }}</p> <!-- Right Aligned -->
                </div>
            </div>
        </div>
    
        <div class="section">
            <h2>Section A: Short Questions</h2> <!-- Centered -->
            {{-- <p>Total Marks: 20</p> <!-- Left Aligned --> --}}
        <h5>Q.1. Answer the following Short Questions.</h5>
            <ol>
                @foreach($data['shortQuestions'] as $question)
                    <li>{{ $question['add_question_text']}}</li>
                @endforeach
            </ol>
        </div>

            <div class="section">
                <h2>Section B: Long Questions</h2> <!-- Centered -->
            <h5>Q.2. Answer the following Questions.</h5>
            <ol>
                @foreach($data['longQuestions'] as $question)
                    <li>{{ $question['add_question_text']}}</li>
                @endforeach
            </ol>
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
            'yearname' => $data['yearname'],
            'subjectname' => $data['subjectname'],
        ]; 
        // dd($data);
@endphp    
 
        <form action="{{url('/')}}/pdf" method="POST">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
        <button type="submit" class="btn btn-primary">Generate PDF</button>
        </form>
        
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
    <link rel="stylesheet" href="css/teacher/genpdf.css">
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
    {{-- <h2>Questions</h2> --}}
@csrf
<div class="paper-container">
    <!-- Header Section -->
    <div class="header">
        <h1 class="institute-name">{{$pdfdata['name_of_institute']}}</h1>
        <h3 class="institute-name">{{$pdfdata['title_of_test']}}</h3> <!-- Centered -->
         <!-- Centered -->
        <div class="paper-details">
            <div class="left"> 
                <p><strong >Class:</strong>{{$pdfdata['yearname']}}</p> <!-- Left Aligned -->
                <p><strong>Subject:</strong>{{$pdfdata['subjectname']}}</p> <!-- Left Aligned -->
                {{-- <p><strong>chapter:</strong>{{$data['chapters']}}</p> <!-- Left Aligned --> --}}
                <p><strong>Chapters:</strong></p>
                
                  @foreach($pdfdata['chapters'] as $chapter)
                  <li>{{ $chapter }}</li> <!-- Assuming chapters is a simple array -->
                  @endforeach
                

            </div>
            <div class="right">
                <p><strong>Total Marks:</strong>{{$pdfdata['total_marks']}}</p> <!-- Right Aligned -->
                <p><strong>Time Allowed:</strong>{{$pdfdata['duration']}}</p> <!-- Right Aligned -->
                <p><strong>Date:</strong>{{ \Carbon\Carbon::now('Asia/Karachi')->format('F j, Y') }}</p> <!-- Right Aligned -->
            </div>
        </div>
    </div>

  
    <div class="section">
        <h2>Section A: Short Questions</h2> <!-- Centered -->
    <h5>Q.1. Answer the following Short Questions.</h5>
        <ol>
            @foreach($pdfdata['shortQuestions'] as $question)
                <li>{{ $question['add_question_text']}}</li>
            @endforeach
        </ol>
        
    </div>
        <div class="section">
            <h2>Section B: Long Questions</h2> <!-- Centered -->
        <h5>Q.2. Answer the following Questions.</h5>
        <ol>
            @foreach($pdfdata['longQuestions'] as $question)
                <li>{{ $question['add_question_text']}}</li>
            @endforeach
        </ol>
        </div>




































{{-- <div class="paper-container">
    <!-- Header Section -->
    <div class="header">
        <h1 class="institute-name">{{ $name_of_institute}}</h1> <!-- Centered -->
        <h1 class="institute-name">{{ $title_of_test}}</h1> <!-- Centered -->

        <div class="paper-details">
            <div class="left"> 
                <p><strong >Class:</strong>{{$yearname}}</p> <!-- Left Aligned -->
                <p><strong>Subject:</strong>{{$subjectname}}</p> <!-- Left Aligned -->
                <p><strong>chapter:</strong>
                    @foreach($chapters  as $chapter)
                    <li>{{ $chapter }}</li> <!-- Assuming chapters is a simple array -->
                    @endforeach
                </p> <!-- Left Aligned -->

            </div>
            <div class="right">
                <p><strong>Total Marks:</strong>{{$total_marks}}</p> <!-- Right Aligned -->
                <p><strong>Time Allowed:</strong> {{ $duration }}</p> <!-- Right Aligned -->
                <p><strong>Date:</strong> September 15, 2024</p> <!-- Right Aligned -->
            </div>
        </div>
    </div>

    
    <div class="section">
        <h2>Section A: Short Questions</h2> <!-- Centered -->
        <p>Total Questions: {{$no_of_short}}</p> <!-- Left Aligned -->
        {{-- <p>Total Marks: 20</p> <!-- Left Aligned --> --}}
        {{-- <p>Instructions: Answer any 3 questions. Each question carries 5 marks.</p> <!-- Left Aligned --> --}}

    {{-- <h5>Q.1. Answer the following Short Questions.</h5>
        <ol>
            @foreach($shortQuestions as $question)
            <li>{{$question['add_question_text']}}</li> {{--because this is an array of array--}}   
           
            {{-- @endforeach
        </ol>
      
        
        <h5>Q.2. Answer the following Questions.</h5>
        <ol>
            @foreach($longQuestions as $question)
            <li>{{$question['add_question_text']}}</li>   

               
            @endforeach
        </ol>  --}} 
 
    

</body>
</html>

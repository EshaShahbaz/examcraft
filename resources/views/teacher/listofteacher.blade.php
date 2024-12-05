<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="{{asset('css/teacher/listofteacher.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> 

	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </head>
  <body> 
    
    <div class="container">
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
      @endif
        <h1 class="text-center">Our Teachers</h1>
          <div class="row text-center">
           
            <div class="col-md-12">
              <form action="">
                <input type="search" name = "search" class="search" placeholder="search teacher by its subject, City .">
                <button class="btn btn-primary">Search</button>
                <a href="{{url('/listofteacher')}}">
                   <button class = "btn btn-primary">Reset Search</button>
                </a>
            </div>
            </form>
            @if($teachers->isEmpty())
              <h6 class="alert alert-danger col-12">Result not found.</h6>
            @else
            @foreach($teachers as $teacher)
            @php
            // $teacherRating = $ratings->where('teacher_id', $teacher->teacher_id)->first()->rating ?? 0; // Get rating for each teacher, default to 0 if not found
            // $teacherfeedback = $feedbacks->where('teacher_id', $teacher->teacher_id); // Get rating for each teacher, default to 0 if not found
            // echo "<pre>";
            // print_r($teacherfeedback);
            // $averageRating = $teacher->averageRating();          //$teacher->averagerating ...This model instance allows you to call any methods defined in the Teacher such as averageRating()....            
           @endphp

              <div class="col-md-4">
                  <div class="card">
                    @if($teacher->profile_image)
                       <img src=  "{{asset('storage/' . $teacher->profile_image)}}" class="img-area">
                       @else
                        <i class="fa fa-user-circle-o" style="color:#1c1d1f; font-size:85px;"></i>
                        @endif
                       <p><strong>Name: </strong>{{$teacher['name']}}</p>
                       <p><strong>Timing: </strong> {{ $teacher->from[0] ?? 'N/A' }} To: {{ $teacher->to[0] ?? 'N/A' }}</p>
                       {{-- <p><strong>Timing:</strong> {{ implode(', ', $teacher->from) }} <strong>To:</strong> {{ implode(', ', $teacher->to) }}</p> --}}
                       
                      
                       {{-- implode(', ', ...) joins the subjects with commas. --}}
                       <p><strong>Subject: </strong>{{implode(', ', array_unique($teacher['subjects']))}}</p>
                       <p><strong>City: </strong>{{$teacher['city']}}</p>
                       <div class="rating">
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $teacher->users->avg('pivot.rating'))
                                    <span class="star filled">★</span> <!-- Filled star -->
                                @else
                                    <span class="star">☆</span> <!-- Empty star -->
                                @endif
                            @endfor
                        </div>
                     </div>
                    
          
                     <p>Feedbacks:</p>
                      {{-- <ul> --}}
                          {{-- @foreach($teacherfeedback as $feedback)
                            <li>{{ $feedback->feedback}}</li> <!-- Display each feedback -->
                          @endforeach --}}
                          @foreach ($teacher->users as $user)
                          <li>
                              Student: {{ $user->name }} <br>
                              Rating: {{ $user->pivot->rating }} <br>
                              Feedback: {{ $user->pivot->feedback }} <br>
                          </li>
                      @endforeach
                      {{-- </ul> --}}
      
                     <hr>
         
                      
                       <a href="{{url('viewsinglepage', $teacher->teacher_id)}}" class="btn btn-primary">View Profile</a>
                   </div>                
                  </div>
                  @endforeach
                  @endif
                       
                  
                  </div>                
              {{-- </div> --}}
              <div class="text-center">
                <a href="{{ url('/studentdashboard') }}" class="btn btn-secondary mt-4">Back to Dashboard Page</a>
            </div>
          </div>
  </body>
  </html>



































{{-- @foreach($teacher->from as $index => $fromTime)
<p><strong>Timing: </strong> {{ $fromTime }} To: {{ $teacher->to[0] ?? 'N/A' }}</p>
@endforeach --}}

{{-- @php
  $timings = [];
  foreach ($teacher->from as $index => $fromTime) {
      $toTime = $teacher->to[$index] ?? 'N/A'; // Pair `from` with the corresponding `to` time
      $timings[] = "{$fromTime} To {$toTime}"; // Combine into "from To to" format
  }
  @endphp
                   
<p><strong>Timing:</strong> {{ implode(', ', $timings) }}</p> --}}
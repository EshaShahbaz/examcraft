<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="css/teacher/select.css">
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

    <!-- Bootstrap 5 JS and Popper.js (for dropdown functionality) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
<body>
    
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
    @php
       $hasQuestions = App\Models\Teacher\Question::where('id', Auth::user()->id)->exists();
    @endphp


        @if(!$hasQuestions)
        <div class="alert alert-warning">
            <p>You haven't added any questions, subjects, or classes yet. Please add them to get started!.plz add at least 3 3 questions for each rating..
                Go to the Add Question link..
            </p>
        </div>
        @else
        <div class="container">
            <form action="{{url('/')}}/show" method="post">
                @csrf
                <h1 class="text-center">Create Question Paper</h1>
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name_of_institute">Name of your Institute</label>
                        <input type="text" class="form-control" name="name_of_institute" value="{{old('name_of_institute')}}">
                        <span class="text-danger">
                            @error('name_of_institute')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title_of_test">Title of the test</label>
                        <input type="text" class="form-control" name="title_of_test" value="{{old('title_of_test')}}">
                        <span class="text-danger">
                            @error('title_of_test')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="total_marks">Total Marks</label>
                            <input type="number" class="form-control" name="total_marks" value="{{old('total_marks')}}">
                            <span class="text-danger">
                                @error('total_marks')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duration">Time for Paper(in minutes):</label>
                                <input type="text" class="form-control" placeholder="20 min or 120 min" name="duration" value="{{old('duration')}}">
                                <span class="text-danger">
                                    @error('duration')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label>Class</label>
                                    <select name="year_id" class="select-box" id="year_id">
                                      <option value="">Select Class</option> 
                                        @foreach($years as $year)
                                           <option value="{{ $year->year_id }}">{{ $year->name }}</option>
                                        @endforeach 
                                    </select>
                                    <span class="text-danger">
                                      @error('year_id')
                                        {{$message}}
                                       @enderror
                                    </span>
                                </div>
                            </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label>Subject</label>
                        <select name="subject_id" class="select-box" id="subject_id">
                            <option value="">Select Subject</option>
                            {{-- @foreach($subject as $sub)
                                <option value="{{ $sub->subject_id }}">{{ $sub->name }}</option>
                            @endforeach --}}
                        </select> 
                     <span class="text-danger">
                            @error('subject_id')
                            {{$message}}
                            @enderror
                     </span>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="short_questions">Short Questions</label>
                    <input type="number" class="form-control" name="short_questions" value="{{old('short_questions')}}">
                    <small>How many Short Questions do you want.</small>
                    <span class="text-danger">
                        @error('short_questions')
                            {{$message}}
                        @enderror
                        </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="long_questions">Long Questions</label>
                    <input type="number" class="form-control" name="long_questions" value="{{old('long_questions')}}">
                    <small>How many Long Questions do you want.</small>
                    <span class="text-danger">
                        @error('long_questions')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="normal">Easy</label>
                <input type="number" class="form-control" name="normal" value="{{old('normal')}}">
                <small>How many Questions do you want from these ratings.</small>
                <span class="text-danger">
                    @error('normal')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="medium">Medium</label>
                    <input type="number" class="form-control" name="medium" value="{{old('medium')}}">
                    <span class="text-danger">
                        @error('medium')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div> 
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="hard">Hard</label>
                        <input type="number" class="form-control" name="hard" value="{{old('hard')}}">
                        <span class="text-danger">
                            @error('hard')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>


                 {{-- <div class="col">
                    <div class="form-group">
                        <label for="chapter_id">Select chapters</label>
                            @foreach($chapter as $chp)
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" name=chapters[] value="{{$chp->chapter_id}}" id="{{$chp->chapter_id}}">
                                <label for="{{$chp->chapter_id}}" class="form-check-label">{{$chp->chapter_name}}</label>
                              </div> 
                            @endforeach
                        <span class="text-danger">
                            @error('chapters')
                            {{$message}}
                            @enderror
                        </span>
                    </div> --}}
                    <div class="col">
                        <div class="form-group">
                           
                            <div class="dropdown">
                                <button class="btn btn-secondary w-100 dropdown-toggle" type="button" id="chapterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Chapters
                                </button>
                                <ul class="dropdown-menu w-100" id="chapter_list" aria-labelledby="chapterDropdown">
                                    {{-- @foreach($chapter as $chp)
                                        <li class="dropdown-item">
                                            <div class="form-check d-flex  align-items-center justify-content-between">
                                                <input type="checkbox" class="form-check-input ms-auto" id="{{ $chp->chapter_id }}" name="chapters[]" value="{{ $chp->chapter_id }}">
                                                <label class="form-check-label" for="{{ $chp->chapter_id }}">{{ $chp->chapter_name }}</label>
                                            </div>
                                        </li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                 
            <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" class="button">Generate Exam</button> 
                </div>
            </div>
        
        </div>
        </form>
    </div>
    @endif
</body>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Trigger on class selection
        $('#year_id').change(function() {
            var classId = $(this).val();
            
            if (classId) {
                $.ajax({
                    url: '/get-subjects/' + classId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subject_id').empty();
                        $('#chapter_id').empty();
                        $('#subject_id').append('<option value="">Select Subject</option>');
                        $('#chapter_id').append('<option value="">Select Chapter</option>');
                        $.each(data.subjects, function(key, value) {
                            $('#subject_id').append('<option value="'+ value.subject_id +'">'+ value.name +'</option>');
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching subjects:", error);
                    }
                });
            } else {
                $('#subject_id').empty();
                $('#chapter_id').empty();
                $('#subject_id').append('<option value="">Select Subject</option>');
                $('#chapter_id').append('<option value="">Select Chapter</option>');
            }
        });

        // Trigger on subject selection
        $('#subject_id').change(function() {
            var subjectId = $(this).val();
            
            if (subjectId) {
                $.ajax({
                    url: '/get-chapters/' + subjectId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#chapter_list').empty();
                        $('#chapter_id').append('<option value="">Select Chapter</option>');
                        $.each(data.chapters, function(key, value) {
                            $('#chapter_list').append(`
                             <li class="dropdown-item">
                            <div class="form-check d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="form-check-input ms-auto" id="${value.chapter_id}" name="chapters[]" value="${value.chapter_id}">
                                <label class="form-check-label" for="${value.chapter_id}">${value.chapter_name}</label>
                            </div>
                            </li>
                            `);
                            
                            
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching chapters:", error);
                    }
                });
            } else {
                $('#chapter_id').empty();
                $('#chapter_id').append('<option value="">Select Chapter</option>');
            }
        });
    });

</script>
</html>
































































































{{-- @if($errors->has('duration'))
<div class="alert alert-danger">
    {{ $errors->first('duration') }}
</div>
@endif --}}
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="css/teacher/chapter.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
   @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
 @php
//    dd($subject_id)  
 @endphp
    <div class="container">
        <div class="row">
            <form action="{{url('/')}}/question" method="post">
                @csrf
                <h2 class="text-center">Add question</h2>
        <div class="form-group">
            <label for='add_question_text'>Add Qestion</label>
            <textarea class="form-control" name="add_question_text" id = "add_question_text" style="border:2px solid grey;"></textarea>
            <span class="text-danger">
                @error('add_question_text')
                   {{$message}}
                @enderror
               </span>
        </div>
            <div class="form-group">
              <label for="question_type">Question Type:</label>
              <select name="question_type" id="question_type" class="form-control">
                  <option value="short">Short</option>
                  <option value="long">Long</option>
              </select>
              <span class="text-danger">
                @error('question_type')
                   {{$message}}
                @enderror
               </span>
          </div>
         
          <div class="form-group">
              <label for="rating">Rating:</label>
              <select name="rating" id="rating" class="form-control">
                  <option value="normal">Normal</option>
                  <option value="medium">Medium</option>
                  <option value="hard">Hard</option>
              </select>
              <span class="text-danger">
                @error('rating')
                   {{$message}}
                @enderror
               </span>
          </div>
          {{-- <input type="hidden" id="subject_id" name="subject_id" value="{{ $subject_id }}"> --}}

          <div class="form-group">
            <label for="chapter_id">Select Chapter:</label>
            <select name="chapter_id" class="select-box" id="chapter_id">
                <option value="">Select Chapter</option>
                {{-- @foreach($chapters as $chp) --}}
                <option value="{{ $chapters->chapter_id }}">{{ $chapters->chapter_name}}</option>
                {{-- @endforeach --}}
            </select>
            <span class="text-danger">
                @error('chapter_id')
                   {{$message}}
                @enderror
               </span>
        </div>
          
            <button type="submit" class="button">Next</button>
            
           </form>
        </div>
    </div>
</html>
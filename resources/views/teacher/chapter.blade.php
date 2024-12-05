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
    <div class="container">
        <div class="row">
            <form action="{{url('/')}}/chapter" method="post">
              @csrf
                <h2 class="text-center">Add chapter</h2>
            <div class="form-group">
                <label>Chapter Name</label>
                <input type="text"name="chapter_name" class="form-control" value="{{old('chapter_name')}}">
            </div>
            <div class="form-group">
                <label>chapter No</label>
                <input type="number" name="chapter_no" class="form-control" value="{{old('chapter_no')}}">
            </div>
        
            <div class="form-group">
              <label>Select Subject:</label>
              <select name="subject_id" class="select-box" id="subject_id">
                  <option value="">Select Subject</option>
                  {{-- @foreach($subjects as $sub) --}}
                      <option value="{{ $subjects->subject_id }}">{{ $subjects->name }}</option>
                  {{-- @endforeach --}}
              </select>
              <span class="text-danger">
                  @error('subject_id')
                     {{$message}}
                  @enderror
                 </span>
          </div>
            <button type="submit" class="button">Next</button>
           </form>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script type="text/javascript">
 $(document).ready(function() {
        // Use the hidden year_id field value directly in JavaScript
        let classId = $('#year_id').val();

        // Automatically populate the subject dropdown if classId is available
        if (classId) {
            $('#subject_id').empty().append('<option value="">Select Subject</option>');
            $.ajax({
                url: '/get-subjects/' + classId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, subject) {
                        $('#subject_id').append('<option value="'+ subject.subject_id +'">'+ subject.name +'</option>');
                    });
                }
            });
        }
    });
            </script> --}}

</html>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="css/teacher/subject.css">
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
        <div class="container">
            <div class="row">
            <form action="{{url('/')}}/userquestions" method="post">
                @csrf
                <h1 class="text-center">Question</h1>
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
                  <button type="submit" class="button">Submit</button> 
              
        </form>
        </div>
    </div>
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
                        $('#subject_id').append('<option value="">Select Subject</option>');
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
                $('#subject_id').append('<option value="">Select Subject</option>');
            }
        });

        // Trigger on subject selection
       
    });

</script>
</html>
































































































{{-- @if($errors->has('duration'))
<div class="alert alert-danger">
    {{ $errors->first('duration') }}
</div>
@endif --}}
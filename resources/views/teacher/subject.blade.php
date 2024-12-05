<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="css/teacher/subject.css">
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
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
    <div class="container">
        <div class="row">
            <form action="{{url('/')}}/subject" method="post">
                @csrf
                <h2 class="text-center">Add Book</h2>
            <div class="form-group">
                <label>Subject Name</label>
                <input type="text" name="name" class="form-control">
                <span class="text-danger">
                    @error('name')
                       {{$message}}
                    @enderror
                   </span>
            </div>
            
            <div class="form-group">
                <label>Select class:</label>
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
           
            <button type="submit" class="button">Next</button>
           </form>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script type="text/javascript">
//         $(document).ready(function() {
//     $('#year_id').change(function() {
//         var classId = $(this).val();
//         if(classId){
//         $.ajax({
//             url: '/get-subjects/' + classId,
//             method: 'GET',
//             success: function(data) {
//                 $('#name').empty().append('<option value="">Select Subject</option>');
//                 $.each(data, function(key, value) {
//                     $('#name').append('<option value="' + value.id + '">' + value.name + '</option>');
//                 });
//             }
//         });
//         }
//     });
// });
</body>
</html>
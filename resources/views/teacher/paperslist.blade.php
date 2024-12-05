<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
    <link rel="stylesheet" href="paperlist.css">
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
<h1>My Question Papers</h1>
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
<div class="container">
    <div class="row">
        @foreach ($papers as $paper)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{$paper['name_of_institute']}}</h5>
                        <p class="card-text">
                            <strong>Class:</strong>{{$paper['yearname']}}<br>
                            <strong>Subject:</strong>{{$paper['subjectname']}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('viewpaper', $paper->paper_id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i> View
                            </a>
                            {{-- <a href="{{ url('delete', $paper->paper_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this paper?');">
                                <button class="btn btn-danger">Delete</button>
                            </a> --}}
                            <form action="{{ url('delete', $paper->paper_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this paper?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
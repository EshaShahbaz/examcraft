<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="{{asset('css/teacher/singledetailpage.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
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
    <div class="container" style="border: 1px solid black;">
      <div class="header">
           <div class="img-area" >
            @if($data['profile_image'])
            <img src="{{asset('/storage/'. $data['profile_image'])}}" alt="">
            @else
            <i class="fa fa-user-circle-o" style="color: #adbbda; font-size:180px;"></i>
            @endif
           </div>
           <h3 class="text-center">{{$data['name']}}</h3>
          <p class="text-center">{{$data['profession']}}</p>
      </div>
<!-- row 1 -->

 <div class="main">
      <div class="left">
        <div class="row">
        <div class="col-md-12 services">  
            <h4>Contact</h4>
            <p><strong>Name:</strong>{{$data['name']}}</p>
            <p><i class="fa fa-envelope"></i><strong>Email:</strong>{{$data['email']}}</p>
            <p><i class="fa fa-phone"></i><strong>Phone:</strong>{{$data['phone']}}</p>
            <p><strong>City:</strong>{{$data['city']}}</p>
            <p><i class="fa fa-map-marker"></i><strong>Address:</strong>{{$data['address']}} </p>

          </div>
      <div class="col-md-12 services">
        <h4>Education</h4>
        @foreach($data['education'] as $index => $edu)
        <h5>{{$edu}}</h5>
        {{-- <p>{{ isset($data['institutes'][$index]) ? $data['institutes'][$index] : 'Institute not provided' }}</p> --}}
        <p>{{ $data['institutes'][$index] ?? 'Institute not provided' }}</p>
        @endforeach
      </div>
      <div class="col-md-12 services">  
        <h4>Subjects</h4>
        <ul>
            @foreach($data['subjects'] as $sub)
            <li>{{$sub}}</li>
            @endforeach
        </ul>
      </div>
      <div class="col-md-12 services">  
        <h4>Slots/Timing</h4>
        {{-- <p><strong>From: </strong>{{$data['from']}} To {{$data['to']}}</p> --}}
        @foreach($data['from'] as $index => $from)
        <p><strong>From:</strong> {{ \Carbon\Carbon::createFromFormat('H:i', $from)->format('g:i A') }}
          <strong>To:</strong> {{ \Carbon\Carbon::createFromFormat('H:i', $data['to'][$index] )->format('g:i A') }}</p>
        @endforeach
      </div>
  
      </div>
<!-- row-2 -->
      </div>
      
      <div class="right">
        <div class="row">
        <div class="col-md-12">
        @foreach($data['position'] as $index => $position)
          <h4>Work Experience {{$index+1}} </h4>
            <p><strong>Position:</strong>{{$data['position'][$index]}}</p>
            <p><strong>Company:</strong>{{$data['company'][$index]}}</p>
            <p><strong>Duration:</strong>{{$data['duration'][$index]}}</p>
            <p>{{$data['experience'][$index]}}</p>
            @endforeach
        </div>
        
      </div>
      @if($data['id'] == auth()->id())
      <a href="{{ url('edit', $data['teacher_id']) }}" class="button">Edit</a>
      <form action="{{ route('profile.delete', $data['teacher_id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="button">Delete</button>
      </form>
      @endif


      <div class="right">
        <div class="row">
        <div class="col-md-12">
        @if(Auth::user()->role == "student")
        <form action="{{ url('mark', $data['teacher_id']) }}" method="POST">
          @csrf
          <button type="submit" class="button">Mark me as your Teacher</button>
         </form>
        </div>
         <div class="rating-form">
         <form action="{{ url('rating', [Auth::user()->id , $data['teacher_id']]) }}" method="POST">
          @csrf
          <label for="rating">Your Rating:</label>
          <div class="rating">
              @for ($i = 5; $i >= 1; $i--)
                  <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                  <label for="star{{ $i }}"><i class="fa fa-star"></i></label>
              @endfor
          </div>
          <span class="text-danger">
            @error('rating')
               {{$message}}
            @enderror
           </span>
        
          <label for="feedback">Your Feedback:</label>
          <div>
          <textarea id="feedback" name="feedback" rows="4" placeholder="Write your feedback..."></textarea>
          </div>
          <span class="text-danger">
            @error('feedback')
               {{$message}}
            @enderror
           </span>
           <button type="submit" class="button">Submit Rating</button>    
    </form>
         </div>
         
      
      @endif
        </div>
      </div>
       <!-- row-3 -->
       
      {{-- </div> --}}
          
          
    </div>
    <!-- main -->
    
    </div>
      


  </body>
  </html>
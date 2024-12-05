<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/user/signup.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 120 1440 173">
        <path fill="#adbbad" fill-opacity="1" d="M0,256L26.7,266.7C53.3,277,107,299,160,272C213.3,245,267,171,320,128C373.3,85,427,75,480,112C533.3,149,587,235,640,272C693.3,309,747,299,800,256C853.3,213,907,139,960,106.7C1013.3,75,1067,85,1120,122.7C1173.3,160,1227,224,1280,208C1333.3,192,1387,96,1413,48L1440,0L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
      </svg>
   <div class="container"> 
    <div clas="row">
     <div class="col-md-6 columns" >
            <img src="images/Humaaans - Study Online.png" class="img-fluid">
    </div>
    <div class="col-md-6 columns">
      @if(session()->has('error'))
      
        <div class="alert alert-danger">{{session('error')}}</div>
      
      @endif
      @if(session()->has('success'))
      
        <div class="alert alert-success">{{session('success')}}</div>
      @endif
       <form action="{{url('/')}}/signup" method="post">
        @csrf
        
        <h2>Sign Up</h2>
        <div class="form-group">

             <h5><i class="fa fa-user"></i>Username</h5>
             <input type="text"  class="form-control" name="name" placeholder="Enter your name"  value="{{old('name')}}">
             <span class="text-danger">
              @error('name')
                {{$message}}
              @enderror
             </span>
        </div>
           <div class="form-group">
             
              <h5><i class="fa fa-envelope"></i>Email</h5>
              <input type="email"  class="form-control" name="email" placeholder="Enter your Email" value="{{old('email')}}">
              <span class="text-danger">
                @error('email')
                  {{$message}}
                @enderror
               </span>
           </div>
            <div class="form-group">
                
                  <h5><i class="fa fa-lock"></i>Password</h5>
                  <input type="password" class="form-control" name="password" placeholder="Enter your Name">
                  <span class="text-danger">
                    @error('password')
                      {{$message}}
                    @enderror
                   </span>
           </div>
           {{-- <label for="role" class="dropdown">Select Role</label> --}}
           <button class="dropbtn" type="submit">Submit</button>
           <select name="role" id="role"  class="dropdown-content" value="{{old('role')}}">
               <option>None</option>
               <option value="teacher">Teacher</option>
               <option value="student">Student</option>
               <option value="admin">admin</option>
           </select>
           <span class="text-danger">
            @error('role')
              {{$message}}
            @enderror
           </span>
       </form>
    </div>
   </div>
   </div>

  </body>
</html>
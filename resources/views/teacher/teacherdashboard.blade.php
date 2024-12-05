@include('layouts.header')
<link rel="stylesheet" type="text/css" href= "css/teacher/teacherdashboard.css">
@php
//    $teacher = App\Models\Teacher::findOrFail(Auth::user()->id)->exists();
$teacher = App\Models\Teacher::where('id', Auth::user()->id)->exists();
//   dd($hasQuestions);    
@endphp
<div class="container">
     <div class="row">
     {{-- <div class="dashboard-header">
         <h1>Welcome, {{Auth::user()->name}}!</h1>
         <p>Your dashboard provides quick access to your key features.</p>
     </div> --}}
     
     {{-- <div class="row"> --}}
         <div class="col-md-4">
           <div class="card-group">
             <div class="card  p-4  text-center">
                 <a href="{{ url('/select') }}">Create Question Paper</a>
                 <p>Create customized question papers.</p>
             </div>
           </div>
         </div>
         
         @if($teacher)
         <div class="col-md-4">
          <div class="card-group">
             <div class="card p-4 text-center">
                 <a href="{{ url('/viewcv') }}">View your Profile</a>
                 <p>See and update your profile information.</p>
             </div>
          </div>
         </div>
         @else
    <!-- Message to prompt user to create profile if it doesn't exist -->
               <div class="col-md-4">
                    <div class="card-group">
                    <div class="card p-4 text-center">
                    <a href="{{ url('/createprofile') }}">create your CV</a>
                    <p>You haven't created a profile yet.</p>
                    </div>
                    </div>
               </div>
          @endif
         <div class="col-md-4">
          <div class="card-group">
             <div class="card p-4 text-center">
                 <a href="{{ url('/class') }}">Add Questions</a>
                 <p>Add questions and rate them.</p>
             </div>
          </div>
         </div>
         <div class="col-md-4">
            <div class="card-group">
               <div class="card p-4 m-10 text-center">
                <a href = "{{url('paperslist')}}" class="button">Saved Paper</a>
                   <p>View your saved paper.</p>
               </div>
            </div>
           </div>
           <div class="col-md-4">
            <div class="card-group">
               <div class="card p-4 m-10 text-center">
                <a href = "{{url('userquestions')}}" class="button">Your Saved Questions</a>
                   <p>View your saved Questions.</p>
               </div>
            </div>
           </div>
     {{-- </div> --}}
 
     <div class="text-center back-link">
         <a href="{{ url('/home') }}" class="btn btn-secondary mt-4">Back to home page</a>
     </div>
 </div>
</div>
 
@include('layouts.footer')

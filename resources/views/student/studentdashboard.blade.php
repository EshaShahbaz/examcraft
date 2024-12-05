@include('layouts.header')
<link rel="stylesheet" type="text/css" href= "css/teacher/teacherdashboard.css">

<div class="container">
    <div class="row">
        <div class="col-md-4">
          <div class="card-group">
            <div class="card  p-4 text-center">
                <a href="{{ url('/listofteacher') }}">Our Beloved Teachers</a>
                <p>Find Teachers according to your need and leave feedback if you like them.</p>
            </div>
          </div>
        </div>
        
    <div class="text-center back-link">
        <a href="{{ url('/home') }}" class="btn btn-secondary mt-4">Back to Home Page</a>
    </div>
</div>
</div>

@include('layouts.footer')
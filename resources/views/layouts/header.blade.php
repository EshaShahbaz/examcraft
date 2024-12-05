@include('layouts.styles')
<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="images/bookss.png">Exam Craft</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link " href="{{url('/home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#benifits">benefit</a>
                </li>
               <li class="nav-item">
               <a class="nav-link" href="#feature">Features</a>
               </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Faq">FQA</a>
                   </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">Contact us</a>
              </li>
              {{-- <li class="nav-item"> --}}
              @if(Auth::check())
                  @if(Auth::user()->role == "teacher")
              <li class="nav-item">
              <a class="nav-link" href="{{url('/teacherdashboard')}}">TeacherDashboard</a>
              </li>
               @elseif(Auth::user()->role == "student")
              <li class="nav-item">
                <a class="nav-link" href="{{url('/studentdashboard')}}">studentDashboard</a>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/teacherdashboard')}}">TeacherDashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/studentdashboard')}}">studentDashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/admindashboard')}}">AdminDashboard</a>
                      </li>
                @endif
              <div class="profile-container">
                <!-- Hidden Checkbox -->
                <input type="checkbox" id="toggle-profile" hidden>
        
                <label class="avatar" for="toggle-profile">
                    <i class="fa fa-user-circle-o" style="color: #adbbda; font-size:38px;"></i>
                </label>
        
                <!-- Profile Card (Visible when Checkbox is Checked) -->
                <div class="profile-card">
                    <div class="profile-header">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div class="profile-body">
                        <a href="{{url('user/edit', Auth::user()->id)}}" class="edit-btn">Edit Profile</a>
                        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                    </div>
                </div>
            </div>
            
              @else

              <li class="nav-item">
                <a class="nav-link" href="{{url('/signup')}}">Sign up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/login')}}">Login</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav> 
 </section>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="{{asset('css/teacher/teacherprofile.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
      
    <div class="container">
        <form action="{{$url}}" method="post" enctype="multipart/form-data" >
          @csrf
            <h1 class="text-center">{{$title}}</h1>
              <div class="row" >
                {{-- ------------------------------------------- --}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="profile_image">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control image-input" id="profile_image">
                  </div>
                  <span class="text-danger">
                    @error('profile_image')
                       {{$message}}
                    @enderror
                   </span>
                </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter you name" value="{{ old('name', $teacher->name) }}">
                      </div>
                      <span class="text-danger">
                        @error('name')
                           {{$message}}
                        @enderror
                       </span>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter your Email"  value="{{old('email', $teacher->email)}}">
                        </div>
                        <span class="text-danger">
                          @error('email')
                             {{$message}}
                          @enderror
                         </span>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Phone</label>
                              <input type="number" class="form-control" name="phone" placeholder="+92 000 000 000"  value="{{old('phone', $teacher->phone)}}">
                          </div>
                          <span class="text-danger">
                            @error('phone')
                               {{$message}}
                            @enderror
                           </span>
                          </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Province</label>
                              <select class="select-box" id="province" name="province"  value="{{old('province')}}">
                                <option selected disabled>Select Province</option>
                                <option selected disabled>Select Province</option>
                                <option value="Punjab" {{ (old('province', $teacher->province) == 'Punjab') ? 'selected' : '' }}>Punjab</option>
                                <option value="Sindh" {{ (old('province', $teacher->province) == 'Sindh') ? 'selected' : '' }}>Sindh</option>
                                <option value="Khyber Pakhtunkhwa" {{ (old('province', $teacher->province) == 'Khyber Pakhtunkhwa') ? 'selected' : '' }}>Khyber Pakhtunkhwa</option>
                                <option value="Balochistan" {{ (old('province', $teacher->province) == 'Balochistan') ? 'selected' : '' }}>Balochistan</option>
                                <option value="Azad Jammu and Kashmir" {{ (old('province', $teacher->province) == 'Azad Jammu and Kashmir') ? 'selected' : '' }}>Azad Jammu and Kashmir</option>
                                <option value="Gilgit-Baltistan" {{ (old('province', $teacher->province) == 'Gilgit-Baltistan') ? 'selected' : '' }}>Gilgit-Baltistan</option>
                                <option value="Islamabad Capital Territory" {{ (old('province', $teacher->province) == 'Islamabad Capital Territory') ? 'selected' : '' }}>Islamabad Capital Territory</option>
                            </select>
                          </div>
                          <span class="text-danger">
                            @error('province')
                               {{$message}}
                            @enderror
                           </span>
                          </div>
                          
                         
              <div class="col-md-6">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" placeholder=""  value="{{old('city', $teacher->city)}}">
                 </div>
                 <span class="text-danger">
                  @error('city')
                     {{$message}}
                  @enderror
                 </span>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="date"  name="dob" class="form-control"  value="{{old('dob', $teacher->dob)}}">
                  </div>
                  <span class="text-danger">
                    @error('dob')
                       {{$message}}
                    @enderror
                   </span>
                  </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea type="address" name="address" class="form-control">{{old('address', $teacher->address)}}</textarea>
                  </div>
                  <span class="text-danger">
                    @error('address')
                       {{$message}}
                    @enderror
                   </span>
              </div>
<!-- ..................Experience................ -->
              <div class="col-md-12">
                 <h1 class="text-center">Education</h1>
              </div>
             
              <div class="col-md-6" id="education">
                <label>Education</label>
                <div class="input-group">
                    @foreach (old('education', $teacher->education ?? ['']) as  $education)
                      <input type="text" name="education[]" class="form-control" value="{{ $education }}" placeholder="From Matric onward (Matric with science etc...)">
                    @endforeach
                 </div>
                 <span class="text-danger">
                  @error('education.*')
                     {{$message}}
                  @enderror
                 </span>
                </div>
                
                <div class="col-md-6" id="institute">
                  <label>Institute Name</label>
                  <div class="input-group"> 
                      @foreach (old('institutes', $teacher->institutes ?? ['']) as $institute)
                       <input type="text" name="institutes[]" class="form-control" value="{{ $institute }}" placeholder="School/College where you studied">
                      @endforeach
                      <div class="input-group-append">
                        <button type="button" id="add2" class="btn">Add more</button>
                    </div>
                   </div>
                   <span class="text-danger">
                    @error('institutes.*')
                       {{$message}}
                    @enderror
                   </span>
                  </div>
                  
          <div class="col-md-6" id="subject">
            <label>Enter Subject</label>
            <div class="input-group">
              @foreach (old('subjects', $teacher->subjects ?? ['']) as $subjects)
            <input type="text" class="form-control" name="subjects[]"  value = "{{$subjects}}" placeholder="Enter the subject you'd like to teach">
            @endforeach
            <div class="input-group-append">
            <button type="button"  id="add1" class="btn">Add more</button>
            </div>  
         </div>
         <span class="text-danger">
          @error('subjects.*')
             {{$message}}
          @enderror
         </span>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Profession</label>
              <input type="text" class="form-control" name="profession" placeholder=""  value="{{old('profession', $teacher->profession)}}">
           </div>
           <span class="text-danger">
            @error('profession')
               {{$message}}
            @enderror
           </span>
          </div>
              
              <table id="experienceTable">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Company/Institute</th>
                        <th>Duration</th>
                        <th>Experience</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <div class="form-group">
                      @foreach (old('position', $teacher->position ?? ['']) as $position)
                        <td><input type="text" name="position[]"  value = " {{$position}}" class="form-control" placeholder="Position"  style="border: 2px solid grey;">
                          @endforeach
                          <span class="text-danger">
                            @error('position.*')
                               {{$message}}
                            @enderror
                           </span></td>
                      </div>
                      <div class="col-md-3">
                        @foreach (old('company', $teacher->company ?? ['']) as $company)
                        <td><input type="text" name="company[]" value = "{{$company}}" class="form-control" placeholder="Where you work" style="border: 2px solid grey;">
                          @endforeach
                          <span class="text-danger">
                            @error('company.*')
                               {{$message}}
                            @enderror
                           </span></td>
                      </div>
                      @foreach (old('duration', $teacher->duration ?? ['']) as $duration)
                        <td><input type="text" name="duration[]" value="{{$duration}}" class="form-control" placeholder="Duration" style="border: 2px solid grey;">
                          @endforeach
                          <span class="text-danger">
                            @error('duration.*')
                               {{$message}}
                            @enderror
                           </span></td>
                           @foreach (old('experience', $teacher->experience ?? ['']) as $experience)
                          <td><textarea name="experience[]" class="form-control" placeholder="Experience" style="border: 2px solid grey;">{{$experience}}</textarea> 
                           @endforeach
                            <span class="text-danger">
                          @error('experience.*')
                             {{$message}}
                          @enderror
                         </span></td>
                        <div class="col-md-3">
                        <td><button type="button" id="add" class="btn btn-success">Add More</button></td>
                      </div>
                    </tr>
                    
                </tbody>
            </table>
            
            <!-- ......slots..... -->
            <div class="col-md-12">
              <h1 class="text-center">Slots/Timing</h1>
           </div>
                      <div class="col-md-6" id="from">
                        <div class="form-group">
                          <label>From</label>
                          <div class="input-group">
                          @foreach (old('from', $teacher->from ?? ['']) as $from)
                          <input type="time" name="from[]"  value = "{{$from}}" class="form-control">
                          @endforeach
                          </div>
                        </div>
                        {{-- <small>Time in which your are available.</small> --}}
                        <span class="text-danger">
                          @error('from.*')
                             {{$message}}
                          @enderror
                         </span>
                    </div> 
                    <div class="col-md-6" id="to">
                      <div class="form-group">
                        <label>To</label>
                        <div class="input-group">
                        @foreach (old('to', $teacher->to ?? ['']) as $to)
                        <input type="time" class="form-control" name="to[]" value = "{{$to}}" placeholder="5:00am" >
                        @endforeach 
                        <div class="input-group-append">
                         <button type="button" name="add3" id="add3" class="btn btn-success">Add more</button>
                         </div>
                      </div>
                      </div>
                      <span class="text-danger">
                        @error('to.*')
                           {{$message}}
                        @enderror
                       </span>
                  </div>
          
                  <div class="col-md-12">
                    <div class="form-group">
                    <label>Gender</label>
                       <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="male"
                            {{old('gender') || $teacher->gender == "male" ? "checked" : ""}}>
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="female"
                            {{old('gender') || $teacher->gender == "female" ? "checked" : ""}}>
                            <label for="female" class="form-check-label">Female</label> 
                        </div>
                       </div>
                       <span class="text-danger">
                        @error('gender')
                           {{$message}}
                        @enderror
                       </span>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                       <button  class="button">Submit</button>
                      </div>
                    </div>
          </div>
        </form>    
      </div>

      <script>
         
           $('#add1').click(function(){
            $('#subject').append(
                `<div class="input-group" style="margin-top: 10px;">
                  <input type="text" class="form-control" name="subjects[]" placeholder="Enter your subject you wanna to teach">
                  <div class="input-group-append">
                   <button type="button"  class="btn btn-danger remove-table-row">Remove</button>
                  </div>
                   </div>`   
            );
          });
          $('#experienceTable').on('click', '#add', function() {
            $('#experienceTable tbody').append(
                `<tr>
                    <td><input type="text" name="position[]" class="form-control" placeholder="Position" style="border: 2px solid grey;"></td>
                    <td><input type="text" name="company[]" class="form-control" placeholder="Company" style="border: 2px solid grey;"></td>
                    <td><input type="text" name="duration[]" class="form-control" placeholder="Duration" style="border: 2px solid grey;"></td>
                    <td><textarea name="experience[]" class="form-control" placeholder="Experience" style="border: 2px solid grey;"></textarea></td>
                    <td><button type="button" class="btn btn-danger remove-table-row">Remove</button></td>
                </tr>`
            );
        });

        // Remove row from the table
        $('#experienceTable').on('click', '.remove-table-row', function() {
            $(this).closest('tr').remove();
        });
    
          $('#add2').click(function(){
            $('#education').append(
              `<div class="input-group" style="margin-top: 10px;">
                <input type="text" class="form-control" name="education[]" placeholder="From Matric to till">
                <div class="input-group-append">
                     <button type="button"  class="btn btn-danger remove-table-row">Remove</button>
                </div>
            </div>` 
                       
            );
            $('#institute').append(
                `<div class="input-group style="margin-top: 10px;">
                  <input type="text" class="form-control" name="institutes[]" placeholder="From which you have done your education">
                  <div class="input-group-append">
                   <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                   </div>
                  </div>` 
            );
          });  

          $('#add3').click(function(){
            $('#from').append(
              `<div class="input-group" style="margin-top: 10px;">
               <input type="time" name="from[]" class="form-control">
                <div class="input-group-append">
                     <button type="button"  class="btn btn-danger remove-table-row">Remove</button>
                </div>
            </div>` 
                       
            );
            $('#to').append(
                `<div class="input-group style="margin-top: 10px;">
                  <input type="time" class="form-control" name="to[]" placeholder="5:00am">
                  <div class="input-group-append">
                   <button type="button"  class="btn btn-danger remove-table-row">Remove</button>
                   </div>
                  </div>` 
            );
          });  
          $(document).on('click','.remove-table-row',function(){
            $(this).closest('.input-group').remove();
          });












          
      </script>
          <!-- row 1 div -->
           
          <!-- <div class="container" >      
                <div class="row">
                  
                 
                <div class="col-md-6 colums">
                 
                <h2 class="text-center">Add Experience</h2>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>From</label>
                      <input type="number" class="form-control" required="" placeholder="year">
                    </div>
                  </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Till</label>
                  <input type="number" class="form-control" required="">
                </div>
            </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Experience</label>
                      <textarea  class="form-control" required="" placeholder="share your experience in detail"></textarea>
                    </div>
                </div>
                
                
                 </div>
              
                <div class="col-md-6 colums">
                  
              <h2 class="text-center">Slots/Timing</h2>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>From</label>
                      <input type="time" class="form-control" required="" placeholder="03:00AM">
                      <small>Time in which your are available.</small>
                    </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Till</label>
                    <input type="time" class="form-control" required="" placeholder="Till">
                  </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                 <a href="#" class="button">Generate Exam</a>
                </div>
              </div>
                
                </div>
                
                </div>
          
                 </div> -->
                
                
    
  </body>
</html>
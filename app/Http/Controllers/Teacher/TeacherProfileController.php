<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TeacherProfileController extends Controller
{
      public function profile()
      {
        $url = url('/createprofile');
        $title = "Create Profile";
        $teacher = new Teacher();  //empty
        return view('teacher.teacherprofile',compact('title','url','teacher'));
      }
      public function store(Request $request)
      {
        // dd($request->all());
        $data = $request->validate([
          'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'name' => 'required|string|max:255',
          'email' => 'required|email|max:255',
          'phone' => 'required|numeric|digits_between:10,15',
          'province' => 'required|string|in:Punjab,Sindh,Khyber Pakhtunkhwa,Balochistan,Azad Jammu and Kashmir,Gilgit-Baltistan,Islamabad Capital Territory',
          'city' => 'required|string|max:255',
          'dob' => 'required|string|date|before:-16 years',
          'address' => 'required|string|max:500',
          'position.*' => 'required|string|max:255',
          'company.*' => 'required|string|max:255',
          'duration.*' => 'required|string|max:255',
          'experience.*' => 'required|string|max:1000',
          'education.*' => 'required|string|max:255',
          'institutes.*' => 'required|string|max:255',
          'subjects.*' => 'required|string|max:255',
          'profession' => 'required|string|max:255',
          'experience.*' => 'required|string|max:500',
          'from.*' => 'required|date_format:H:i',
          'to.*' => 'required|date_format:H:i',
          'gender' => 'required|in:male,female',
      ]);
    
        if($request->hasFile('profile_image'))
        {
        $image = $request->file('profile_image');
        $imageName = time() . 'Es.' . $image->getClientOriginalExtension(); //time()....every second it gets unique name
        $imgpath = $image->storeAs('image',$imageName,'public');
        }
        else
        {
           $imgpath = null;
        }
        
     
      $data['id'] = auth()->id();
      $data['profile_image'] = $imgpath;

      if (Teacher::where('id', auth()->id())->exists())
      {
        return "you already created a Profile";
        
          // return redirect()->back()->with('error','You have already created a Profile..');
      }
      else
      {
      $teacher = Teacher::create($data);
      }
      // dd($teacher);
      $data = [
        'teacher_id'=> $teacher->teacher_id,
        'profile_image' => $imgpath,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'province' => $request->province,
        'city' => $request->city,
        'dob' => $request->dob,
        'address' => $request->address,
        'education' => $request->education,
        'institutes' => $request->institutes,
        'company' => $request->company,
        'subjects' => $request->subjects,
        'profession' => $request->profession,
        'experience' => $request->experience,
        'position' => $request->position,
        'duration' => $request->duration,
        'from' => $request->from,
        'to' => $request->to,
        'gender' => $request->gender,
        'id' => $request->User()->id,
    ];
    // dd($data);
      
          return view('teacher.singledetailpage',compact('data'));
      }

      public function viewsingleprofile($teacher_id)
      {
          $teacher = Teacher::findOrFail($teacher_id);
          $data = $teacher;
          return view('teacher.singledetailpage',compact('data'));
      }
      public function edit($teacher_id)
      {
        $teacher = Teacher::findOrFail($teacher_id);
        $url = url('/update'). "/" . $teacher_id;
        $title = "Update Profile";
        return view('teacher.teacherprofile',compact('teacher','title','url'));
      }
      public function update($teacher_id, Request $request)
      {
        $request->validate([
          'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $teacher = Teacher::findOrFail($teacher_id);
        
        if($request->hasFile('profile_image'))
        {
        $image = $request->file('profile_image');
        $imageName = time() . 'Es.' . $image->getClientOriginalExtension();
        $imgpath = $image->storeAs('image',$imageName,'public');
        }
        else
        {
           $imgpath = null;
        }
      
        $teacher->profile_image = $imgpath;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->province = $request->province;
        $teacher->city = $request->city;
        $teacher->dob = $request->dob;
        $teacher->address = $request->address;
        $teacher->education = $request->education;
        $teacher->institutes = $request->institutes;
        $teacher->company = $request->company;
        $teacher->subjects = $request->subjects;
        $teacher->profession = $request->profession;
        $teacher->experience = $request->experience;
        $teacher->position = $request->position;
        $teacher->duration = $request->duration;
        $teacher->from = $request->from;
        $teacher->to = $request->to;
        $teacher->gender = $request->gender;
        $teacher->id = $request->user()->id;
      
        $teacher->save();
        return redirect()->route('viewcv');
      }
      public function viewcv()
      {
        $userId = auth()->id();
        $teacher = Teacher::all()->where('id',$userId)->first();
        $data = $teacher;
        return view('teacher.singledetailpage',compact('data'));
      }

      public function destroy($teacher_id,Request $request)
      {
          // dd($teacher_id);
          $teacher = Teacher::findOrFail($teacher_id); 
          if(auth()->id() == $teacher->id)
          {
            $teacher->delete();
          }     
      
          return redirect()->route('listofteacher');
      }

      
}


































































 // $teacher = new Teacher();
      // $teacher->profile_image = $imgpath;
      // $teacher->name = $request->name;
      // $teacher->email = $request->email;
      // $teacher->phone = $request->phone;
      // $teacher->province = $request->province;
      // $teacher->city = $request->city;
      // $teacher->dob = $request->dob;
      // $teacher->address = $request->address;
      // $teacher->education = $request->education;
      // $teacher->institutes = $request->institutes;
      // $teacher->company = $request->company;
      // $teacher->subjects = $request->subjects;
      // $teacher->profession = $request->profession;
      // $teacher->experience = $request->experience;
      // $teacher->position = $request->position;
      // $teacher->duration = $request->duration;
      // $teacher->from = $request->from;
      // $teacher->to = $request->to;
      // $teacher->gender = $request->gender;
      // $teacher->id = $request->user()->id;
      // $teacher->save();
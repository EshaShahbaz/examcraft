<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $primaryKey = "teacher_id";
    //fillable is used to insert the data in the database without this we can't create or update the data in the database.//
    protected $fillable = [
        'profile_image',
        'name',
        'email',
        'phone',
        'province',
        'city',
        'dob',
        'address',
        'education',
        'institutes',
        'company',
        'subjects',
        'profession',
        'experience',
        'position',
        'duration',
        'from',
        'to',
        'gender',
        'id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'education' => 'array',
        'institutes' => 'array',
        'company' => 'array',
        'subjects' => 'array',
        'experience' => 'array',
        'position' => 'array',
        'duration' => 'array',
        'from' => 'array',
        'to' => 'array',
    ];

    /**
     * Get the user that owns the profile.
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // // Relationship to StudentTeacher model (a teacher can recieves feedback from many students)
    // public function studentTeachers()
    // {
    //     return $this->hasMany(StudentTeacher::class, 'teacher_id');
    // }

    // // Calculate the average rating given by students to this teacher
    // public function averageRating()
    // {
    //     return $this->studentTeachers()->avg('rating');
    // }

    public function users()
{
    return $this->belongstoMany(User::class,'student_teachers','teacher_id','id')
    ->withPivot('rating', 'feedback');  
}

    
}

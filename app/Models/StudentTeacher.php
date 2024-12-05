<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTeacher extends Model
{
    use HasFactory;
    protected $table = "student_teachers";
    protected $primaryKey = "studenteacher_id";
    protected $fillable = ['student_id', 'teacher_id', 'rating', 'feedback'];
    

    // public function student()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }

    // // Relationship to the Teacher model (the teacher being rated)
    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class, 'teacher_id');
    // }
}
















// public function teachers()
// {
//     return $this->belongsToMany(Teacher::class);
// }
// public function averageRating()
// {
    // return $this->ratings()->avg('rating');
// }
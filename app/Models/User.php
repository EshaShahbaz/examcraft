<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Teacher\Question;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    protected $primarykey = "user_id";

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);  // Assuming a user can have many subjects
    }

    // Define the relationship for classes
    public function classes()
    {
        return $this->hasMany(Year::class);  // Assuming a user can have many classes
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





// public function teacher()
// {
//     return $this->hasOne(Teacher::class); // One user can be one teacher
// }

// // Relationship to StudentTeacher model (student can give ratings to teachers)
// public function studentTeacher()
// {
//     return $this->hasMany(StudentTeacher::class, 'id'); // One student can give feedback to many teachers
// }
public function teachers()
{
    return $this->belongstoMany(Teacher::class,'student_teachers','id','teacher_id')->withPivot('rating', 'feedback');
}
}

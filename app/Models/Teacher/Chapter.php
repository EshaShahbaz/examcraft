<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = "chapters";
    protected $primaryKey = "chapter_id";
    protected $fillable = ['chapter_name','chapter_no','subject_id', 'id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class,'chapter_id');
    }
    public function users()
    {
        return $this->belongs(User::class);
    }
}

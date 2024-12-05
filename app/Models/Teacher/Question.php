<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $primaryKey = "question_id";
    
    protected $fillable = ['add_question_text','question_type','rating','chapter_id','id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

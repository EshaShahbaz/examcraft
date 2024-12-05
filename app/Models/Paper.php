<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table = "papers";
    protected $primaryKey = "paper_id";
    protected $fillable = ['yearname','subjectname', 'name_of_institute','title_of_test','total_marks','duration','chapters','shortQuestions','longQuestions','id'];

    // Casting JSON columns
    protected $casts = [
        'chapters' => 'array', // Automatically cast to array
        'shortQuestions' => 'array', // Automatically cast to array
        'longQuestions' => 'array', // Automatically cast to array

    ];
}

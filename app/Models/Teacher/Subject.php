<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subjects";
    protected $primaryKey = "subject_id";
    protected $fillable = ['name','year_id', 'id'];
   
    public function years()
    {
        return $this->belongsTo(Year::class,'year_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class,'subject_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
}

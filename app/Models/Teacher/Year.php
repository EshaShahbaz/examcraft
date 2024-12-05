<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = "years";
    protected $primaryKey = "year_id";
    protected $fillable = ['name', 'id'];
    // function subject()
    // {
    //     return $this->hasMany('App\Models\Subject', 'year_id','year_id');
    // } 



    public function subjects()
    {
        return $this->hasMany(Subject::class,'year_id');
    }
    public function users()
    {
        return $this->belongs(User::class);
    }
}

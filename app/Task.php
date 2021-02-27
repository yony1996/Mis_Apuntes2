<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Course;

class Task extends Model
{
    protected $fillable = [
        'description',
        'delivery_date',
        'user_id',
        'course_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function  course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}

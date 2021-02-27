<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
  
    
    protected $fillable = [
        'name',
        'teacher',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

}

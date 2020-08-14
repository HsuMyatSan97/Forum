<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable =['description','user_id','question_id'];

    public function question(){
        return $this->belongsTo(Question::class);
    }
     public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class,'likes');
    }
}

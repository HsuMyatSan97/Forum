<?php

namespace App\Policies;

use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update($user,Question $question){
       return $user->id == $question->user_id;
    }

    public function delete($user,Question $question){
        return $user->id == $question->user_id && $question->answers()->count()<1;
    }
    
}

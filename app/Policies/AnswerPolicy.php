<?php

namespace App\Policies;

use App\Answer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
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
    public function update($user,Answer $answer){
        return $user->id == $answer->user_id;
     }
     public function delete($user,Answer $answer){
            return $user->id== $answer->user_id;
        }
    }


<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Answer $answer){
        $answer->likes()->attach(Auth::user()->id);
        return back();

    }
    public function unlike(Answer $answer){
        $answer->likes()->detach(Auth::user()->id);
        return back();
    }
}

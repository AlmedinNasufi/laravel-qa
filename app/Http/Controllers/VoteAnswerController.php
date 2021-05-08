<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Answer $answer)
    {
        // TODO: Implement __invoke() method.
        $vote = (int) request()->vote;

        auth()->user()->voteAnswer($answer, $vote);

        return back();
    }
}

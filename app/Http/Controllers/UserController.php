<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserDashboard(): View|Factory|Application
    {
        $questions = Question::with('answers')->get();
        return view('user.dashboard')->with('questions', $questions);
   }

    public function addAnswer(string $questionId, Request $request): RedirectResponse
    {
        $validateAnswer = $request->validate([
           'answer' => ['required']
        ]);
        $question = Question::findOrFail($questionId);
        $user = $request->user();

        $correctAnswer = trim($validateAnswer['answer']) === trim($question->correct_answer);

        UserAnswer::create([
            'user_id' => $user->id,
            'question_id' => $questionId,
            'answer' => $validateAnswer['answer'],
            'correct' => $correctAnswer

        ]);

        $message = $correctAnswer ? 'Your answer is correct' : 'Your answer is incorrect';

        return redirect()->route('user-dashboard')->with('message', $message);
   }

}

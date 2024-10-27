<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function showUserDashboard(Request $request): View|Factory|Application
    {
        $user = $request->user();
//        $questions = Question::with('answers')->get();
        $unAnsweredQuestions = Question::whereDoesntHave('userAnswers', function (Builder $query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        $totalQuestionCount = Question::all()->count();

        $correctAnswersCount = UserAnswer::where('user_id', $user->id)
            ->where('correct', 1)
            ->count();

        return view('user.dashboard')->with(
            ['questions' => $unAnsweredQuestions, 'totalQuestionCount' => $totalQuestionCount, 'correctAnswersCount' => $correctAnswersCount,
            ]
        );
    }

    public function addAnswer(string $questionId, Request $request): RedirectResponse
    {
        $validateAnswer = $request->validate([
           'answer' => ['required'],
        ]);
        $question = Question::findOrFail($questionId);
        $user = $request->user();

        $correctAnswer = trim($validateAnswer['answer']) === trim($question->correct_answer);

        UserAnswer::create([
            'user_id' => $user->id,
            'question_id' => $questionId,
            'answer' => $validateAnswer['answer'],
            'correct' => $correctAnswer,

        ]);

        $message = $correctAnswer ? 'Your answer is correct' : 'Your answer is incorrect';

        return redirect()->route('user-dashboard')->with('message', $message);
    }
}

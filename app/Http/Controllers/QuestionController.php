<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Answer;
use App\Models\Question;
=======
>>>>>>> 41b16ad84b415f50aceca0a044f164cd33856885
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
<<<<<<< HEAD
    private array $validateRules = ['required','string'];
=======
>>>>>>> 41b16ad84b415f50aceca0a044f164cd33856885
    public function gotoQuestionPage(): View|Factory|Application
    {
        return view('admin.createQuestions');
    }

<<<<<<< HEAD
    public function addQuestion(request $request)
    {
        $this->validateRequest($request);

        $question = Question::create([
            'question' => $request['question'],
            'correct_answer' => $request['correct_answer'],
        ]);

        if(!$question){
            return redirect()->route('dashboard');
        }

        $answers = [
            'answer1' => $request['answer1'],
            'answer2' => $request['answer2'],
            'answer3' => $request['answer3'],
            'answer4' => $request['answer4'],
        ];

        foreach ($answers as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $answer,
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function validateRequest(Request $request): void
    {
        $request->validate([
            'question' => $this->validateRules,
            'correct_answer' => $this->validateRules,
            'answer1' => $this->validateRules,
            'answer2' => $this->validateRules,
            'answer3' => $this->validateRules,
            'answer4' => $this->validateRules,
        ]);
=======
    public function addQuestion(): View|Factory|Application
    {
        return view('welcome');
>>>>>>> 41b16ad84b415f50aceca0a044f164cd33856885
    }
}

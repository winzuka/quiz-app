<?php

namespace App\Http\Controllers;


use App\Http\Requests\QuestionCreateRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function gotoQuestionPage(): View|Factory|Application
    {
        return view('admin.createQuestions');
    }

    public function addQuestion(QuestionCreateRequest $request): \Illuminate\Http\RedirectResponse
    {
       $validatedQuestionCreateRequest = $request->validated();

        $question = Question::create([
            'question' => $validatedQuestionCreateRequest['question'],
            'correct_answer' => $validatedQuestionCreateRequest['correct_answer'],
        ]);

        if(!$question){
            return redirect()->route('dashboard');
        }

        $answers = [
            'answer1' => $validatedQuestionCreateRequest['answer1'],
            'answer2' => $validatedQuestionCreateRequest['answer2'],
            'answer3' => $validatedQuestionCreateRequest['answer3'],
            'answer4' => $validatedQuestionCreateRequest['answer4']
        ];

        foreach ($answers as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $answer,
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function editQuestion(string $questionId)
    {
        $question = Question::with('answers')->findOrFail($questionId);

        $answer1 = $question->answers[0]->answer;
        $answer2 = $question->answers[1]->answer;
        $answer3 = $question->answers[2]->answer;
        $answer4 = $question->answers[3]->answer;

        $dataForBlade = [
            'question' => $question,
            'correct_answer' => $question->correct_answer,
            'answer1' => $answer1,
            'answer2' => $answer2,
            'answer3' => $answer3,
            'answer4' => $answer4,
        ];

        return view('admin.update')->with($dataForBlade);
    }

    public function updateQuestion(string $questionId, Request $request)
    {
        dd($request);
    }
}

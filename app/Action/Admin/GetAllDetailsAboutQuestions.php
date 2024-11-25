<?php

namespace App\Action\Admin;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class GetAllDetailsAboutQuestions
{
    public function getQuestionAndRelatedAnswers($questionId): View|Factory|Application
    {
        $question = Question::with('answers')->findOrFail($questionId);

        $answers = $question->answers->pluck('answer');

        $dataForBlade = $this->createValuesForBlade($question, $answers);

        return view('admin.update')->with($dataForBlade);
    }

    public function createValuesForBlade(Model|Collection|Question|null $question, mixed $answers): array
    {
        $dataForBlade = [
            'question' => $question,
            'correct_answer' => $question->correct_answer,
            'answers' => $answers,
        ];

        return $dataForBlade;
    }
}

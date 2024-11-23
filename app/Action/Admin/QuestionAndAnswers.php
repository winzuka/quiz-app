<?php

namespace App\Action\Admin;

use App\Models\Answer;
use App\Models\Question;

class QuestionAndAnswers
{
    public function createQuestionAndAnswers(array $validatedQuestionCreateRequest)
    {
        $question = $this->createQuestion($validatedQuestionCreateRequest);

        if (! $question) {
            return redirect()->route('dashboard');
        }

        $answers = [
            'answer1' => $validatedQuestionCreateRequest['answer1'],
            'answer2' => $validatedQuestionCreateRequest['answer2'],
            'answer3' => $validatedQuestionCreateRequest['answer3'],
            'answer4' => $validatedQuestionCreateRequest['answer4'],
        ];

        foreach ($answers as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $answer,
            ]);
        }

        return redirect()->route('dashboard');
    }

    private function createQuestion(array $validatedQuestionCreateRequest)
    {
        $question = Question::create([
            'question' => $validatedQuestionCreateRequest['question'],
            'correct_answer' => $validatedQuestionCreateRequest['correct_answer'],
        ]);
        return $question;
    }
}

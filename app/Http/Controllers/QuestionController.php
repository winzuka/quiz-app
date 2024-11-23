<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Action\Admin\QuestionAndAnswers;
use App\Http\Requests\QuestionCreateRequest;
use App\Action\Admin\GetAllDetailsAboutQuestions;

class QuestionController extends Controller
{
    public function gotoQuestionPage(): View|Factory|Application
    {
        return view('admin.createQuestions');
    }

    public function addQuestion(QuestionCreateRequest $request, QuestionAndAnswers $questionAndAnswers): RedirectResponse
    {
        $validatedQuestionCreateRequest = $request->validated();

        if ($validatedQuestionCreateRequest) {
            $questionAndAnswers->createQuestionAndAnswers($validatedQuestionCreateRequest);
        }

        return redirect()->route('dashboard')->with('failed', 'Validation Error');
    }

    public function editQuestion(string $questionId, GetAllDetailsAboutQuestions $getAllDetailsAboutQuestions): RedirectResponse
    {
        if ($questionId) {
            $getAllDetailsAboutQuestions->getQuestionAndRelatedAnswers($questionId);
        }

        return redirect()->route('dashboard')->with('failed', 'Validation Error');
    }

    public function updateQuestion(string $questionId, QuestionCreateRequest $request): RedirectResponse
    {
        $validatedQuestionUpdateRequest = $request->validated();

        $question = Question::findOrFail($questionId);

        DB::transaction(function () use ($question, $validatedQuestionUpdateRequest) {
            $question->update([
                'question' => $validatedQuestionUpdateRequest['question'],
                'correct_answer' => $validatedQuestionUpdateRequest['correct_answer'],
            ]);

            $answers = [
                'answer1' => $validatedQuestionUpdateRequest['answer1'],
                'answer2' => $validatedQuestionUpdateRequest['answer2'],
                'answer3' => $validatedQuestionUpdateRequest['answer3'],
                'answer4' => $validatedQuestionUpdateRequest['answer4'],
            ];

            foreach ($question->answers as $index => $answer) {
                $answer->update([
                    'answer' => $answers['answer'.($index + 1)],
                ]);
            }
        });

        return redirect()->route('dashboard');
    }

    public function deleteQuestion(string $questionId)
    {
        $question = Question::findOrFail($questionId);
        $question->delete();

        return redirect()->route('dashboard')->with('success', 'Question has been deleted');
    }
}

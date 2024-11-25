<?php

namespace App\Http\Controllers;

use App\Service\GetQuestions;
use Illuminate\Contracts\View\View;
use App\Action\Admin\UpdateQuestions;
use Illuminate\Http\RedirectResponse;
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

    public function editQuestion(string $questionId, GetAllDetailsAboutQuestions $getAllDetailsAboutQuestions): Factory|View|Application
    {
        if ($questionId) {
            return $getAllDetailsAboutQuestions->getQuestionAndRelatedAnswers($questionId);
        }

        return redirect()->route('dashboard')->with('failed', 'Validation Error');
    }

    public function updateQuestion(string $questionId, QuestionCreateRequest $request, UpdateQuestions $updateQuestions): RedirectResponse
    {
        $validatedQuestionUpdateRequest = $request->validated();

        if ($validatedQuestionUpdateRequest) {
            $updateQuestions->updateQuestionsAndAnswers($questionId, $validatedQuestionUpdateRequest);
        }

        return redirect()->route('dashboard')->with('failed', 'Validation Error');
    }

    public function deleteQuestion(string $questionId): RedirectResponse
    {
        $question = GetQuestions::getQuestionByQuestionId($questionId);
        $question->delete();

        return redirect()->route('dashboard')->with('success', 'Question has been deleted');
    }
}

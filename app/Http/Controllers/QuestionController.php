<?php

namespace App\Http\Controllers;

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

    public function addQuestion(): View|Factory|Application
    {
        return view('welcome');
    }
}

<?php

namespace App\Service;

use App\Models\Question;

class GetQuestions
{
    public static function getQuestionByQuestionId(string $questionId)
    {
        return Question::findOrFail($questionId);
    }
}

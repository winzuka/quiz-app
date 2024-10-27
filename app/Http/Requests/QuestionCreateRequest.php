<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class QuestionCreateRequest extends FormRequest
{
    private array $validateRules = ['required', 'string', 'min:1'];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => $this->validateRules,
            'correct_answer' => $this->validateRules,
            'answer1' => $this->validateRules,
            'answer2' => $this->validateRules,
            'answer3' => $this->validateRules,
            'answer4' => $this->validateRules,
        ];
    }
}

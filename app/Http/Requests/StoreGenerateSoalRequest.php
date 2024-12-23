<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenerateSoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string',
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.answer_text' => 'required|string',
            'questions.*.answers.*.is_correct' => 'boolean',
        ];

        
    }
}

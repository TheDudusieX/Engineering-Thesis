<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrchesterReviewAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'maximum_number_of_orchestras' => ['required', 'integer', 'min:1', 'max:15'],
            'term' => ['required', 'date', 'after:now'],
            'start_time' => ['required'],
            'place' => ['required', 'string', 'max:255'],
            'deadline' => ['required', 'date', 'before:term'],
        ];
    }
}

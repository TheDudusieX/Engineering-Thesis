<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'surname' => ['required', 'string', 'max:255'],
            'phone'=> ['required', 'integer'],
            'email' => ['required', 'string', 'max:255'],
            'numberofmembers' => ['required', 'integer'],
            'bandmaster'=> ['required', 'string', 'max:255'],
            'president' => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string', 'max:255'],
            'orchestraname' => ['required', 'unique:orchestras,orchestraname,'.$this->id, 'string', 'max:255']
        ];
    }
}

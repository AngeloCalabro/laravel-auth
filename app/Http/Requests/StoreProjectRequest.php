<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name_project' => 'required|unique:posts|max:150|min:3',
            'description' => 'nullable'
        ];
    }
    public function messages(){
        return [
            'name_project.required' => 'Il titolo è obbligatorio.',
            'name_project.min' => 'Il titolo deve essere lungo almeno :min caratteri.',
            'name_project.max' => 'Il titolo non può superare i :max caratteri.',
            'name_project.unique:posts' => 'Il titolo esiste già'
        ];
    }
}

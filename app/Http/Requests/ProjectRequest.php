<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'start_date' => 'required|after:yesterday',
            'end_date' => 'after:start_date',
        ];
    }

    public function messages(): array
    {
       return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'description.required' => 'La descrizione è un campo obbligatorio',
            'description.min' => 'La descrizione deven contenere almeno :min caratteri',
            'start_date.required' => "La data d'inizio è un campo obbligatorio",
            'start_date.after' => "La data d'inizio deve non può essere precedente ad oggi",
            'end_date.after' => "La data di fine deve essere successiva a quella d'inizio",
        ];
    }
}

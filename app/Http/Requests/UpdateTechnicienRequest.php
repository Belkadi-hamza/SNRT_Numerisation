<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTechnicienRequest extends FormRequest
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
    public function rules()
    {
        $technicienId = $this->route('technicien');

        return [
            'cin' => 'required|string|max:50|unique:techniciens,cin,' . $technicienId . ',ID_technicien',
            'Nom' => 'required|string|max:50',
            'Prenom' => 'required|string|max:50',
        ];
    }
}

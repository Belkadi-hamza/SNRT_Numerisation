<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupportRequest extends FormRequest
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
        return [
            'Num_support' => 'required|string|max:50|unique:supports,Num_support',
            'ID_type_support' => 'required|integer|exists:type_de_supports,ID_type_support',
            'Titre' => 'required|string|max:100',
            'ID_genre' => 'required|integer|exists:genres,ID_genre',
            'Duree_hours' => 'required|integer|min:0',
            'Duree_minutes' => 'required|integer|min:0|max:59',
            'Duree_seconds' => 'required|integer|min:0|max:59',
            'Date_num' => 'required|date_format:Y-m-d',
            'ID_technicien' => 'required|integer|exists:techniciens,ID_technicien',
        ];
    }
}

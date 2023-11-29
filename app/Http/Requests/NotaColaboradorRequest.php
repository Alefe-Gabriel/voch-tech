<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaColaboradorRequest extends FormRequest
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
            'colaborador_id' => 'required',
            'cargo_id' => 'required',
            'nota_desempenho' => 'required',
        ];
    }
}

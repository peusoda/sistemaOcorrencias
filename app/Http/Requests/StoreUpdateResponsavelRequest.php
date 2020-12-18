<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateResponsavelRequest extends FormRequest
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
        $id = $this->id;
        return [
            'nome' => [
                'required',
                Rule::unique('responsavels')->ignore($id)
            ],
            'cpf' => [
                'required',
                'min:14',
                Rule::unique('responsavels')->ignore($id)
            ],
            'email' => [
                'required',
                Rule::unique('responsavels')->ignore($id)
            ],
            'contato_1' => 'required|min:8'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAlunoRequest extends FormRequest
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
            'nome' => 'required|unique:alunos',
            'data_nascimento' => 'required',
            'sexo' => 'required',
            'naturalidade' => 'required',
            'municipio' => 'required',
            'transporte' => 'required',
            'cpf' => 'required|unique:alunos|min:14',
            'tipo_sanguineo' => 'required',
            'turma' => 'required'  
        ];
    }
}

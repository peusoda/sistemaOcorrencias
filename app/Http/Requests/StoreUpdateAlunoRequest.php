<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = $this->id;
        return [
            'nome' => "required|unique:alunos,nome,{$id},id",
            'data_nascimento' => 'required|date',
            'sexo' => 'required',
            'naturalidade' => 'required',
            'municipio' => 'required',
            'transporte' => 'required',
            'cpf' => [
                'required',
                'min:14',
                Rule::unique('alunos')->ignore($id),
            ],
            //"required|unique:alunos,cpf,{$id},id|min:14",
            'tipo_sanguineo' => 'required',
            'turma' => [
                Rule::unique('alunos')->ignore($id)
            ]  
        ];
    }
}

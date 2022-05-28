<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|min:3',
            'type' => 'required|in:PF,PJ',
            'cpf' => 'required_if:type,PF|unique:clients',
            'cnpj' => 'required_if:type,PJ|unique:clients'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo :attribute é obrigatório',
            'name.min' => 'Limite mínimo de :min caracteres',
            'type.required' => 'Campo :attribute é obrigatório',
            'cpf.required_if' => 'Campo :attribute é obrigatório, quando tipo for PF',
            'cpf.unique' => 'Campo :attribute já esta cadastrado.',
            'cnpj.required_if' => 'Campo :attribute é obrigatório, quando tipo for PF',
            'cnpj.unique' => 'Campo :attribute já esta cadastrado.',
        ];
    }
}

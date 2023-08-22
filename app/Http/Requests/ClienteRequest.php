<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {return [
         
        'nome' => 'required|max:80|min:5',
        'cpf'=> 'required|max:11|min:11|unique:clientes,cpf',
        'celular' => 'required|max:15|min:10',
        'email'=> 'required|email|unique:clientes,email',
        'nacimento'=>'required|max:10|min:10',
        'cep' =>'required|max:8|min:8',
        'endereço'=> 'required',
        'bairro'=> 'required',
        'password'=> 'required'
    ];
}
public function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json([
        'success' => false,
        'error' => $validator->errors()
    ]));
}

public function messages()
{
    return[
        'nome.required' => 'O campo nome é obrigatorio',
        'nome.max' => 'O campo nome deve conter no maximo 80 caracteres',
        'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',
        'cpf.required' => 'O campo cpf é obrigatorio',
        'cpf.max' => 'O campo CPF deve conter no maximo 11 caracteres',
        'cpf.min' => 'O campo CPF deve conter no minimo 11 caracteres',
        'cpf.unique' => 'CPF ja cadastrado no sistema',
        'celular.required' => 'Celular obrigatorio',
        'celular.max' => 'O campo celular deve conter no maximo 15 caracteres',
        'celular.min' => 'O campo celular deve conter no minimo 10 caracteres',
        'email.required' => 'E-mail obrigatorio',
        'email.email' => 'formato de email invalido',
        'email.unique' => 'Email ja cadastrado no sistem',
        'nacimento.required' => 'Data de nacimento obrigatorio',
        'nacimento.max' => 'O campo data deve conter no maximo 10 caracteres',
        'nacimento.min' => 'O campo data deve conter no minimo 10 caracteres',
        'cep.required' => 'cep obrigatorio',
        'cep.max' => 'O campo cep deve conter no maximo 8 caracteres',
        'cep.min' => 'O campo cep deve conter no minimo 8 caracteres',
        'endereço.required' => 'senha obrigatoria',
        'bairro.required' => 'senha obrigatoria',
        'password.required' => 'senha obrigatoria'
        
    ];
}
}


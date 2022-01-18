<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvironmentRequest extends FormRequest
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
            'id' => ['required', 'min:3', 'max:100', 'unique:tenants,id'],
            'domain' => ['required', 'min:3', 'max:100', 'unique:domains,domain']
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Identifique o Ambiente no sistema',
            'id.min' => 'A identificação do Ambiente é muito pequena',
            'id.max' => 'A identificação do Ambiente deve conter até 100 caracteres',
            'id.unique' => 'A identificação do escolhida está em uso no sistema',
            'domain.required' => 'Identifique o domínio no sistema',
            'domain.min' => 'A identificação do domínio parece ser muito curta',
            'domain.max' => 'A identificação do domínio deve conter até 100 caracteres',
            'domain.unique' => 'O domínio escolhido está em uso no sistema',
        ];
    }
}

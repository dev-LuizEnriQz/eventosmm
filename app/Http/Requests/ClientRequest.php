<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//Permite que la solicitud sea procesada
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $clientId = $this->route('id') ?? null;
        return [
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'second_surname' => ['nullable', 'string', 'max:25'],
            'phone' => ['required', 'string', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email,'.$clientId],
            'company' => ['nullable', 'string', 'max:255'],
            'invalidCheck' => 'accepted',//Valida que se acepte lo que se envia del formulario
        ];
    }
}

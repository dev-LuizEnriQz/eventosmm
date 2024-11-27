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
        return false;
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
            'second_surname' => ['required', 'string', 'max:25'],
            'phone' => ['required', 'string', 'regex:/^\d{2}-\d{4}-\d{4}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email,'.$clientId],
            'invalidCheck' => 'accepted',//Valida que se acepte lo que se envia del formulario
        ];
    }
}

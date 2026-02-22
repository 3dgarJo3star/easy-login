<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'first_name'=> [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'
            ],
            'birth_date' => [
                'required',
                'date',
                'before:today'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],
            'username' => [
                'required',
                'alpha_dash',
                'unique:users,username'
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()      
                    ->mixedCase()    
                    ->numbers()      
                    ->symbols(),     
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.regex' => 'Los nombres solo pueden contener letras.',
            'last_name.regex' => 'Los apellidos solo pueden contener letras.',
            'birth_date.before' => 'La fecha debe ser anterior a hoy.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede exceder 255 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, una minúscula, un número y un signo de puntuación.',
        ];
    }
}

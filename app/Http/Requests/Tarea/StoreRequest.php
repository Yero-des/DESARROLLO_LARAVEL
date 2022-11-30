<?php

namespace App\Http\Requests\Tarea;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // IMPORTANTE cambia la autorizacion a true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Establece las reglas de la ruta
        return [
            // Establece maximos y minimos
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:255',
            // Establece tipo dato
            'date' => 'required|date',
            'status' => 'nullable|boolean',
        ];
    }
}

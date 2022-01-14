<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'string',
                'max:191',
            ],
            'desc' => [
                'required',
                'string',
                'max:191',
            ],
            'precio' => 'required',
            'costo' => 'required',
        ];
    }
}

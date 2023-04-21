<?php

namespace App\Http\Requests\Admin\Mercaderium;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMercaderium extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.mercaderium.edit', $this->mercaderium);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'descripcion' => ['sometimes', 'string'],
            'detalle' => ['sometimes', 'string'],
            'urlimagen' => ['sometimes', 'string'],
            'tipo' => ['sometimes', 'string'],
            'precio' => ['sometimes', 'numeric'],
            'cantidad' => ['sometimes', 'integer'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
<?php

namespace Virtsevda\LaravelCatalog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'sku' => 'required|max:255',
            'brand_id' => 'nullable|exists:brands,id',

        ];
    }
}

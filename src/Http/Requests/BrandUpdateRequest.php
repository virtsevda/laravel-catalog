<?php

namespace Virtsevda\LaravelCatalog\Http\Requests;

use Virtsevda\LaravelCatalog\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
            'name'=>'required|max:255|unique:brands,name,'.$this->brand,
            'slug'=>'required|max:255|unique:brands,slug,'.$this->brand,
            'parent_id'=>'nullable',
            'created_at'=>'nullable',
        ];
    }
}

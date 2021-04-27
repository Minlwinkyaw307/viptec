<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth_check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'filter_product_name' => 'nullable|string|max:255',
            'filter_create_at' => 'nullable|date:Y-m-d',
//            'filter_category_id' => 'nullable|numeric|exists:categories,id',
            'filter_status_id' => 'nullable|numeric',
        ];
    }
}

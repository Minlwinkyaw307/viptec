<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class GetFreeQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'phone' => 'required|string|max:30',
            'email' => 'required|string|email:rfc,dns',
            'product_id' => 'required|exists:products,id,deleted_at,NULL',
            'piece' => 'required|numeric',
            'message' => 'required|string|max:10000',
        ];
    }
}

<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "name" => "required|string|max:50",
            "surname" => "required|string|max:50",
            "phone" => "required|string|max:25",
            "email" => "required|email:rfc,dns|string|max:35",
            "message" => "required|string|max:10000"
        ];
    }
}

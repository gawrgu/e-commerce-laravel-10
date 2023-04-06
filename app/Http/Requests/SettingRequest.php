<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'website_name' => 'required|string',
            'website_url' => 'required|string',
            'page_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'address' => 'required|string',
            'phone1' => 'required|string',
            'phone2' => 'required|string',
            'email1' => 'required|email',
            'email2' => 'required|email'
        ];
    }
}

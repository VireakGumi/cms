<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            "title"         => "required|string",
            "content"       => "required|string",
            "photo"         => "nullable|image|mimes:jpg,png,jpeg|max:2048",
            "category_id"   => "required",
            "user_id"       => "required",
        ];
    }
}

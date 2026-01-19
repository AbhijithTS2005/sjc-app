<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'content' => ['required', 'string', 'min:20'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'published_at' => ['nullable', 'date'], // Only for edit requests
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'News title is required.',
            'title.min' => 'News title must be at least 3 characters.',
            'title.max' => 'News title cannot exceed 255 characters.',
            'description.required' => 'News description is required.',
            'description.min' => 'News description must be at least 10 characters.',
            'description.max' => 'News description cannot exceed 500 characters.',
            'content.required' => 'News content is required.',
            'content.min' => 'News content must be at least 20 characters.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, GIF, or SVG format.',
            'image.max' => 'Image size cannot exceed 5MB.',
            'published_at.date' => 'Published date must be a valid date.',
        ];
    }
}

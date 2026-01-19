<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You can add authorization checks here later
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'date' => ['required', 'date', 'date_format:Y-m-d'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'content' => ['required', 'string', 'min:20'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'type' => ['required', 'in:academic,sports,cultural,placement,social'],
            'department' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:approved,pending,rejected'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Event title is required.',
            'title.min' => 'Event title must be at least 3 characters.',
            'title.max' => 'Event title cannot exceed 255 characters.',
            'date.required' => 'Event date is required.',
            'date.date_format' => 'Event date must be in YYYY-MM-DD format.',
            'description.required' => 'Event description is required.',
            'description.min' => 'Event description must be at least 10 characters.',
            'description.max' => 'Event description cannot exceed 500 characters.',
            'content.required' => 'Event content is required.',
            'content.min' => 'Event content must be at least 20 characters.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, GIF, or SVG format.',
            'image.max' => 'Image size cannot exceed 5MB.',
            'type.required' => 'Event type is required.',
            'type.in' => 'Event type must be one of: academic, sports, cultural, placement, social.',

        ];
    }
}

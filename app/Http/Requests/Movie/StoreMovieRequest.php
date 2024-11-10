<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreMovieRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'status' => 'required|boolean',
            'title_ua' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ua' => 'nullable|string',
            'description_en' => 'nullable|string',
            'youtube_trailer_id' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'viewing_start_date' => 'nullable|date',
            'viewing_end_date' => 'nullable|date',
            'screenshots' => 'array',
            'screenshots.*' => 'string',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'slug' => 'required|string',
        ];
    }
    protected function prepareForValidation()
    {
        return $this->merge([
            'slug' => $this->slug ? Str::slug($this->slug) : Str::slug($this->title_en)
        ]);
    }
}

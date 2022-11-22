<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'isbn' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'author_id' => ['required'],
            'author' => ['required', 'required_unless:author_id,0'],
            'genre_id' => ['required'],
            'genre' => ['required', 'required_unless:author_id,0'],
            'purchased_at' => ['required', 'date'],
            'image' => ['required', 'string', 'url', 'max:255'],
        ];
    }
}

<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $title
 * @property-read string $content
 */
class BlogCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'content' => ['required', 'min:10']
        ];
    }
}

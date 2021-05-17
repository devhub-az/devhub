<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'body' => 'required',
            'hubs' => 'required|array|min:3',
            'hubs.*' => 'exists:hubs,id',
        ];
    }
}

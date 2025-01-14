<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date'],
            'profile_photo' => ['nullable', 'image', 'max:2048'], // 2MB max size
            'about_me' => ['nullable', 'string', 'max:500'], // Optional, 500 characters max
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make this request, adjust as needed for your application
        // return false; // Uncomment this line to deny all requests
    }

    public function rules(): array
    {
        return [

            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required'

        ];
    }
}

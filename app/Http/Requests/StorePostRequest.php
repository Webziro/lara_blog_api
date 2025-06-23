<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; // Needed for Auth::user() or Auth::check()

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can call your PostPolicy@create method here.
        // If the policy method returns true, the request is authorized.
        // If it returns false (or throws AuthorizationException), the request is denied
        // before it even reaches the controller.
        return Auth::check() && Auth::user()->can('create', \App\Models\Post::class);
        // OR simply: return true; // if you already handle 'create' auth in controller or it's public
        // However, it's good practice to centralize authorization here if possible.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255', // Changed to string for clarity
            'body' => 'required|string',
        ];
    }

    /**
     * Optionally, you can customize error messages.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A title is absolutely required for your post!',
            'body.required' => 'Don\'t forget to add some content to your post body.',
        ];
    }

    /**
     * Optionally, you can prepare data for validation.
     * For example, trimming whitespace.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => trim($this->title),
            'body' => trim($this->body),
        ]);
    }
}
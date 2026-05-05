<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
   * @return array<string, ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'title' => 'required|string|max:255',
      'short_description' => 'required|string',
      'description' => 'required|string',
      'show_on_home' => 'nullable|boolean',
      'phone_text' => 'nullable|string|max:255',
      'phone_number' => 'nullable|string|max:50',
    ];
  }
}

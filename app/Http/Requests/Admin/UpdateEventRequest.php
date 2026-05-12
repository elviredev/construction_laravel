<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'show_on_home' => 'required|boolean',
      'event_location' => 'required|string|max:255',
      'event_location_details' => 'nullable|string|max:255',
      'event_date' => 'required|string|max:255',
      'event_time' => 'required|string|max:255',
      'ticket_price' => 'nullable|string|max:255',
      'youtube_id' => 'nullable|string|max:255',
      'button_text' => 'nullable|string|max:255',
      'button_link' => 'nullable|string|max:255',
    ];
  }
}

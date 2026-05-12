<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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

  // Messages personnalisés
  public function messages(): array
  {
    return [
      'title.required' => 'Le champs titre est obligatoire.',
      'image.required' => 'Le champs image est obligatoire.',
      'description.required' => 'Le champs description est obligatoire.',
      'show_on_home.required' => 'Le champs show on home est obligatoire.',
      'event_location.required' => 'Le champs event location est obligatoire.',
      'event_date.required' => 'Le champs event date est obligatoire.',
      'event_time.required' => 'Le champs event time est obligatoire.'
    ];
  }
}

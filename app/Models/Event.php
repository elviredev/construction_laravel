<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\Attributes\Sluggable;

#[Sluggable(
  from: 'title',
  to: 'slug',
  onUpdate: false
)]
class Event extends Model
{
  protected $fillable = [
    'title',
    'description',
    'show_on_home',
    'event_location',
    'event_location_details',
    'event_date',
    'event_time',
    'ticket_price',
    'youtube_id',
    'button_text',
    'button_link',
  ];

  public function eventFaqs(): HasMany
  {
    return $this->hasMany(EventFaq::class);
  }
}
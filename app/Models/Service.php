<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable = [
    'title',
    'slug',
    'short_description',
    'description',
    'show_on_home',
    'phone_text',
    'phone_number',
  ];
}

<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'photo', 'password'])]
#[Hidden(['password', 'token'])]
class Admin extends Authenticatable
{
  /** @use HasFactory<UserFactory> */
  use HasFactory, Notifiable;
}

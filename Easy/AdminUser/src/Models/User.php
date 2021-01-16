<?php

namespace Easy\AdminUser\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User as AdminUser;

class User extends AdminUser
{
    use HasFactory, Notifiable, HasApiTokens;
}

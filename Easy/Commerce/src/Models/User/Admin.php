<?php

namespace Easy\Commerce\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Admin extends User
{
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
}

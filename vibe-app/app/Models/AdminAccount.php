<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role', 'active'];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return ['password' => 'hashed', 'active' => 'boolean'];
    }

    public const ROLES = [
        'founder' => 'Founder',
        'super_admin' => 'Super admin',
        'regular_admin' => 'Regular admin',
        'basic_user' => 'Basic user',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role', 'active', 'avatar_path', 'sponsored_by', 'invited_by', 'hired_by', 'hired_at'];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'active' => 'boolean',
            'hired_at' => 'date',
            'last_login_at' => 'datetime',
        ];
    }

    public const ROLES = [
        'founder' => 'Founder',
        'super_admin' => 'Super admin',
        'regular_admin' => 'Regular admin',
        'basic_user' => 'Basic user',
    ];

    public function rights(): array
    {
        return match ($this->role) {
            'founder' => [
                'View reports and member records',
                'Edit membership plan and status',
                'Create and manage all admin roles',
                'Database import/export tools are not enabled in this release',
            ],
            'super_admin' => [
                'View reports and member records',
                'Edit membership plan and status',
                'Manage regular-admin and basic-user accounts',
                'No database-file download or import access',
            ],
            'regular_admin' => [
                'View reports and member records',
                'Edit membership plan and status',
                'No admin-account management or database-file access',
            ],
            default => [
                'View aggregate reports only',
                'No member record editing or database-file access',
            ],
        };
    }
}

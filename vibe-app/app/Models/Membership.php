<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membership extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'business_name',
        'mobile_number',
        'plan',
        'requested_plan',
        'payment_status',
        'amount_paid',
        'payment_method',
        'status',
        'registration_source',
        'activated_at',
        'preferred_name',
        'city_municipality',
        'province',
        'entrepreneur_stage',
        'business_registration_status',
        'industry',
        'products_services',
        'primary_goal',
        'support_needs',
        'preferred_language',
        'profile_completed_at',
        'full_name',
        'complete_address',
        'id_document_path',
        'id_uploaded_at',
        'terms_accepted_at',
        'terms_version',
        'marketing_consent_at',
    ];

    protected function casts(): array
    {
        return [
            'activated_at' => 'datetime',
            'support_needs' => 'array',
            'profile_completed_at' => 'datetime',
            'id_uploaded_at' => 'datetime',
            'terms_accepted_at' => 'datetime',
            'marketing_consent_at' => 'datetime',
            'amount_paid' => 'decimal:2',
        ];
    }
}

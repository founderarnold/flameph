<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->string('preferred_name', 80)->nullable();
            $table->string('city_municipality', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('entrepreneur_stage', 32)->nullable();
            $table->string('business_registration_status', 32)->nullable();
            $table->string('industry', 100)->nullable();
            $table->text('products_services')->nullable();
            $table->string('primary_goal', 40)->nullable();
            $table->json('support_needs')->nullable();
            $table->string('preferred_language', 16)->nullable();
            $table->timestamp('profile_completed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admin_accounts', function (Blueprint $table) {
            $table->string('avatar_path')->nullable();
            $table->string('sponsored_by', 160)->nullable();
            $table->string('invited_by', 160)->nullable();
            $table->string('hired_by', 160)->nullable();
            $table->date('hired_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('admin_accounts', function (Blueprint $table) {
            $table->dropColumn(['avatar_path', 'sponsored_by', 'invited_by', 'hired_by', 'hired_at']);
        });
    }
};

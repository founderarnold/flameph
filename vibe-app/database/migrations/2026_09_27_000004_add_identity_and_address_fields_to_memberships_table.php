<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->string('full_name', 160)->nullable();
            $table->text('complete_address')->nullable();
            $table->string('id_document_path')->nullable();
            $table->timestamp('id_uploaded_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'complete_address', 'id_document_path', 'id_uploaded_at']);
        });
    }
};

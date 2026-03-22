<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique()->after('username');
            $table->string('otp', 6)->nullable()->after('email');
            $table->timestamp('otp_expires_at')->nullable()->after('otp');
            $table->boolean('is_verified')->default(false)->after('otp_expires_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['email', 'otp', 'otp_expires_at', 'is_verified']);
        });
    }
};
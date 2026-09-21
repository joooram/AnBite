<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     * This creates the "patients" table in your MySQL database.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
 
            // ── AUTO ID ──────────────────────────────────────────
            $table->id();
 
            // ── PATIENT PERSONAL INFORMATION ─────────────────────
            // Pinalitan ang full_name ng first_name at last_name
            $table->string('first_name', 100);
            $table->string('last_name', 100);
 
            // The patient can only be Male or Female
            $table->enum('sex', ['Male', 'Female']);
 
            // Pinalitan ang 'age' ng 'birthdate' (type: date) para mas accurate
            $table->date('birthdate');
 
            // Optional fields (nullable)
            $table->string('contact_number', 20)->nullable();
            $table->string('email', 200)->nullable();
            
            // Address
            $table->string('address', 255);

            // Medical History (Optional text field)
            $table->text('medical_history')->nullable();

            // Tracking kung sinong staff/admin ang nag-register
            $table->unsignedBigInteger('created_by_user_id')->nullable();
 
            // ── TIMESTAMPS ────────────────────────────────────────
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
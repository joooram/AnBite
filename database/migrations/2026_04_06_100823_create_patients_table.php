<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     * This creates the "patients" table in your MySQL database.
     * Each $table-> line = one column in the table.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
 
            // ── AUTO ID ──────────────────────────────────────────
            // This creates an auto-incrementing primary key column called "id"
            // Every patient gets a unique ID automatically (1, 2, 3...)
            $table->id();
 
            // ── PATIENT PERSONAL INFORMATION ─────────────────────
 
            // string() = VARCHAR in MySQL — used for text fields
            // 200 = maximum number of characters allowed
            $table->string('full_name', 200);
 
            // enum() = only allows specific fixed values
            // The patient can only be Male or Female
            $table->enum('sex', ['Male', 'Female']);
 
            // integer() = whole numbers only (no decimals)
            // Age is always a whole number like 25, not 25.5
            $table->integer('age');
 
            // nullable() = this field is OPTIONAL — can be left empty
            // Some patients may not have a contact number
            $table->string('contact_number', 20)->nullable();
 
            // Email address — also optional since patient may not have one
            $table->string('email', 200)->nullable();
 
            // Address — where the patient lives
            $table->string('address', 255);
 
            // ── HISTORY OF EXPOSURE ───────────────────────────────
 
            // date() = stores a date value like 2026-04-06
            // The day the patient was bitten
            $table->date('date_of_exposure');
 
            // Where the bite happened (barangay name)
            $table->string('place_of_exposure', 255);
 
            // Type of wound/contact with animal
            // Scratch = minor contact, Bite = actual bite, Non-Bite/Non-Scratch = indirect contact
            $table->enum('type_of_exposure', ['Scratch', 'Bite', 'Non-Bite/Non-Scratch']);
 
            // What animal caused the incident and its breed status
            // These are the 4 possible combinations
            $table->enum('source_of_exposure', [
                'Dog - With Breed',
                'Dog - Without Breed',
                'Cat - With Breed',
                'Cat - Without Breed',
            ]);
 
            // ── ADDITIONAL TRACKING FIELDS ────────────────────────
 
            // Category of bite based on WHO classification (1, 2, or 3)
            $table->enum('bite_category', ['1', '2', '3'])->nullable();
 
            // Which clinic the patient is referred to for vaccination
            $table->enum('referred_clinic', [
                'Batangas City Health Office - Animal Bite Treatment Center',
                'MedCity'
            ])->nullable();
 
            // Vaccination dose days tracking (e.g. "0,3,7" means days 0, 3, 7 done)
            $table->string('vaccine_days', 100)->nullable();
 
            // ── TIMESTAMPS ────────────────────────────────────────
            // This creates TWO columns automatically:
            // created_at = when the patient record was added
            // updated_at = when the patient record was last edited
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     * This DELETES the patients table — used when you run php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
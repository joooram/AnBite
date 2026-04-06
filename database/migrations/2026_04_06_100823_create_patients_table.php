<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->date('date_today');
            $table->string('full_name', 200);
            $table->string('address', 255);
            $table->integer('age');
            $table->enum('sex', ['Male', 'Female']);
            $table->date('birthdate');
            $table->string('place_of_incident', 255);
            $table->enum('animal_breed', ['Breed', 'Non-Breed']);
            $table->string('body_part_bitten', 100);
            $table->enum('bite_category', ['Category 1', 'Category 2', 'Category 3']);
            $table->string('vaccine_days', 100);
            $table->enum('incident_type', ['Scratch', 'Bite', 'Non-Bite']);
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

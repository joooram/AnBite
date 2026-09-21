<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiteIncidentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('bite_incidents', function (Blueprint $table) {
            $table->id();
            // Connects to patients table
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            
            // Incident details
            $table->date('date_of_exposure');
            $table->string('place_of_exposure');
            $table->string('type_of_exposure'); // Bite, Scratch, Non-bite
            $table->string('source_of_exposure'); // Dog, Cat, etc.
            $table->string('other_animal_details')->nullable();
            $table->text('wound_site')->nullable();
            $table->string('bite_category'); // Category 1, 2, 3
            $table->string('referred_clinic')->nullable();
            
            // Audit trail (sino ang nag-encode)
            $table->foreignId('encoded_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bite_incidents');
    }
}
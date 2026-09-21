<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineSchedulesTable extends Migration
{
    public function up(): void
    {
        Schema::create('vaccine_schedules', function (Blueprint $table) {
            $table->id();
            // Connects to bite_incidents table
            $table->foreignId('incident_id')->constrained('bite_incidents')->onDelete('cascade');
            
            // Dose Tracking
            $table->string('dose_stage'); // Day 0, Day 3, Day 7, Day 14, Day 28
            $table->date('scheduled_date'); // Exact calculated date
            $table->date('administered_date')->nullable(); // Date actually injected
            $table->enum('status', ['Pending', 'Completed', 'Missed'])->default('Pending');
            
            // Audit trail (sino ang nag-inject)
            $table->foreignId('administered_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vaccine_schedules');
    }
}
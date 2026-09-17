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
    Schema::table('patients', function (Blueprint $table) {
        // INSERT YOUR LINE HERE (Around line 15)
        $table->string('other_animal_details')->nullable()->after('source_of_exposure');
    });
}

public function down(): void
{
    Schema::table('patients', function (Blueprint $table) {
        // ADD THIS TO REMOVE THE COLUMN IF YOU ROLLBACK
        $table->dropColumn('other_animal_details');
    });
}
};
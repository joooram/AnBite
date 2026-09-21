<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiteIncident extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date_of_exposure',
        'place_of_exposure',
        'type_of_exposure',
        'source_of_exposure',
        'other_animal_details',
        'wound_site',
        'bite_category',
        'referred_clinic',
        'encoded_by_user_id',
    ];

    // Nakakonekta sa Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // May maraming vaccine schedules
    public function vaccineSchedules()
    {
        return $this->hasMany(VaccineSchedule::class, 'incident_id');
    }

    // Audit trail kung sino ang nag-encode
    public function encodedBy()
    {
        return $this->belongsTo(User::class, 'encoded_by_user_id');
    }
}
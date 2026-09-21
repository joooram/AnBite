<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_id',
        'dose_stage',
        'scheduled_date',
        'administered_date',
        'status',
        'administered_by_user_id',
    ];

    // Nakakonekta sa Bite Incident
    public function biteIncident()
    {
        return $this->belongsTo(BiteIncident::class, 'incident_id');
    }

    // Audit trail kung sinong staff ang nag-turok ng bakuna
    public function administeredBy()
    {
        return $this->belongsTo(User::class, 'administered_by_user_id');
    }
}
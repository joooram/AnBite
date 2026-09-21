<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * Personal information lang ng pasyente ang ilalagay sa $fillable.
     * Ang mga detalye ng kagat (exposure) at bakuna ay inilipat na sa hiwalay na tables.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'birthdate',
        'contact_number',
        'email',
        'address',
        'medical_history',
        'created_by_user_id',
    ];

    /**
     * RELASYON: Ang isang pasyente ay pwedeng magkaroon ng maraming bite incidents (1 to Many).
     */
    public function biteIncidents()
    {
        return $this->hasMany(BiteIncident::class);
    }

    /**
     * RELASYON: Ang pasyente ay na-encode ng isang User (CHO Staff/Admin).
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
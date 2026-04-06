<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
    'date_today',
    'full_name',
    'address',
    'age',
    'birthdate',
    'place_of_incident',
    'animal_breed',
    'body_part_bitten',
    'bite_category',
    'vaccine_days',
    'incident_type',
    ];
}

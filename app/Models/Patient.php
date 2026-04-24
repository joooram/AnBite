<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
/**
 * WHAT IS A MODEL?
 * A Model is a PHP class that represents ONE ROW in your database table.
 * When you save a patient, Laravel creates a Patient object and stores it.
 * When you read a patient, Laravel gives you a Patient object back.
 * Think of it as the "middleman" between your PHP code and MySQL.
 */
class Patient extends Model
{
    /**
     * WHAT IS $fillable?
     * $fillable is a security feature in Laravel called "Mass Assignment Protection".
     * It tells Laravel: "ONLY allow these specific columns to be saved."
     * This prevents hackers from injecting extra fields into your form submission.
     *
     * Every column you want to save from a form MUST be listed here.
     * If a column is NOT in $fillable, Laravel will ignore it when saving.
     */
    protected $fillable = [
        // Patient Personal Information
        'full_name',
        'sex',
        'age',
        'contact_number',
        'email',
        'address',
 
        // History of Exposure
        'date_of_exposure',
        'place_of_exposure',
        'type_of_exposure',
        'source_of_exposure',
 
        // Additional tracking
        'bite_category',
        'referred_clinic',
        'vaccine_days',
    ];
}
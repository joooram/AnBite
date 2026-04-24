<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

/**
 * WHAT IS A CONTROLLER?
 * A Controller is the "brain" of your feature.
 * It receives requests from the browser, talks to the database (via the Model),
 * and then returns a response (usually a Blade page with data).
 *
 * Think of it like a waiter in a restaurant:
 * - Browser (customer) asks for something
 * - Controller (waiter) goes to the kitchen (database)
 * - Controller brings back the food (data) to the customer (browser)
 */
class PatientController extends Controller
{
    /**
     * INDEX — Show the list of all patients
     *
     * URL: GET /patients
     * This function is called when the staff clicks "Patient Registration" in the sidebar.
     * It fetches ALL patients from the database and sends them to the index.blade.php page.
     */
    public function index()
    {
        // Patient::latest() = get all patients, newest first
        // ->get() = actually run the query and get the results
        $patients = Patient::latest()->get();

        // Return the view and pass the $patients data to it
        // 'patients.index' means: resources/views/patients/index.blade.php
        // compact('patients') = send the $patients variable to the blade file
        return view('patients.index', compact('patients'));
    }

    /**
     * CREATE — Show the blank patient registration form
     *
     * URL: GET /patients/create
     * This just shows the empty form — no database interaction yet.
     * The staff fills this form and clicks Save to submit it.
     */
    public function create()
    {
        // Just show the form page — no data needed
        return view('patients.create');
    }

    /**
     * STORE — Save the new patient to the database
     *
     * URL: POST /patients
     * This is called when the staff clicks the "Save" button on the form.
     * It validates the input, then saves the patient to MySQL.
     */
    public function store(Request $request)
    {
        // VALIDATE — check that all required fields are filled correctly
        // 'required' = must not be empty
        // 'string' = must be text
        // 'integer' = must be a whole number
        // 'email' = must be a valid email format
        // 'date' = must be a valid date
        // 'in:' = must be one of these specific values
        // 'nullable' = optional, can be empty
        $request->validate([
            // Patient Personal Information
            'full_name'          => 'required|string|max:200',
            'sex'                => 'required|in:Male,Female',
            'age'                => 'required|integer|min:1|max:150',
            'contact_number'     => 'nullable|string|max:20',
            'email'              => 'nullable|email|max:200',
            'address'            => 'required|string|max:255',

            // History of Exposure
            'date_of_exposure'   => 'required|date',
            'place_of_exposure'  => 'required|string|max:255',
            'type_of_exposure'   => 'required|in:Scratch,Bite,Non-Bite/Non-Scratch',
            'source_of_exposure' => 'required|in:Dog - With Breed,Dog - Without Breed,Cat - With Breed,Cat - Without Breed',

            // Optional fields
            'bite_category'      => 'nullable|in:1,2,3',
            'referred_clinic'    => 'nullable|string',
            'vaccine_days'       => 'nullable|string',
        ]);

        // CREATE — save the patient to the database
        // Patient::create() inserts a new row into the patients table
        // $request->only() picks only the listed fields from the form submission
        Patient::create($request->only([
            'full_name',
            'sex',
            'age',
            'contact_number',
            'email',
            'address',
            'date_of_exposure',
            'place_of_exposure',
            'type_of_exposure',
            'source_of_exposure',
            'bite_category',
            'referred_clinic',
            'vaccine_days',
        ]));

        // After saving, redirect to the patients list page
        // with() sends a success message that shows on the next page
        return redirect()->route('patients.index')
               ->with('success', 'Patient registered successfully!');
    }

    /**
     * SHOW — View one patient's full details
     *
     * URL: GET /patients/{id}
     * This shows a single patient's complete record.
     * The {id} in the URL tells Laravel which patient to look up.
     */
    public function show($id)
    {
        // Find the patient by ID — if not found, show a 404 error
        $patient = Patient::findOrFail($id);

        // Send the patient data to the show page
        return view('patients.show', compact('patient'));
    }
}
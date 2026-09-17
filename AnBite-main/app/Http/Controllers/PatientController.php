<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $query = Patient::query();

        if ($filter == 'vaccinated') {
            $query->where('bite_category', 'Vaccinated'); 
        } elseif ($filter == 'unvaccinated') {
            $query->where('bite_category', '!=', 'Vaccinated');
        }

        $patients = $query->latest()->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'            => 'required|string|max:200',
            'sex'                  => 'required|in:Male,Female',
            'age'                  => 'required|integer|min:1|max:150',
            'contact_number'       => 'nullable|string|max:20',
            'email'                => 'nullable|email|max:200',
            'address'              => 'required|string|max:255',
            'medical_history'      => 'nullable|string',
            'date_of_exposure'     => 'required|date',
            'place_of_exposure'    => 'required|string|max:255',
            'type_of_exposure'     => 'required|in:Scratch,Bite,Scratch and Bite,Non-Bite/Non-Scratch',
            'source_of_exposure'   => 'required|in:Dog - With Breed,Dog - Without Breed,Cat - With Breed,Cat - Without Breed,other animal',
            'other_animal_details' => 'required_if:source_of_exposure,other animal|nullable|string|max:100',
            'wound_site'           => 'nullable|string',
            'bite_category'        => 'nullable|in:1,2,3',
            'referred_clinic'      => 'nullable|string',
            'vaccine_days'         => 'nullable|string',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Patient registered successfully!');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $name    = $patient->full_name;
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', "Patient record of {$name} has been successfully deleted.");
    }

    public function sendReminder(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'method'     => 'required|in:sms,email,both',
            'message'    => 'required|string',
        ]);

        $patient = Patient::findOrFail($request->patient_id);

        // Dito papasok ang SMS/Email API logic sa hinaharap
        
        return redirect()->back()->with(
            'success',
            'Vaccine reminder sent successfully to ' . $patient->full_name . ' via ' . strtoupper($request->method) . '.'
        );
    }
}
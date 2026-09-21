<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\BiteIncident;
use App\Models\VaccineSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $query = Patient::with(['biteIncidents.vaccineSchedules']);

        if ($filter == 'vaccinated') {
            $query->whereHas('biteIncidents.vaccineSchedules', function ($q) {
                $q->where('status', 'Completed');
            });
        } elseif ($filter == 'unvaccinated') {
            $query->whereDoesntHave('biteIncidents.vaccineSchedules', function ($q) {
                $q->where('status', 'Completed');
            });
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
$request->validate([
    'first_name'     => 'required|string|max:100',
    'last_name'      => 'required|string|max:100',
    'sex'            => 'required|in:Male,Female',
    'birthdate'      => 'required|date',
    'contact_number' => 'nullable|string|max:20',
    'email'          => 'nullable|email|max:200',
    'address'        => 'required|string|max:255',
    'medical_history'=> 'nullable|string',
]);

        DB::transaction(function () use ($request) {
            $patient = Patient::create([
                'first_name'         => $request->first_name,
                'last_name'          => $request->last_name,
                'sex'                => $request->sex,
                'birthdate'          => $request->birthdate,
                'contact_number'     => $request->contact_number,
                'email'              => $request->email,
                'address'            => $request->address,
                'medical_history'    => $request->medical_history,
                'created_by_user_id' => Auth::id(),
            ]);

            $incident = BiteIncident::create([
                'patient_id'           => $patient->id,
                'date_of_exposure'     => $request->date_of_exposure,
                'place_of_exposure'    => $request->place_of_exposure,
                'type_of_exposure'     => $request->type_of_exposure,
                'source_of_exposure'   => $request->source_of_exposure,
                'other_animal_details' => $request->other_animal_details,
                'wound_site'           => $request->wound_site,
                'bite_category'        => $request->bite_category,
                'referred_clinic'      => $request->referred_clinic,
                'encoded_by_user_id'   => Auth::id(),
            ]);

            $exposureDate = Carbon::parse($request->date_of_exposure);
            $doses = [
                ['stage' => 'Day 0',  'days' => 0],
                ['stage' => 'Day 3',  'days' => 3],
                ['stage' => 'Day 7',  'days' => 7],
                ['stage' => 'Day 14', 'days' => 14],
                ['stage' => 'Day 28', 'days' => 28],
            ];

            foreach ($doses as $dose) {
                VaccineSchedule::create([
                    'incident_id'    => $incident->id,
                    'dose_stage'     => $dose['stage'],
                    'scheduled_date' => $exposureDate->copy()->addDays($dose['days']),
                    'status'         => 'Pending',
                ]);
            }
        });

        return redirect()->route('patients.index')
            ->with('success', 'Patient registered and vaccine schedules created successfully!');
    }

    public function show(string $id)
    {
        $patient = Patient::with(['biteIncidents.vaccineSchedules'])->findOrFail($id);
        return view('patients.show', compact('patient'));
    }

public function destroy($id)
{
    // 1. Hanapin ang pasyente
    $patient = Patient::findOrFail($id);

    // 2. Burahin muna ang mga kaugnay na bite incidents (kung mayroon)
    if ($patient->biteIncidents) {
        $patient->biteIncidents()->delete();
    }

    // 3. Burahin ang mismong pasyente
    $patient->delete();

    // 4. Mag-redirect pabalik na may success message
    return redirect()->route('patients.index')->with('success', 'Patient record deleted successfully.');
}

public function sendReminder(Request $request)
{
    $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'method'     => 'required|in:sms,email,both',
        'message'    => 'required|string',
    ]);

    // Dito ilalagay ang logic para sa SMS (SMS Gateway API) o Email notification

    return redirect()->back()->with('success', 'Vaccine reminder sent successfully!');
}
}
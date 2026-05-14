<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Patient Records</title>

    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#f3f4f6;
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:220px;
            background:#1a3a1a;
            min-height:100vh;
            position:fixed;
            top:0;
            left:0;
        }

        .main{
            margin-left:220px;
            flex:1;
            padding:2rem;
        }

        .page-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:1.5rem;
        }

        .page-title{
            font-size:1.3rem;
            font-weight:700;
            color:#1a3a1a;
        }

        .page-sub{
            font-size:0.82rem;
            color:#888;
            margin-top:2px;
        }

        .btn-add{
            padding:10px 20px;
            background:#1a3a1a;
            color:white;
            border-radius:99px;
            text-decoration:none;
            font-size:0.88rem;
            font-weight:600;
        }

        .btn-add:hover{
            background:#2d6a2d;
            color:white;
        }

        .tabs{
            display:flex;
            gap:8px;
            margin-bottom:1.5rem;
        }

        .tab{
            padding:8px 20px;
            border-radius:99px;
            font-size:0.85rem;
            font-weight:500;
            cursor:pointer;
            border:1.5px solid #ddd;
            background:white;
            color:#888;
            text-decoration:none;
        }

        .tab.active{
            background:#1a3a1a;
            color:white;
            border-color:#1a3a1a;
        }

        .panel{
            background:white;
            border-radius:12px;
            border:0.5px solid #e8e8e8;
            padding:1.2rem 1.4rem;
        }

        table{
            width:100%;
            border-collapse:collapse;
            font-size:0.82rem;
        }

        thead th{
            text-align:left;
            padding:10px 12px;
            background:#f8f8f8;
            color:#555;
            font-weight:600;
            border-bottom:1px solid #eee;
        }

        tbody td{
            padding:12px 12px;
            color:#444;
            border-bottom:0.5px solid #f5f5f5;
            vertical-align:middle;
        }

        .badge{
            display:inline-block;
            font-size:0.7rem;
            padding:2px 8px;
            border-radius:99px;
            font-weight:600;
        }

        .badge-dog{
            background:#E6F1FB;
            color:#185FA5;
        }

        .badge-cat{
            background:#FAEEDA;
            color:#854F0B;
        }

        .badge-scratch{
            background:#EEEDFE;
            color:#3C3489;
        }

        .badge-bite{
            background:#FCEBEB;
            color:#A32D2D;
        }

        .badge-nonbite{
            background:#E1F5EE;
            color:#0F6E56;
        }
        .badge-scratch-bite {
        background-color: #6f42c1; /* Purple color para maiba sa Bite at Scratch */
        color: white;
}

        .btn-view,
        .btn-vaccine-reminder,
        .btn-delete,
        .btn-print_patient_record{
            padding:6px 12px;
            border-radius:6px;
            text-decoration:none;
            color:white;
            font-size:0.8rem;
            font-weight:500;
            border:none;
            cursor:pointer;
            display:inline-block;
        }

        .btn-view{
            background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        }

        .btn-vaccine-reminder{
           background: linear-gradient(135deg, #1a3a1a, #74ce74ff);
        }

        .btn-delete{
            background:#a63d3d;
        }

        .btn-print_patient_record{
            background:#065428;
        }

        .btn-view:hover,
        .btn-vaccine-reminder:hover,
        .btn-delete:hover,
        .btn-print_patient_record:hover{
            opacity:0.85;
            color:white;
        }

        /* MODAL */

        .modal-content{
            border:none;
            border-radius:18px;
            overflow:hidden;
        }

        .modal-header{
            background:#1a3a1a;
            color:white;
            padding:1rem 1.5rem;
        }

        .modal-title{
            font-weight:600;
        }

        .close-btn{
            background:none;
            border:none;
            color:white;
            font-size:1.8rem;
            cursor:pointer;
        }

        .modal-body{
            padding:1.5rem;
            background:#f9fafb;
        }

        .patient-details{
            display:flex;
            flex-direction:column;
            gap:15px;
        }

        .detail-row{
            background:white;
            padding:14px 16px;
            border-radius:10px;
            border:1px solid #ececec;
        }

        .detail-label{
            font-size:0.75rem;
            font-weight:700;
            color:#888;
            margin-bottom:5px;
            text-transform:uppercase;
        }

        .detail-value{
            font-size:0.95rem;
            font-weight:600;
            color:#222;
        }
    </style>
</head>
<body>

@include('layouts.sidebar')

<main class="main">

    <div class="page-header">
        <div>
            <div class="page-title">Patient Records</div>
            <div class="page-sub">All registered bite incident patients</div>
        </div>

        <a href="{{ route('patients.create') }}" class="btn-add">
            + Add Patient
        </a>
    </div>

    {{-- SUCCESS / ERROR ALERTS --}}
    @if (session('success'))
        <div style="display:flex;align-items:center;gap:10px;background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;font-size:0.82rem;border-radius:12px;padding:12px 16px;margin-bottom:1.2rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="display:flex;align-items:center;gap:10px;background:#fef2f2;border:1px solid #fecaca;color:#dc2626;font-size:0.82rem;border-radius:12px;padding:12px 16px;margin-bottom:1.2rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="tabs">
        <a href="{{ route('patients.index') }}"
           class="tab {{ !request('filter') ? 'active' : '' }}">
            All Patients
        </a>

        <a href="{{ route('patients.index', ['filter' => 'vaccinated']) }}"
           class="tab {{ request('filter') == 'vaccinated' ? 'active' : '' }}">
            Vaccinated
        </a>

        <a href="{{ route('patients.index', ['filter' => 'unvaccinated']) }}"
           class="tab {{ request('filter') == 'unvaccinated' ? 'active' : '' }}">
            Unvaccinated
        </a>
    </div>

    <div class="panel">

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Age / Sex</th>
                    <th>Address</th>
                    <th>Date of Exposure</th>
                    <th>Type</th>
                    <th>Source</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($patients as $patient)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $patient->full_name }}</strong><br>

                        <span style="font-size:0.72rem;color:#aaa;">
                            {{ $patient->contact_number ?? 'No contact' }}
                        </span>
                    </td>

                    <td>{{ $patient->age }} / {{ $patient->sex }}</td>

                    <td>{{ $patient->address }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($patient->date_of_exposure)->format('M d, Y') }}
                    </td>

                    <td>
                        @if($patient->type_of_exposure == 'Bite')
                            <span class="badge badge-bite">Bite</span>

                        @elseif($patient->type_of_exposure == 'Scratch')
                            <span class="badge badge-scratch">Scratch</span>

                        @elseif($patient->type_of_exposure == 'Scratch and Bite')
                            <span class="badge badge-bite">Scratch and Bite</span>

                        @else
                            <span class="badge badge-nonbite">Non-Bite and Non-Scratch</span>
                        @endif
                    </td>

                    <td>
                        @if(str_contains($patient->source_of_exposure, 'Dog'))
                            <span class="badge badge-dog">
                                {{ $patient->source_of_exposure }}
                            </span>
                        @else
                            <span class="badge badge-cat">
                                {{ $patient->source_of_exposure }}
                            </span>
                        @endif
                    </td>

                    <td style="display:flex;gap:5px;flex-wrap:wrap;">

                        <button
                            type="button"
                            class="btn-view"
                            data-bs-toggle="modal"
                            data-bs-target="#viewPatientModal"
                            data-full-name="{{ $patient->full_name }}"
                            data-age="{{ $patient->age }}"
                            data-sex="{{ $patient->sex }}"
                            data-address="{{ $patient->address }}"
                            data-contact="{{ $patient->contact_number ?? 'N/A' }}"
                            data-date="{{ \Carbon\Carbon::parse($patient->date_of_exposure)->format('M d, Y') }}"
                            data-place="{{ $patient->place_of_exposure ?? 'N/A' }}"
                            data-type="{{ $patient->type_of_exposure }}"
                            data-source="{{ $patient->source_of_exposure }}"
                            data-wound="{{ $patient->wound_site ?? 'N/A' }}"
                            data-category="{{ $patient->bite_category ? 'Category ' . $patient->bite_category : 'N/A' }}"
                            data-clinic="{{ $patient->referred_clinic ?? 'N/A' }}"
                            data-vaccine="{{ $patient->vaccine_days ?? 'N/A' }}"
                            data-medical="{{ $patient->medical_history ?? 'N/A' }}"
                        >
                            View
                        </button>

                        <button
                            type="button"
                            class="btn btn-success btn-sm reminder-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#vaccineReminderModal"
                            data-patient-id="{{ $patient->id }}"
                            data-full-name="{{ $patient->full_name }}"
                            data-contact-number="{{ $patient->contact_number ?? 'N/A' }}"
                            data-email="{{ $patient->email ?? 'N/A' }}"
                            data-clinic="{{ $patient->referred_clinic ?? 'N/A' }}"
                        >
                            Vaccine Reminder
                        </button>

                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Delete patient record of {{ addslashes($patient->full_name) }}? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="8">
                        <div style="height:100px;"></div>
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</main>

@include('patients.view-modal') 
@include('patients.reminder-modal')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ── VIEW MODAL: populate fields on button click ──────────────
        document.querySelectorAll('.btn-view').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('detail-full-name').textContent        = this.dataset.fullName   || '—';
                document.getElementById('detail-age-sex').textContent          = (this.dataset.age || '—') + ' / ' + (this.dataset.sex || '—');
                document.getElementById('detail-contact-number').textContent   = this.dataset.contact    || '—';
                document.getElementById('detail-address').textContent          = this.dataset.address    || '—';
                document.getElementById('detail-date-of-exposure').textContent = this.dataset.date       || '—';
                document.getElementById('detail-place-of-exposure').textContent= this.dataset.place      || '—';
                document.getElementById('detail-type-of-exposure').textContent = this.dataset.type       || '—';
                document.getElementById('detail-source-of-exposure').textContent= this.dataset.source   || '—';
                document.getElementById('detail-wound-site').textContent       = this.dataset.wound      || '—';
                document.getElementById('detail-bite-category').textContent    = this.dataset.category   || '—';
                document.getElementById('detail-referred-clinic').textContent  = this.dataset.clinic     || '—';
                document.getElementById('detail-vaccine-days').textContent     = this.dataset.vaccine    || '—';
                document.getElementById('detail-medical-history').textContent  = this.dataset.medical    || '—';
            });
        });

        // ── VACCINE REMINDER MODAL: populate fields ──────────────────
        document.querySelectorAll('.reminder-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('reminder-patient-id').value           = this.dataset.patientId  || '';
                document.getElementById('reminder-full-name').textContent      = this.dataset.fullName   || '—';
                document.getElementById('reminder-contact-number').textContent = this.dataset.contactNumber || '—';
                document.getElementById('reminder-email').textContent          = this.dataset.email      || '—';
                document.getElementById('reminder-clinic').textContent         = this.dataset.clinic     || '—';

                // Auto-fill message
                var name   = this.dataset.fullName   || 'Patient';
                var clinic = this.dataset.clinic     || 'the clinic';
                document.getElementById('reminder-message').value =
                    'Dear ' + name + ',\n\n' +
                    'This is a friendly reminder from AnBite — Batangas City Health Office.\n\n' +
                    'Please visit ' + clinic + ' for your scheduled vaccine dose.\n\n' +
                    'For inquiries, please contact us at the City Health Office.\n\n' +
                    'Thank you and stay safe!';
            });
        });

        // ── Radio button visual highlight ────────────────────────────
        document.querySelectorAll('input[name="method"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="method"]').forEach(function(r) {
                    var lbl = r.closest('label');
                    if (lbl) {
                        lbl.style.borderColor = r.checked ? '#2d6a2d' : '#e5e7eb';
                        lbl.style.background  = r.checked ? '#f0fdf4' : 'white';
                        lbl.style.fontWeight  = r.checked ? '600' : '500';
                        lbl.style.color       = r.checked ? '#1a3a1a' : '#374151';
                    }
                });
            });
        });

    });
</script>

</body>
</html>
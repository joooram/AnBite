<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Patient Registration</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 220px;
            background: #1a3a1a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            position: fixed;
            top: 0; left: 0;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo-circle {
            width: 36px; height: 36px;
            background: white;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }

        .logo-circle svg { width: 18px; height: 18px; }

        .logo-text { font-size: 1.2rem; font-weight: 800; color: white; }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: 8px;
            color: rgba(255,255,255,0.7);
            text-decoration: none; font-size: 0.88rem;
            margin-bottom: 4px; transition: all 0.2s;
        }

        .nav-item:hover { background: rgba(255,255,255,0.1); color: white; }
        .nav-item.active { background: rgba(255,255,255,0.15); color: white; font-weight: 600; }
        .nav-item svg { width: 16px; height: 16px; flex-shrink: 0; }

        .sidebar-footer { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; }
        .nav-item.logout { color: #ff9999; }
        .nav-item.logout:hover { background: rgba(255,100,100,0.1); }

        /* ── MAIN ── */
        .main {
            margin-left: 220px;
            flex: 1;
            padding: 2rem;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .page-title { font-size: 1.3rem; font-weight: 700; color: #1a3a1a; }
        .page-sub { font-size: 0.82rem; color: #888; margin-top: 2px; }

        /* TABS */
        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        .tab {
            padding: 8px 20px;
            border-radius: 99px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border: 1.5px solid #ddd;
            background: white;
            color: #888;
            text-decoration: none;
        }

        .tab.active {
            background: #1a3a1a;
            color: white;
            border-color: #1a3a1a;
        }

        /* FORM SECTIONS */
        .form-section {
            background: white;
            border-radius: 12px;
            border: 0.5px solid #e8e8e8;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 0.88rem;
            font-weight: 700;
            color: #1a3a1a;
            margin-bottom: 1rem;
            padding-bottom: 8px;
            border-bottom: 2px solid #f0f0f0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .form-group { display: flex; flex-direction: column; }
        .form-group.full { grid-column: 1 / -1; }

        label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #2d6a2d;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .required-star { color: #dc2626; }

        input, select {
            padding: 10px 14px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 0.88rem;
            background: #fafafa;
            font-family: 'Segoe UI', sans-serif;
            outline: none;
            transition: border-color 0.2s;
            width: 100%;
            appearance: none;
            -webkit-appearance: none;
        }

        input:focus, select:focus {
            border-color: #2d6a2d;
            background: #fff;
        }

        .select-wrap { position: relative; }
        .select-wrap::after {
            content: '▾';
            position: absolute;
            right: 14px; top: 10px;
            color: #2d6a2d;
            font-size: 0.8rem;
            pointer-events: none;
        }

        /* ERROR & SUCCESS */
        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-size: 0.78rem;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
        }

        .success-box {
            background: #E1F5EE;
            border: 1px solid #5DCAA5;
            color: #0F6E56;
            font-size: 0.78rem;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
        }

        /* BUTTONS */
        .btn-row {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 1rem;
        }

        .btn-save {
            padding: 10px 32px;
            background: #1a3a1a;
            color: white;
            border: none;
            border-radius: 99px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
        }

        .btn-save:hover { background: #2d6a2d; }

        .btn-cancel {
            padding: 10px 24px;
            background: white;
            color: #888;
            border: 1.5px solid #ddd;
            border-radius: 99px;
            font-size: 0.9rem;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
            text-decoration: none;
        }

        .btn-cancel:hover { background: #f5f5f5; }
    </style>
</head>
<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-circle">
                <svg viewBox="0 0 42 42" fill="none">
                    <circle cx="21" cy="21" r="20" stroke="#1a3a1a" stroke-width="1.5"/>
                    <rect x="19" y="10" width="4" height="22" rx="2" fill="#1a3a1a"/>
                    <rect x="10" y="19" width="22" height="4" rx="2" fill="#1a3a1a"/>
                </svg>
            </div>
            <span class="logo-text">AnBite</span>
        </div>

        <nav>
            <a href="{{ route('dashboard') }}" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
            <a href="{{ route('patients.index') }}" class="nav-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                Patient Registration
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                Hotspot Heatmap
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Barangay Records
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="nav-item logout">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="main">

        <div class="page-header">
            <div>
                <div class="page-title">Patient Registration</div>
                <div class="page-sub">Add a new bite incident patient</div>
            </div>
        </div>

        {{-- TABS --}}
        <div class="tabs">
            <a href="{{ route('patients.create') }}" class="tab active">Add Patient</a>
            <a href="{{ route('patients.index') }}?filter=vaccinated" class="tab">Vaccinated</a>
            <a href="{{ route('patients.index') }}?filter=unvaccinated" class="tab">Unvaccinated</a>
        </div>

        {{-- ERROR MESSAGES --}}
        @if ($errors->any())
            <div class="error-box">
                <strong>Please fix the following:</strong><br>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="success-box">{{ session('success') }}</div>
        @endif

        {{-- FORM --}}
        <form method="POST" action="{{ route('patients.store') }}">
            @csrf

            {{-- ── SECTION 1: PATIENT PERSONAL INFORMATION ── --}}
            <div class="form-section">
                <div class="section-title">Patient's Personal Information</div>
                <div class="form-grid">

                    {{-- Full Name (spans full width) --}}
                    <div class="form-group full">
                        <label>Full Name <span class="required-star">*</span></label>
                        <input
                            type="text"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="e.g. Juan Dela Cruz"
                            required
                        >
                    </div>

                    {{-- Sex --}}
                    <div class="form-group">
                        <label>Sex <span class="required-star">*</span></label>
                        <div class="select-wrap">
                            <select name="sex" required>
                                <option value="" disabled selected>Select sex</option>
                                <option value="Male"   {{ old('sex') == 'Male'   ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>

                    {{-- Age --}}
                    <div class="form-group">
                        <label>Age <span class="required-star">*</span></label>
                        <input
                            type="number"
                            name="age"
                            value="{{ old('age') }}"
                            placeholder="e.g. 25"
                            min="1" max="150"
                            required
                        >
                    </div>

                    {{-- Contact Number --}}
                    <div class="form-group">
                        <label>Contact Number <span style="color:#aaa;font-weight:400;">(Guardian/Relative)</span></label>
                        <input
                            type="text"
                            name="contact_number"
                            value="{{ old('contact_number') }}"
                            placeholder="e.g. 09171234567"
                        >
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email Address <span style="color:#aaa;font-weight:400;">(optional)</span></label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="e.g. juan@gmail.com"
                        >
                    </div>

                    {{-- Address (spans full width) --}}
                    <div class="form-group full">
                        <label>Address <span class="required-star">*</span></label>
                        <input
                            type="text"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="e.g. Brgy. Libjo, Batangas City"
                            required
                        >
                    </div>

                </div>
            </div>

            {{-- ── SECTION 2: HISTORY OF EXPOSURE ── --}}
            <div class="form-section">
                <div class="section-title">History of Exposure</div>
                <div class="form-grid">

                    {{-- Date of Exposure --}}
                    <div class="form-group">
                        <label>Date of Exposure <span class="required-star">*</span></label>
                        <input
                            type="date"
                            name="date_of_exposure"
                            value="{{ old('date_of_exposure') }}"
                            required
                        >
                    </div>

                    {{-- Place of Exposure --}}
                    <div class="form-group">
                        <label>Place of Exposure <span class="required-star">*</span></label>
                        <input
                            type="text"
                            name="place_of_exposure"
                            value="{{ old('place_of_exposure') }}"
                            placeholder="e.g. Brgy. Libjo"
                            required
                        >
                    </div>

                    {{-- Type of Exposure --}}
                    <div class="form-group">
                        <label>Type of Exposure <span class="required-star">*</span></label>
                        <div class="select-wrap">
                            <select name="type_of_exposure" required>
                                <option value="" disabled selected>Select type</option>
                                <option value="Scratch"             {{ old('type_of_exposure') == 'Scratch'             ? 'selected' : '' }}>Scratch</option>
                                <option value="Bite"                {{ old('type_of_exposure') == 'Bite'                ? 'selected' : '' }}>Bite</option>
                                <option value="Non-Bite/Non-Scratch"{{ old('type_of_exposure') == 'Non-Bite/Non-Scratch' ? 'selected' : '' }}>Non-Bite / Non-Scratch</option>
                            </select>
                        </div>
                    </div>

                    {{-- Source of Exposure --}}
                    <div class="form-group full">
                        <label>Source of Exposure <span class="required-star">*</span></label>
                        <div class="select-wrap">
                            <select name="source_of_exposure" required>
                                <option value="" disabled selected>Select animal and breed type</option>
                                <option value="Dog - With Breed"    {{ old('source_of_exposure') == 'Dog - With Breed'    ? 'selected' : '' }}>Dog — With Breed</option>
                                <option value="Dog - Without Breed" {{ old('source_of_exposure') == 'Dog - Without Breed' ? 'selected' : '' }}>Dog — Without Breed</option>
                                <option value="Cat - With Breed"    {{ old('source_of_exposure') == 'Cat - With Breed'    ? 'selected' : '' }}>Cat — With Breed</option>
                                <option value="Cat - Without Breed" {{ old('source_of_exposure') == 'Cat - Without Breed' ? 'selected' : '' }}>Cat — Without Breed</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ── SECTION 3: MONITORING INFORMATION ── --}}
            <div class="form-section">
                <div class="section-title">Monitoring Information</div>
                <div class="form-grid">

                    {{-- Category of Bite --}}
                    <div class="form-group">
                        <label>Category Level of Bite</label>
                        <div class="select-wrap">
                            <select name="bite_category">
                                <option value="" disabled selected>Select category</option>
                                <option value="1" {{ old('bite_category') == '1' ? 'selected' : '' }}>Category 1</option>
                                <option value="2" {{ old('bite_category') == '2' ? 'selected' : '' }}>Category 2</option>
                                <option value="3" {{ old('bite_category') == '3' ? 'selected' : '' }}>Category 3</option>
                            </select>
                        </div>
                    </div>

                    {{-- Referred Clinic --}}
                    <div class="form-group">
                        <label>Referred Clinic</label>
                        <div class="select-wrap">
                            <select name="referred_clinic">
                                <option value="" disabled selected>Select clinic</option>
                                <option value="Batangas City Health Office - Animal Bite Treatment Center"
                                    {{ old('referred_clinic') == 'Batangas City Health Office - Animal Bite Treatment Center' ? 'selected' : '' }}>
                                    BCHO - Animal Bite Treatment Center
                                </option>
                                <option value="MedCity"
                                    {{ old('referred_clinic') == 'MedCity' ? 'selected' : '' }}>
                                    MedCity
                                </option>
                            </select>
                        </div>
                    </div>

                    {{-- Vaccine Days --}}
                    <div class="form-group">
                        <label>Vaccine Days</label>
                        <input
                            type="text"
                            name="vaccine_days"
                            value="{{ old('vaccine_days') }}"
                            placeholder="e.g. 0, 3, 7, 15, 28"
                        >
                    </div>

                </div>
            </div>

            {{-- FORM BUTTONS --}}
            <div class="btn-row">
                <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">Save Patient</button>
            </div>

        </form>

    </main>

</body>
</html>
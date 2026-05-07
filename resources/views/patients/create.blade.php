<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Patient Registration</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── MAIN ── */
        .main {
            margin-left: 230px;
            flex: 1;
            padding: 2rem;
            padding-bottom: 80px;
        }

        /* ── TOPBAR ── */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.8rem;
        }

        .topbar-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a3a1a;
        }

        .topbar-sub {
            font-size: 0.82rem;
            color: #888;
            margin-top: 2px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: white;
            color: #1a3a1a;
            border: 1.5px solid #e5e7eb;
            border-radius: 99px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-back:hover {
            background: #f3f4f6;
            border-color: #d1d5db;
            color: #1a3a1a;
        }

        /* ── ALERT BOXES ── */
        .error-box {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-size: 0.78rem;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 1.2rem;
        }

        .error-box svg { flex-shrink: 0; margin-top: 1px; }

        .success-box {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            font-size: 0.78rem;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 1.2rem;
        }

        .success-box svg { flex-shrink: 0; margin-top: 1px; }

        /* ── FORM SECTIONS ── */
        .form-section {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
            padding: 1.6rem;
            margin-bottom: 1.2rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.2rem;
            padding-bottom: 12px;
            border-bottom: 1.5px solid #f3f4f6;
        }

        .step-badge {
            font-size: 0.65rem;
            font-weight: 800;
            color: #2d6a2d;
            background: #f0fdf4;
            border: 1.5px solid #bbf7d0;
            border-radius: 8px;
            padding: 3px 8px;
            letter-spacing: 0.06em;
            flex-shrink: 0;
        }

        .section-title-wrap {
            border-left: 3px solid;
            border-image: linear-gradient(to bottom, #1a3a1a, #2d6a2d) 1;
            padding-left: 10px;
        }

        .section-title {
            font-size: 0.88rem;
            font-weight: 700;
            color: #1a3a1a;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .section-sub {
            font-size: 0.72rem;
            color: #9ca3af;
            margin-top: 1px;
        }

        /* ── FORM GRID ── */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .form-group { display: flex; flex-direction: column; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group.half { grid-column: span 2; }

        label {
            font-size: 0.72rem;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .required-star { color: #dc2626; }

        input, select {
            padding: 10px 14px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.88rem;
            background: #fafafa;
            font-family: 'Poppins', sans-serif;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            width: 100%;
            appearance: none;
            -webkit-appearance: none;
            color: #1f2937;
        }

        input:focus, select:focus {
            border-color: #2d6a2d;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(45,106,45,0.1);
        }

        input::placeholder { color: #c4c9d4; }

        .select-wrap { position: relative; }
        .select-wrap::after {
            content: '';
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 6px solid #2d6a2d;
            pointer-events: none;
        }

        /* ── BODY DIAGRAM ── */
        .diagram-container {
            background: #f8faf9;
            border: 1px solid #e8f0e8;
            border-radius: 14px;
            padding: 1.4rem 1rem;
            margin-bottom: 1rem;
        }

        .diagram-wrap {
            display: flex;
            gap: 40px;
            justify-content: center;
        }

        .diagram-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .diagram-label {
            font-size: 0.65rem;
            font-weight: 700;
            color: #2d6a2d;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            background: #e8f5e8;
            border: 1px solid #c3e6c3;
            border-radius: 99px;
            padding: 3px 12px;
        }

        .body-svg { display: block; cursor: pointer; }

        .zone {
            fill: transparent;
            stroke: transparent;
            stroke-width: 4;
            cursor: pointer;
            transition: fill 0.15s;
        }

        .zone:hover { fill: rgba(26,58,26,0.12); }
        .zone.selected { fill: rgba(45,106,45,0.22); stroke: #2d6a2d; stroke-width: 1.5; }

        .wound-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            min-height: 32px;
            margin-bottom: 0.6rem;
        }

        .wound-tag {
            font-size: 0.75rem;
            padding: 4px 12px;
            border-radius: 99px;
            background: #e8f5e8;
            color: #1a3a1a;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #b8d8b8;
            font-weight: 500;
        }

        .wound-tag button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            color: #2d6a2d;
            padding: 0;
            line-height: 1;
            font-weight: 700;
        }

        .wound-tag button:hover { color: #dc2626; }

        .diagram-hint {
            font-size: 0.73rem;
            color: #9ca3af;
            margin-top: 2px;
        }

        .no-site-placeholder {
            font-size: 0.78rem;
            color: #c4c9d4;
            align-self: center;
            font-style: italic;
        }

        /* ── STICKY FOOTER BAR ── */
        .footer-bar {
            position: fixed;
            bottom: 0;
            left: 230px;
            right: 0;
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 14px 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            box-shadow: 0 -4px 16px rgba(0,0,0,0.04);
        }

        .footer-bar-left {
            font-size: 0.78rem;
            color: #9ca3af;
        }

        .footer-bar-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-cancel {
            padding: 10px 24px;
            background: white;
            color: #6b7280;
            border: 1.5px solid #e5e7eb;
            border-radius: 99px;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-cancel:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            color: #374151;
        }

        .btn-save {
            padding: 10px 32px;
            background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
            color: white;
            border: none;
            border-radius: 99px;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: opacity 0.15s, transform 0.1s;
            box-shadow: 0 4px 12px rgba(45,106,45,0.3);
        }

        .btn-save:hover {
            opacity: 0.92;
            transform: translateY(-1px);
        }

        .btn-save:active { transform: translateY(0); }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <main class="main">

        {{-- TOPBAR --}}
        <div class="topbar">
            <div>
                <div class="topbar-title">Patient Registration</div>
                <div class="topbar-sub">Add a new bite incident patient</div>
            </div>
            <a href="{{ route('patients.index') }}" class="btn-back">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 5l-7 7 7 7"/>
                </svg>
                Back to Records
            </a>
        </div>

        {{-- ERROR MESSAGES --}}
        @if ($errors->any())
            <div class="error-box">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <div>
                    <strong>Please fix the following:</strong><br>
                    {{ $errors->first() }}
                </div>
            </div>
        @endif

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="success-box">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        {{-- FORM --}}
        <form method="POST" action="{{ route('patients.store') }}">
            @csrf

            {{-- ── SECTION 1: PATIENT PERSONAL INFORMATION ── --}}
            <div class="form-section">
                <div class="section-header">
                    <span class="step-badge">STEP 1</span>
                    <div class="section-title-wrap">
                        <div class="section-title">Patient's Personal Information</div>
                        <div class="section-sub">Basic details of the bite incident patient</div>
                    </div>
                </div>
                <div class="form-grid">

                    <div class="form-group full">
                        <label>Full Name <span class="required-star">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="e.g. Juan Dela Cruz" required>
                    </div>

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

                    <div class="form-group">
                        <label>Age <span class="required-star">*</span></label>
                        <input type="number" name="age" value="{{ old('age') }}" placeholder="e.g. 25" min="1" max="150" required>
                    </div>

                    <div class="form-group">
                        <label>Contact Number <span style="color:#c4c9d4;font-weight:400;text-transform:none;">(Guardian/Relative)</span></label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="e.g. 09171234567">
                    </div>

                    <div class="form-group">
                        <label>Email Address <span style="color:#c4c9d4;font-weight:400;text-transform:none;">(optional)</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="e.g. juan@gmail.com">
                    </div>

                    <div class="form-group full">
                        <label>Address <span class="required-star">*</span></label>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. Brgy. Libjo, Batangas City" required>
                    </div>

                    <div class="form-group full">
                        <label>Medical History / Known Allergies <span style="color:#c4c9d4;font-weight:400;text-transform:none;">(optional)</span></label>
                        <textarea name="medical_history"
                            placeholder="e.g. Hypertension, Allergies to Penicillin, Diabetic..."
                            style="padding:10px 14px; border:1.5px solid #e5e7eb; border-radius:10px; font-size:0.88rem; background:#fafafa; font-family:'Poppins',sans-serif; outline:none; transition:border-color 0.2s, box-shadow 0.2s; width:100%; color:#1f2937; resize:vertical; min-height:80px; line-height:1.5;"
                            onfocus="this.style.borderColor='#2d6a2d';this.style.boxShadow='0 0 0 3px rgba(45,106,45,0.1)';this.style.background='#fff';"
                            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#fafafa';">{{ old('medical_history') }}</textarea>
                    </div>

                </div>
            </div>

            {{-- ── SECTION 2: HISTORY OF EXPOSURE ── --}}
            <div class="form-section">
                <div class="section-header">
                    <span class="step-badge">STEP 2</span>
                    <div class="section-title-wrap">
                        <div class="section-title">History of Exposure</div>
                        <div class="section-sub">Details about the bite or scratch incident</div>
                    </div>
                </div>
                <div class="form-grid">

                    <div class="form-group">
                        <label>Date of Exposure <span class="required-star">*</span></label>
                        <input type="date" name="date_of_exposure" value="{{ old('date_of_exposure') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Place of Exposure <span class="required-star">*</span></label>
                        <input type="text" name="place_of_exposure" value="{{ old('place_of_exposure') }}" placeholder="e.g. Brgy. Libjo" required>
                    </div>

                    <div class="form-group">
                        <label>Type of Exposure <span class="required-star">*</span></label>
                        <div class="select-wrap">
                            <select name="type_of_exposure" required>
                                <option value="" disabled selected>Select type</option>
                                <option value="Scratch"              {{ old('type_of_exposure') == 'Scratch'              ? 'selected' : '' }}>Scratch</option>
                                <option value="Bite"                 {{ old('type_of_exposure') == 'Bite'                 ? 'selected' : '' }}>Bite</option>
                                <option value="Non-Bite/Non-Scratch" {{ old('type_of_exposure') == 'Non-Bite/Non-Scratch' ? 'selected' : '' }}>Non-Bite / Non-Scratch</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full">
                        <label>Source of Exposure <span class="required-star">*</span></label>
                        <div class="select-wrap">
                            <select name="source_of_exposure" id="source_of_exposure" required>
                                <option value="" disabled selected>Select animal and breed type</option>
                                <option value="Dog - With Breed"    {{ old('source_of_exposure') == 'Dog - With Breed'    ? 'selected' : '' }}>Dog — With Breed</option>
                                <option value="Dog - Without Breed" {{ old('source_of_exposure') == 'Dog - Without Breed' ? 'selected' : '' }}>Dog — Without Breed</option>
                                <option value="Cat - With Breed"    {{ old('source_of_exposure') == 'Cat - With Breed'    ? 'selected' : '' }}>Cat — With Breed</option>
                                <option value="Cat - Without Breed" {{ old('source_of_exposure') == 'Cat - Without Breed' ? 'selected' : '' }}>Cat — Without Breed</option>
                                <option value="other animal"        {{ old('source_of_exposure') == 'other animal'        ? 'selected' : '' }}>Other Animal</option>
                            </select>
                        </div>
                    </div>

                    {{-- CONDITIONAL: specify other animal --}}
                    <div class="form-group full" id="other_animal_container"
                         style="display:{{ old('source_of_exposure') == 'other animal' ? 'flex' : 'none' }}; flex-direction:column;">
                        <label style="color:#f97316; letter-spacing:0.05em; font-size:0.72rem; font-weight:600; text-transform:uppercase; margin-bottom:6px;">
                            Please specify the animal <span class="required-star">*</span>
                        </label>
                        <input type="text"
                               name="other_animal_details"
                               id="other_animal_details"
                               value="{{ old('other_animal_details') }}"
                               placeholder="e.g. Monkey, Bat, Rat, Snake..."
                               style="border-color:#fed7aa;"
                               onfocus="this.style.borderColor='#f97316';this.style.boxShadow='0 0 0 3px rgba(249,115,22,0.12)';"
                               onblur="this.style.borderColor='#fed7aa';this.style.boxShadow='none';">
                    </div>

                </div>
            </div>

            {{-- ── SECTION 3: WOUND SITE ── --}}
            <div class="form-section">
                <div class="section-header">
                    <span class="step-badge">STEP 3</span>
                    <div class="section-title-wrap">
                        <div class="section-title">Wound Site</div>
                        <div class="section-sub">Click on the body diagram to mark the affected area</div>
                    </div>
                </div>

                <input type="hidden" name="wound_site" id="wound_site_input" value="{{ old('wound_site') }}">

                <div class="diagram-container">
                    <div class="diagram-wrap">

                        {{-- FRONT VIEW --}}
                        <div class="diagram-col">
                            <span class="diagram-label">Front</span>
                            <svg class="body-svg" viewBox="0 0 120 280" width="130" height="300" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" stroke="#bbb" stroke-width="1">
                                    <ellipse cx="60" cy="22" rx="16" ry="20"/>
                                    <path d="M44 42 Q30 55 28 80 Q26 105 30 120 L90 120 Q94 105 92 80 Q90 55 76 42 Z"/>
                                    <path d="M30 60 Q14 65 10 90 Q8 108 16 115 L30 110 Q24 95 26 75 Z"/>
                                    <path d="M90 60 Q106 65 110 90 Q112 108 104 115 L90 110 Q96 95 94 75 Z"/>
                                    <path d="M38 120 Q32 155 34 190 Q35 210 36 240 L50 240 Q50 210 50 185 Q52 165 60 155 Q68 165 70 185 L70 240 L84 240 Q85 210 86 190 Q88 155 82 120 Z"/>
                                    <ellipse cx="16" cy="115" rx="7" ry="8"/>
                                    <ellipse cx="104" cy="115" rx="7" ry="8"/>
                                    <ellipse cx="43" cy="245" rx="7" ry="10"/>
                                    <ellipse cx="77" cy="245" rx="7" ry="10"/>
                                </g>
                                <rect class="zone" id="f-head"    x="44" y="2"   width="32" height="38" rx="12" data-label="Head (front)"/>
                                <rect class="zone" id="f-neck"    x="52" y="38"  width="16" height="10" rx="3"  data-label="Neck"/>
                                <rect class="zone" id="f-chest"   x="34" y="48"  width="52" height="38" rx="4"  data-label="Chest"/>
                                <rect class="zone" id="f-abdomen" x="34" y="86"  width="52" height="34" rx="4"  data-label="Abdomen"/>
                                <rect class="zone" id="f-arm-l"   x="8"  y="58"  width="22" height="52" rx="6"  data-label="Left arm"/>
                                <rect class="zone" id="f-arm-r"   x="90" y="58"  width="22" height="52" rx="6"  data-label="Right arm"/>
                                <rect class="zone" id="f-hand-l"  x="8"  y="107" width="16" height="18" rx="4"  data-label="Left hand"/>
                                <rect class="zone" id="f-hand-r"  x="97" y="107" width="16" height="18" rx="4"  data-label="Right hand"/>
                                <rect class="zone" id="f-thigh-l" x="34" y="122" width="24" height="50" rx="4"  data-label="Left thigh (front)"/>
                                <rect class="zone" id="f-thigh-r" x="62" y="122" width="24" height="50" rx="4"  data-label="Right thigh (front)"/>
                                <rect class="zone" id="f-leg-l"   x="34" y="172" width="22" height="52" rx="4"  data-label="Left leg (front)"/>
                                <rect class="zone" id="f-leg-r"   x="64" y="172" width="22" height="52" rx="4"  data-label="Right leg (front)"/>
                                <rect class="zone" id="f-foot-l"  x="36" y="232" width="16" height="24" rx="4"  data-label="Left foot"/>
                                <rect class="zone" id="f-foot-r"  x="68" y="232" width="16" height="24" rx="4"  data-label="Right foot"/>
                            </svg>
                        </div>

                        {{-- BACK VIEW --}}
                        <div class="diagram-col">
                            <span class="diagram-label">Back</span>
                            <svg class="body-svg" viewBox="0 0 120 280" width="130" height="300" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" stroke="#bbb" stroke-width="1">
                                    <ellipse cx="60" cy="22" rx="16" ry="20"/>
                                    <path d="M44 42 Q30 55 28 80 Q26 105 30 120 L90 120 Q94 105 92 80 Q90 55 76 42 Z"/>
                                    <path d="M30 60 Q14 65 10 90 Q8 108 16 115 L30 110 Q24 95 26 75 Z"/>
                                    <path d="M90 60 Q106 65 110 90 Q112 108 104 115 L90 110 Q96 95 94 75 Z"/>
                                    <path d="M38 120 Q32 155 34 190 Q35 210 36 240 L50 240 Q50 210 50 185 Q52 165 60 155 Q68 165 70 185 L70 240 L84 240 Q85 210 86 190 Q88 155 82 120 Z"/>
                                    <ellipse cx="16" cy="115" rx="7" ry="8"/>
                                    <ellipse cx="104" cy="115" rx="7" ry="8"/>
                                    <ellipse cx="43" cy="245" rx="7" ry="10"/>
                                    <ellipse cx="77" cy="245" rx="7" ry="10"/>
                                </g>
                                <rect class="zone" id="b-head"       x="44" y="2"   width="32" height="38" rx="12" data-label="Head (back)"/>
                                <rect class="zone" id="b-neck"       x="52" y="38"  width="16" height="10" rx="3"  data-label="Neck (back)"/>
                                <rect class="zone" id="b-upper-back" x="34" y="48"  width="52" height="36" rx="4"  data-label="Upper back"/>
                                <rect class="zone" id="b-lower-back" x="34" y="84"  width="52" height="36" rx="4"  data-label="Lower back"/>
                                <rect class="zone" id="b-arm-l"      x="8"  y="58"  width="22" height="52" rx="6"  data-label="Left arm (back)"/>
                                <rect class="zone" id="b-arm-r"      x="90" y="58"  width="22" height="52" rx="6"  data-label="Right arm (back)"/>
                                <rect class="zone" id="b-hand-l"     x="8"  y="107" width="16" height="18" rx="4"  data-label="Left hand (back)"/>
                                <rect class="zone" id="b-hand-r"     x="97" y="107" width="16" height="18" rx="4"  data-label="Right hand (back)"/>
                                <rect class="zone" id="b-glute-l"    x="34" y="120" width="24" height="28" rx="4"  data-label="Left gluteal"/>
                                <rect class="zone" id="b-glute-r"    x="62" y="120" width="24" height="28" rx="4"  data-label="Right gluteal"/>
                                <rect class="zone" id="b-thigh-l"    x="34" y="148" width="24" height="40" rx="4"  data-label="Left thigh (back)"/>
                                <rect class="zone" id="b-thigh-r"    x="62" y="148" width="24" height="40" rx="4"  data-label="Right thigh (back)"/>
                                <rect class="zone" id="b-leg-l"      x="34" y="190" width="22" height="42" rx="4"  data-label="Left leg (back)"/>
                                <rect class="zone" id="b-leg-r"      x="64" y="190" width="22" height="42" rx="4"  data-label="Right leg (back)"/>
                                <rect class="zone" id="b-foot-l"     x="36" y="232" width="16" height="24" rx="4"  data-label="Left foot (back)"/>
                                <rect class="zone" id="b-foot-r"     x="68" y="232" width="16" height="24" rx="4"  data-label="Right foot (back)"/>
                            </svg>
                        </div>

                    </div>
                </div>

                {{-- Selected wound tags --}}
                <div class="wound-tags" id="wound-tags">
                    <span class="no-site-placeholder" id="no-site-msg">No wound site selected — click a body region above</span>
                </div>
                <span class="diagram-hint">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:3px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Click a region to select, click again to deselect. Multiple regions can be selected.
                </span>
            </div>

            {{-- ── SECTION 4: MONITORING INFORMATION ── --}}
            <div class="form-section">
                <div class="section-header">
                    <span class="step-badge">STEP 4</span>
                    <div class="section-title-wrap">
                        <div class="section-title">Monitoring Information</div>
                        <div class="section-sub">Treatment and referral details</div>
                    </div>
                </div>
                <div class="form-grid">

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

                    <div class="form-group">
                        <label>Vaccine Days</label>
                        <input type="text" name="vaccine_days" value="{{ old('vaccine_days') }}" placeholder="e.g. 0, 3, 7, 15, 28">
                    </div>

                </div>
            </div>

        </form>

    </main>

    {{-- ── STICKY FOOTER BAR ── --}}
    <div class="footer-bar">
        <div class="footer-bar-left">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            All fields marked <span style="color:#dc2626;font-weight:700;">*</span> are required
        </div>
        <div class="footer-bar-right">
            <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" form="patient-form" class="btn-save" onclick="document.querySelector('form').submit();">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align:middle;margin-right:5px;"><polyline points="20 6 9 17 4 12"/></svg>
                Save Patient
            </button>
        </div>
    </div>

    {{-- ── BODY DIAGRAM SCRIPT ── --}}
    <script>
        const selected = new Set();

        const oldValue = document.getElementById('wound_site_input').value;
        if (oldValue) {
            oldValue.split(',').map(s => s.trim()).forEach(label => {
                document.querySelectorAll('.zone').forEach(z => {
                    if (z.dataset.label === label) {
                        selected.add(z.id);
                        z.classList.add('selected');
                    }
                });
            });
            renderTags();
        }

        document.querySelectorAll('.zone').forEach(zone => {
            zone.addEventListener('click', () => {
                if (selected.has(zone.id)) {
                    selected.delete(zone.id);
                    zone.classList.remove('selected');
                } else {
                    selected.add(zone.id);
                    zone.classList.add('selected');
                }
                renderTags();
            });
        });

        function renderTags() {
            const container = document.getElementById('wound-tags');
            const hiddenInput = document.getElementById('wound_site_input');

            container.innerHTML = '';

            if (selected.size === 0) {
                const placeholder = document.createElement('span');
                placeholder.className = 'no-site-placeholder';
                placeholder.id = 'no-site-msg';
                placeholder.textContent = 'No wound site selected — click a body region above';
                container.appendChild(placeholder);
                hiddenInput.value = '';
                return;
            }

            const labels = [];
            selected.forEach(id => {
                const el = document.getElementById(id);
                if (!el) return;
                const label = el.dataset.label;
                labels.push(label);

                const tag = document.createElement('span');
                tag.className = 'wound-tag';
                tag.innerHTML = label + ' <button type="button" onclick="removeZone(\'' + id + '\')">×</button>';
                container.appendChild(tag);
            });

            hiddenInput.value = labels.join(', ');
        }

        function removeZone(id) {
            selected.delete(id);
            const el = document.getElementById(id);
            if (el) el.classList.remove('selected');
            renderTags();
        }

        // ── OTHER ANIMAL TOGGLE ──
        const sourceSelect = document.getElementById('source_of_exposure');
        const otherContainer = document.getElementById('other_animal_container');
        const otherInput = document.getElementById('other_animal_details');

        function toggleOtherAnimal() {
            const isOther = sourceSelect.value === 'other animal';
            otherContainer.style.display = isOther ? 'flex' : 'none';
            otherInput.required = isOther;
            if (!isOther) otherInput.value = '';
        }

        sourceSelect.addEventListener('change', toggleOtherAnimal);
        // Run on load to handle old() repopulation
        toggleOtherAnimal();
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Patient Registration</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; display: flex; min-height: 100vh; }
        .main { margin-left: 230px; flex: 1; padding: 2rem; padding-bottom: 80px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        .page-title { font-size: 1.3rem; font-weight: 700; color: #1a3a1a; }
        .page-sub { font-size: 0.82rem; color: #888; margin-top: 2px; }
        .btn-back { display: inline-flex; align-items: center; gap: 7px; padding: 9px 18px; background: white; color: #1a3a1a; border: 1.5px solid #e5e7eb; border-radius: 99px; font-size: 0.82rem; font-weight: 600; text-decoration: none; }
        .btn-back:hover { background: #f3f4f6; }
        .error-box { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; font-size: 0.78rem; border-radius: 10px; padding: 12px 16px; margin-bottom: 1rem; }
        .success-box { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; font-size: 0.78rem; border-radius: 10px; padding: 12px 16px; margin-bottom: 1rem; }
        .form-section { background: white; border-radius: 14px; border: 1px solid #f0f0f0; box-shadow: 0 4px 14px rgba(0,0,0,0.04); padding: 1.5rem; margin-bottom: 1.2rem; }
        .section-header { display: flex; align-items: center; gap: 12px; margin-bottom: 1.2rem; padding-bottom: 10px; border-bottom: 1.5px solid #f3f4f6; }
        .step-badge { font-size: 0.65rem; font-weight: 800; color: #2d6a2d; background: #f0fdf4; border: 1.5px solid #bbf7d0; border-radius: 8px; padding: 3px 8px; letter-spacing: 0.06em; }
        .section-title { font-size: 0.88rem; font-weight: 700; color: #1a3a1a; text-transform: uppercase; letter-spacing: 0.05em; }
        .section-sub { font-size: 0.72rem; color: #9ca3af; margin-top: 1px; }
        .form-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
        .form-group { display: flex; flex-direction: column; }
        .form-group.full { grid-column: 1 / -1; }
        label { font-size: 0.72rem; font-weight: 600; color: #6b7280; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; }
        .required-star { color: #dc2626; }
        input, select, textarea { padding: 10px 14px; border: 1.5px solid #e5e7eb; border-radius: 10px; font-size: 0.88rem; background: #fafafa; font-family: 'Segoe UI', sans-serif; outline: none; transition: border-color 0.2s, box-shadow 0.2s; width: 100%; color: #1f2937; }
        input:focus, select:focus, textarea:focus { border-color: #2d6a2d; background: #fff; box-shadow: 0 0 0 3px rgba(45,106,45,0.1); }
        input::placeholder, textarea::placeholder { color: #c4c9d4; }
        select { appearance: none; -webkit-appearance: none; }
        textarea { resize: vertical; min-height: 80px; line-height: 1.5; }
        .select-wrap { position: relative; }
        .select-wrap::after { content: ''; position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 0; height: 0; border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 6px solid #2d6a2d; pointer-events: none; }
        /* Wound site */
        .diagram-container { background: #f8faf9; border: 1px solid #e8f0e8; border-radius: 12px; padding: 1.2rem 1rem; margin-bottom: 1rem; }
        .diagram-wrap { display: flex; gap: 40px; justify-content: center; }
        .diagram-col { display: flex; flex-direction: column; align-items: center; gap: 8px; }
        .diagram-label { font-size: 0.65rem; font-weight: 700; color: #2d6a2d; text-transform: uppercase; letter-spacing: 0.1em; background: #e8f5e8; border: 1px solid #c3e6c3; border-radius: 99px; padding: 3px 12px; }
        .body-svg { display: block; cursor: pointer; }
        .zone { fill: transparent; cursor: pointer; transition: fill 0.15s; }
        .zone:hover { fill: rgba(26,90,26,0.13); }
        .zone.selected { fill: rgba(45,106,45,0.25); stroke: #2d6a2d; stroke-width: 1.5; }
        .wound-tags { display: flex; flex-wrap: wrap; gap: 6px; min-height: 30px; margin-bottom: 0.6rem; }
        .wound-tag { font-size: 0.75rem; padding: 4px 12px; border-radius: 99px; background: #e8f5e8; color: #1a3a1a; display: inline-flex; align-items: center; gap: 6px; border: 1px solid #b8d8b8; font-weight: 500; }
        .wound-tag button { background: none; border: none; cursor: pointer; font-size: 14px; color: #2d6a2d; padding: 0; line-height: 1; font-weight: 700; }
        .wound-tag button:hover { color: #dc2626; }
        .diagram-hint { font-size: 0.73rem; color: #9ca3af; }
        .no-site-placeholder { font-size: 0.78rem; color: #c4c9d4; font-style: italic; }
        /* Category box */
        .category-auto-box { margin-top: 1rem; padding: 14px 18px; border-radius: 10px; border: 1.5px solid #e0e0e0; background: #fafafa; display: flex; align-items: flex-start; gap: 14px; }
        .cat-badge { font-size: 0.8rem; font-weight: 700; padding: 4px 14px; border-radius: 99px; white-space: nowrap; flex-shrink: 0; }
        .cat-none { background: #f0f0f0; color: #888; }
        .cat-1 { background: #EAF3DE; color: #3B6D11; }
        .cat-2 { background: #FAEEDA; color: #854F0B; }
        .cat-3 { background: #FCEBEB; color: #A32D2D; }
        .cat-info-text { font-size: 0.8rem; color: #555; line-height: 1.5; }
        .cat-info-title { font-weight: 700; color: #1a3a1a; margin-bottom: 2px; font-size: 0.82rem; }
        .sub-label { font-size: 0.72rem; font-weight: 600; color: #6b7280; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; }
        /* Exposure pills */
        .exposure-btn-row { display: flex; gap: 8px; margin-bottom: 1.2rem; flex-wrap: wrap; }
        .exp-pill { font-size: 0.82rem; padding: 6px 16px; border-radius: 99px; border: 1.5px solid #ddd; background: #fafafa; color: #555; cursor: pointer; transition: all 0.15s; font-family: 'Segoe UI', sans-serif; }
        .exp-pill:hover { border-color: #2d6a2d; color: #1a3a1a; }
        .exp-pill.active { background: #1a3a1a; color: white; border-color: #1a3a1a; }
        /* Footer bar */
        .footer-bar { position: fixed; bottom: 0; left: 230px; right: 0; background: white; border-top: 1px solid #e5e7eb; padding: 14px 2rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; box-shadow: 0 -4px 16px rgba(0,0,0,0.04); }
        .footer-bar-left { font-size: 0.78rem; color: #9ca3af; }
        .footer-bar-right { display: flex; gap: 10px; }
        .btn-cancel { padding: 10px 24px; background: white; color: #6b7280; border: 1.5px solid #e5e7eb; border-radius: 99px; font-size: 0.88rem; font-weight: 600; cursor: pointer; font-family: 'Segoe UI', sans-serif; text-decoration: none; }
        .btn-cancel:hover { background: #f9fafb; color: #374151; }
        .btn-save { padding: 10px 32px; background: linear-gradient(135deg, #1a3a1a, #2d6a2d); color: white; border: none; border-radius: 99px; font-size: 0.88rem; font-weight: 600; cursor: pointer; font-family: 'Segoe UI', sans-serif; box-shadow: 0 4px 12px rgba(45,106,45,0.3); }
        .btn-save:hover { opacity: 0.92; }
    </style>
</head>
<body>

@include('layouts.sidebar')

<main class="main">

    <div class="page-header">
        <div>
            <div class="page-title">Patient Registration</div>
            <div class="page-sub">Add a new bite incident patient</div>
        </div>
        <a href="{{ route('patients.index') }}" class="btn-back">&#8592; Back to Records</a>
    </div>

    @if ($errors->any())
        <div class="error-box"><strong>Please fix the following:</strong> {{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-box">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('patients.store') }}" id="patient-form">
        @csrf

        {{-- SECTION 1: PERSONAL INFORMATION --}}
        <div class="form-section">
            <div class="section-header">
                <span class="step-badge">STEP 1</span>
                <div>
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
                    <textarea name="medical_history" placeholder="e.g. Hypertension, Allergies to Penicillin, Diabetic...">{{ old('medical_history') }}</textarea>
                </div>

            </div>
        </div>

        {{-- SECTION 2: HISTORY OF EXPOSURE --}}
        <div class="form-section">
            <div class="section-header">
                <span class="step-badge">STEP 2</span>
                <div>
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
                        <select name="type_of_exposure" id="type_of_exposure_select" required>
                            <option value="" disabled selected>Select type</option>
                            <option value="Scratch" {{ old('type_of_exposure') == 'Scratch' ? 'selected' : '' }}>Scratch</option>
                            <option value="Bite" {{ old('type_of_exposure') == 'Bite' ? 'selected' : '' }}>Bite</option>
                            <option value="Scratch and Bite" {{ old('type_of_exposure') == 'Scratch and Bite' ? 'selected' : '' }}>Scratch and Bite</option>
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

                <div class="form-group full" id="other_animal_container"
                     style="display:{{ old('source_of_exposure') == 'other animal' ? 'flex' : 'none' }};flex-direction:column;">
                    <label style="color:#f97316;font-size:0.72rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:6px;">
                        Please specify the animal <span class="required-star">*</span>
                    </label>
                    <input type="text" name="other_animal_details" id="other_animal_details"
                           value="{{ old('other_animal_details') }}"
                           placeholder="e.g. Monkey, Bat, Rat, Snake..."
                           style="border-color:#fed7aa;">
                </div>

            </div>
        </div>

        {{-- SECTION 3: WOUND SITE --}}
        <div class="form-section">
            <div class="section-header">
                <span class="step-badge">STEP 3</span>
                <div>
                    <div class="section-title">Wound Site</div>
                    <div class="section-sub">Click on the body diagram to mark the affected area</div>
                </div>
            </div>

            <input type="hidden" name="wound_site"    id="wound_site_input"    value="{{ old('wound_site') }}">
            <input type="hidden" name="bite_category" id="bite_category_input" value="{{ old('bite_category') }}">

            <div class="sub-label" style="margin-bottom:8px;">Type of Exposure</div>
            <div class="exposure-btn-row" id="exp-pill-row">
                <button type="button" class="exp-pill" data-val="Scratch">Scratch</button>
                <button type="button" class="exp-pill" data-val="Bite">Bite</button>
                <button type="button" class="exp-pill" data-val="Scratch and Bite">Scratch and Bite</button>
                <button type="button" class="exp-pill" data-val="Non-Bite/Non-Scratch">Non-Bite / Non-Scratch</button>
            </div>

            <div class="sub-label" style="margin-bottom:8px;">Select wound site on body</div>
            <div class="diagram-container">
                <div class="diagram-wrap">

                    {{-- FRONT VIEW --}}
                    <div class="diagram-col">
                        <span class="diagram-label">Front</span>
                        <svg class="body-svg" viewBox="0 0 110 300" width="130" height="330" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" stroke="#ccc" stroke-width="1.2">
                                <ellipse cx="55" cy="22" rx="15" ry="18"/>
                                <rect x="50" y="39" width="10" height="10" rx="2" fill="#ebebeb" stroke="#ccc"/>
                                <path d="M30 50 Q20 52 16 62 L20 68 Q26 60 35 58 L35 120 L75 120 L75 58 Q84 60 90 68 L94 62 Q90 52 80 50 Q68 42 55 42 Q42 42 30 50Z"/>
                                <path d="M20 68 Q12 72 10 90 L16 115 Q20 100 26 85 L30 72Z"/>
                                <path d="M90 68 Q98 72 100 90 L94 115 Q90 100 84 85 L80 72Z"/>
                                <path d="M10 90 Q8 108 16 115 L20 110 Q14 100 14 88Z"/>
                                <path d="M100 90 Q102 108 94 115 L90 110 Q96 100 96 88Z"/>
                                <ellipse cx="18" cy="121" rx="7" ry="9"/>
                                <ellipse cx="92" cy="121" rx="7" ry="9"/>
                                <path d="M35 120 Q35 135 55 138 Q75 135 75 120Z" fill="#f0f0f0"/>
                                <path d="M35 135 Q32 160 34 188 L46 188 Q48 160 50 135Z"/>
                                <path d="M75 135 Q78 160 76 188 L64 188 Q62 160 60 135Z"/>
                                <ellipse cx="40" cy="190" rx="6" ry="7"/>
                                <ellipse cx="70" cy="190" rx="6" ry="7"/>
                                <path d="M34 197 Q32 220 34 245 L46 245 Q48 220 46 197Z"/>
                                <path d="M76 197 Q78 220 76 245 L64 245 Q62 220 64 197Z"/>
                                <path d="M33 245 Q28 255 34 260 L46 260 Q50 255 47 245Z"/>
                                <path d="M77 245 Q82 255 76 260 L64 260 Q60 255 63 245Z"/>
                            </g>
                            <ellipse class="zone" id="f-head"       cx="55" cy="22"  rx="15" ry="18"       data-label="Head"/>
                            <rect    class="zone" id="f-neck"       x="49"  y="39"   width="12" height="12" rx="3" data-label="Neck"/>
                            <rect    class="zone" id="f-shoulder-l" x="14"  y="50"   width="20" height="22" rx="4" data-label="Left shoulder"/>
                            <rect    class="zone" id="f-shoulder-r" x="76"  y="50"   width="20" height="22" rx="4" data-label="Right shoulder"/>
                            <rect    class="zone" id="f-chest"      x="32"  y="50"   width="46" height="36" rx="3" data-label="Chest"/>
                            <rect    class="zone" id="f-abdomen"    x="33"  y="86"   width="44" height="34" rx="3" data-label="Abdomen"/>
                            <rect    class="zone" id="f-arm-l"      x="8"   y="68"   width="20" height="46" rx="5" data-label="Left upper arm"/>
                            <rect    class="zone" id="f-arm-r"      x="82"  y="68"   width="20" height="46" rx="5" data-label="Right upper arm"/>
                            <ellipse class="zone" id="f-hand-l"     cx="18" cy="121" rx="9"   ry="11"       data-label="Left hand"/>
                            <ellipse class="zone" id="f-hand-r"     cx="92" cy="121" rx="9"   ry="11"       data-label="Right hand"/>
                            <rect    class="zone" id="f-thigh-l"    x="33"  y="136"  width="19" height="52" rx="4" data-label="Left thigh"/>
                            <rect    class="zone" id="f-thigh-r"    x="58"  y="136"  width="19" height="52" rx="4" data-label="Right thigh"/>
                            <rect    class="zone" id="f-leg-l"      x="33"  y="195"  width="15" height="50" rx="4" data-label="Left leg"/>
                            <rect    class="zone" id="f-leg-r"      x="62"  y="195"  width="15" height="50" rx="4" data-label="Right leg"/>
                            <path    class="zone" id="f-foot-l"     d="M33 245 Q28 255 34 260 L46 260 Q50 255 47 245Z" data-label="Left foot"/>
                            <path    class="zone" id="f-foot-r"     d="M77 245 Q82 255 76 260 L64 260 Q60 255 63 245Z" data-label="Right foot"/>
                        </svg>
                    </div>

                    {{-- BACK VIEW --}}
                    <div class="diagram-col">
                        <span class="diagram-label">Back</span>
                        <svg class="body-svg" viewBox="0 0 110 300" width="130" height="330" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" stroke="#ccc" stroke-width="1.2">
                                <ellipse cx="55" cy="22" rx="15" ry="18"/>
                                <rect x="50" y="39" width="10" height="10" rx="2" fill="#ebebeb" stroke="#ccc"/>
                                <path d="M30 50 Q20 52 16 62 L20 68 Q26 60 35 58 L35 120 L75 120 L75 58 Q84 60 90 68 L94 62 Q90 52 80 50 Q68 42 55 42 Q42 42 30 50Z"/>
                                <path d="M20 68 Q12 72 10 90 L16 115 Q20 100 26 85 L30 72Z"/>
                                <path d="M90 68 Q98 72 100 90 L94 115 Q90 100 84 85 L80 72Z"/>
                                <path d="M10 90 Q8 108 16 115 L20 110 Q14 100 14 88Z"/>
                                <path d="M100 90 Q102 108 94 115 L90 110 Q96 100 96 88Z"/>
                                <ellipse cx="18" cy="121" rx="7" ry="9"/>
                                <ellipse cx="92" cy="121" rx="7" ry="9"/>
                                <path d="M35 120 Q34 140 44 144 Q55 146 66 144 Q76 140 75 120Z"/>
                                <path d="M35 140 Q32 163 34 188 L46 188 Q48 163 50 140Z"/>
                                <path d="M75 140 Q78 163 76 188 L64 188 Q62 163 60 140Z"/>
                                <ellipse cx="40" cy="190" rx="6" ry="7"/>
                                <ellipse cx="70" cy="190" rx="6" ry="7"/>
                                <path d="M34 197 Q32 220 34 245 L46 245 Q48 220 46 197Z"/>
                                <path d="M76 197 Q78 220 76 245 L64 245 Q62 220 64 197Z"/>
                                <path d="M33 245 Q28 255 34 260 L46 260 Q50 255 47 245Z"/>
                                <path d="M77 245 Q82 255 76 260 L64 260 Q60 255 63 245Z"/>
                            </g>
                            <ellipse class="zone" id="b-head"        cx="55" cy="22"  rx="15" ry="18"       data-label="Head (back)"/>
                            <rect    class="zone" id="b-neck"        x="49"  y="39"   width="12" height="12" rx="3" data-label="Neck (back)"/>
                            <rect    class="zone" id="b-shoulder-l"  x="14"  y="50"   width="20" height="22" rx="4" data-label="Left shoulder (back)"/>
                            <rect    class="zone" id="b-shoulder-r"  x="76"  y="50"   width="20" height="22" rx="4" data-label="Right shoulder (back)"/>
                            <rect    class="zone" id="b-upper-back"  x="32"  y="50"   width="46" height="34" rx="3" data-label="Upper back"/>
                            <rect    class="zone" id="b-lower-back"  x="32"  y="84"   width="46" height="36" rx="3" data-label="Lower back"/>
                            <rect    class="zone" id="b-arm-l"       x="8"   y="68"   width="20" height="46" rx="5" data-label="Left upper arm (back)"/>
                            <rect    class="zone" id="b-arm-r"       x="82"  y="68"   width="20" height="46" rx="5" data-label="Right upper arm (back)"/>
                            <ellipse class="zone" id="b-hand-l"      cx="18" cy="121" rx="9"   ry="11"       data-label="Left hand (back)"/>
                            <ellipse class="zone" id="b-hand-r"      cx="92" cy="121" rx="9"   ry="11"       data-label="Right hand (back)"/>
                            <rect    class="zone" id="b-glute-l"     x="33"  y="120"  width="22" height="24" rx="4" data-label="Left gluteal"/>
                            <rect    class="zone" id="b-glute-r"     x="55"  y="120"  width="22" height="24" rx="4" data-label="Right gluteal"/>
                            <rect    class="zone" id="b-thigh-l"     x="33"  y="144"  width="19" height="44" rx="4" data-label="Left thigh (back)"/>
                            <rect    class="zone" id="b-thigh-r"     x="58"  y="144"  width="19" height="44" rx="4" data-label="Right thigh (back)"/>
                            <rect    class="zone" id="b-leg-l"       x="33"  y="195"  width="15" height="50" rx="4" data-label="Left leg (back)"/>
                            <rect    class="zone" id="b-leg-r"       x="62"  y="195"  width="15" height="50" rx="4" data-label="Right leg (back)"/>
                            <path    class="zone" id="b-foot-l"      d="M33 245 Q28 255 34 260 L46 260 Q50 255 47 245Z" data-label="Left foot (back)"/>
                            <path    class="zone" id="b-foot-r"      d="M77 245 Q82 255 76 260 L64 260 Q60 255 63 245Z" data-label="Right foot (back)"/>
                        </svg>
                    </div>

                </div>
            </div>

            <div class="wound-tags" id="wound-tags">
                <span class="no-site-placeholder" id="no-site-msg">No wound site selected — click a body region above</span>
            </div>
            <span class="diagram-hint">Click a region to select, click again to deselect. Multiple regions can be selected.</span>

            <div class="category-auto-box" id="cat-auto-box">
                <span class="cat-badge cat-none" id="cat-badge-auto">—</span>
                <div>
                    <div class="cat-info-title" id="cat-auto-title">Select exposure type and wound site</div>
                    <div class="cat-info-text"  id="cat-auto-desc"></div>
                </div>
            </div>

        </div>

        {{-- SECTION 4: MONITORING INFORMATION --}}
        <div class="form-section">
            <div class="section-header">
                <span class="step-badge">STEP 4</span>
                <div>
                    <div class="section-title">Monitoring Information</div>
                    <div class="section-sub">Treatment and referral details</div>
                </div>
            </div>
            <div class="form-grid">

                <div class="form-group">
                    <label>Category Level of Bite</label>
                    <div class="select-wrap">
                        <select id="category_level_select" name="bite_category" class="your-css-classes">
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
                            <option value="MedCity" {{ old('referred_clinic') == 'MedCity' ? 'selected' : '' }}>MedCity</option>
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

{{-- STICKY FOOTER --}}
<div class="footer-bar">
    <div class="footer-bar-left">Fields marked <span style="color:#dc2626;font-weight:700;">*</span> are required</div>
    <div class="footer-bar-right">
        <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
        <button type="submit" form="patient-form" class="btn-save">&#10003; Save Patient</button>
    </div>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    // ─── INITIALIZATION ───
    const selected = new Set();
    let exposureType = null;

    // Listahan ng mga parte na matik Category 3
    const HIGH_RISK = new Set([
        'Head', 'Head (back)', 'Neck', 'Neck (back)',
        'Left hand', 'Right hand', 'Left hand (back)', 'Right hand (back)',
        'Left foot', 'Right foot', 'Left foot (back)', 'Right foot (back)'
    ]);

    const CAT_INFO = {
        1: { label:'Category 1 — No wound',      desc:'Touching or feeding of animals, licks on intact skin. No wound, no mucosal contact.', cls:'cat-1' },
        2: { label:'Category 2 — Minor exposure', desc:'Nibbling of uncovered skin, minor scratches or abrasions without bleeding.', cls:'cat-2' },
        3: { label:'Category 3 — Severe exposure',desc:'Transdermal bites/scratches, licks on broken skin, or exposure to head/neck/hands/feet.', cls:'cat-3' }
    };

    // ─── SOLUTION 2: RENDER WOUND TAGS (Dapat lumabas ang pangalan ng body part) ───
    function renderTags() {
        const container   = document.getElementById('wound-tags');
        const hiddenInput = document.getElementById('wound_site_input');
        
        if (!container || !hiddenInput) return;

        container.innerHTML = ''; // Clear previous content

        if (selected.size === 0) {
            const ph = document.createElement('span');
            ph.className   = 'no-site-placeholder';
            ph.id          = 'no-site-msg';
            ph.textContent = exposureType === 'Non-Bite/Non-Scratch' 
                ? 'No wound site needed for Category 1' 
                : 'No wound site selected — click a body region above';
            container.appendChild(ph);
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
            // Important: Dinagdagan ko ng inline style para magmukhang tag
            tag.innerHTML = `${label} <button type="button" class="remove-tag" data-id="${id}" style="margin-left:5px; cursor:pointer;">&times;</button>`;
            container.appendChild(tag);
        });

        hiddenInput.value = labels.join(', ');
    }

    // ─── SOLUTION 1: LOGIC FOR BITE, SCRATCH, AND COMBINED ───
    function updateCategory() {
        const badge = document.getElementById('cat-badge-auto');
        const title = document.getElementById('cat-auto-title');
        const desc  = document.getElementById('cat-auto-desc');
        const hiddenCat = document.getElementById('bite_category_input');
        const selectCat = document.getElementById('category_level_select');
        const zones = document.querySelectorAll('.zone');

        let cat = 1;

        if (exposureType === 'Non-Bite/Non-Scratch') {
            cat = 1;
            selected.clear();
            renderTags();
            zones.forEach(z => {
                z.style.pointerEvents = 'none';
                z.classList.remove('selected');
            });
        } 
        else {
            zones.forEach(z => z.style.pointerEvents = 'auto');

            if (!exposureType || selected.size === 0) {
                resetCategoryUI();
                return;
            }

            let hasHighRiskZone = false;
            selected.forEach(id => {
                const el = document.getElementById(id);
                if (el && HIGH_RISK.has(el.dataset.label)) hasHighRiskZone = true;
            });

            // Logic Fix: Bite OR Scratch and Bite OR High Risk = Category 3
            if (exposureType === 'Bite' || exposureType === 'Scratch and Bite' || hasHighRiskZone) {
                cat = 3;
            } else if (exposureType === 'Scratch') {
                cat = 2;
            }
        }

        // Update step 4 dropdown and visual UI
        if (CAT_INFO[cat]) {
            const info = CAT_INFO[cat];
            if(badge) {
                badge.className = 'cat-badge ' + info.cls;
                badge.textContent = 'Category ' + cat;
            }
            if(title) title.textContent = info.label;
            if(desc) desc.textContent = info.desc;
            
            if (hiddenCat) hiddenCat.value = cat;
            if (selectCat) {
                selectCat.value = cat;
                selectCat.dispatchEvent(new Event('change'));
            }
        }
    }

    function resetCategoryUI() {
        const badge = document.getElementById('cat-badge-auto');
        if(badge) { badge.className = 'cat-badge cat-none'; badge.textContent = '—'; }
        const title = document.getElementById('cat-auto-title');
        if(title) title.textContent = 'Select exposure type and wound site';
    }

    // ─── EVENT LISTENERS ───

    // Zone clicks (SVG)
    document.querySelectorAll('.zone').forEach(zone => {
        zone.addEventListener('click', function() {
            if (selected.has(this.id)) {
                selected.delete(this.id);
                this.classList.remove('selected');
            } else {
                selected.add(this.id);
                this.classList.add('selected');
            }
            renderTags(); // Update labels sa baba
            updateCategory(); // Update Category
        });
    });

    // Tag removal button
    document.getElementById('wound-tags').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-tag')) {
            const id = e.target.dataset.id;
            selected.delete(id);
            const el = document.getElementById(id);
            if (el) el.classList.remove('selected');
            renderTags();
            updateCategory();
        }
    });

    // Pills interaction
    document.querySelectorAll('.exp-pill').forEach(btn => {
        btn.addEventListener('click', function() {
            exposureType = this.dataset.val;
            document.querySelectorAll('.exp-pill').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const sel = document.getElementById('type_of_exposure_select');
            if (sel) sel.value = exposureType;
            
            updateCategory();
        });
    });

    // Sync Dropdown (Step 2) to Pills (Step 3)
    const expSelect = document.getElementById('type_of_exposure_select');
    if (expSelect) {
        expSelect.addEventListener('change', function() {
            exposureType = this.value;
            document.querySelectorAll('.exp-pill').forEach(b => 
                b.classList.toggle('active', b.dataset.val === exposureType));
            updateCategory();
        });
    }

    // Source of Exposure (Other Animal Toggle)
    const sourceSelect = document.getElementById('source_of_exposure');
    const otherContainer = document.getElementById('other_animal_container');
    const otherInput = document.getElementById('other_animal_details');
    
    if (sourceSelect) {
        sourceSelect.addEventListener('change', function() {
            const isOther = this.value === 'other animal';
            if (otherContainer) otherContainer.style.display = isOther ? 'flex' : 'none';
            if (otherInput) otherInput.required = isOther;
        });
    }

    // Restore old values (Laravel validation fail)
    const oldWound = document.getElementById('wound_site_input').value;
    if (oldWound) {
        const labelsArray = oldWound.split(',').map(s => s.trim());
        document.querySelectorAll('.zone').forEach(z => {
            if (labelsArray.includes(z.dataset.label)) {
                selected.add(z.id);
                z.classList.add('selected');
            }
        });
        renderTags();
        updateCategory();
    }
});
</script>

</body>
</html>

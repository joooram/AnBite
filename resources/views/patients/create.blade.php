<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Patient Registration</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    
    @include('layouts.sidebar')

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
        }

        /* ── MAIN CONTENT AREA ── */
        .main {
            /* Nilagyan natin ng margin-left para hindi matakpan ng sidebar ang form */
            margin-left: 256px; /* Katumbas ito ng w-64 sa Tailwind (16rem = 256px) */
            flex: 1;
            padding: 2rem;
            width: calc(100% - 256px);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .page-title { font-size: 1.3rem; font-weight: 700; color: #1a3a1a; }
        .page-sub { font-size: 0.82rem; color: #888; margin-top: 2px; }

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
        .error-box { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; font-size: 0.78rem; border-radius: 8px; padding: 10px 14px; margin-bottom: 1rem; }
        .success-box { background: #E1F5EE; border: 1px solid #5DCAA5; color: #0F6E56; font-size: 0.78rem; border-radius: 8px; padding: 10px 14px; margin-bottom: 1rem; }

        /* BUTTONS */
        .btn-row { display: flex; justify-content: flex-end; gap: 10px; margin-top: 1rem; }
        .btn-save { padding: 10px 32px; background: #1a3a1a; color: white; border: none; border-radius: 99px; font-size: 0.9rem; font-weight: 600; cursor: pointer; font-family: 'Segoe UI', sans-serif; }
        .btn-save:hover { background: #2d6a2d; }
        .btn-cancel { padding: 10px 24px; background: white; color: #888; border: 1.5px solid #ddd; border-radius: 99px; font-size: 0.9rem; cursor: pointer; font-family: 'Segoe UI', sans-serif; text-decoration: none; }
        .btn-cancel:hover { background: #f5f5f5; }

        /* ── BODY DIAGRAM ── */
        .diagram-wrap { display: flex; gap: 32px; justify-content: center; margin-bottom: 1.2rem; }
        .diagram-col { display: flex; flex-direction: column; align-items: center; gap: 6px; }
        .diagram-label { font-size: 0.72rem; font-weight: 600; color: #888; text-transform: uppercase; letter-spacing: 0.06em; }
        .body-svg { display: block; cursor: pointer; }
        .zone { fill: transparent; stroke: transparent; stroke-width: 4; cursor: pointer; transition: fill 0.15s; }
        .zone:hover { fill: rgba(26,58,26,0.12); }
        .zone.selected { fill: rgba(26,58,26,0.25); stroke: #1a3a1a; stroke-width: 1.5; }
        .wound-tags { display: flex; flex-wrap: wrap; gap: 6px; min-height: 28px; margin-bottom: 0.8rem; }
        .wound-tag { font-size: 0.75rem; padding: 3px 10px; border-radius: 99px; background: #e6f0e6; color: #1a3a1a; display: flex; align-items: center; gap: 5px; border: 0.5px solid #a8c8a8; }
        .wound-tag button { background: none; border: none; cursor: pointer; font-size: 13px; color: #1a3a1a; padding: 0; line-height: 1; }
        .diagram-hint { font-size: 0.76rem; color: #aaa; margin-top: 4px; }
        .no-site-placeholder { font-size: 0.78rem; color: #bbb; align-self: center; }
    </style>
</head>
<body>

    {{-- TINAWAG ANG SIDEBAR DITO --}}
    @include('layouts.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="main">

        <div class="page-header">
            <div>
                <div class="page-title">Patient Registration</div>
                <div class="page-sub">Add a new bite incident patient</div>
            </div>
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
                        <label>Contact Number <span style="color:#aaa;font-weight:400;">(Guardian/Relative)</span></label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="e.g. 09171234567">
                    </div>

                    <div class="form-group">
                        <label>Email Address <span style="color:#aaa;font-weight:400;">(optional)</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="e.g. juan@gmail.com">
                    </div>

                    <div class="form-group full">
                        <label>Address <span class="required-star">*</span></label>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. Brgy. Libjo, Batangas City" required>
                    </div>

                </div>
            </div>

            {{-- ── SECTION 2: HISTORY OF EXPOSURE ── --}}
            <div class="form-section">
                <div class="section-title">History of Exposure</div>
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

            {{-- ── SECTION 3: WOUND SITE (BODY DIAGRAM) ── --}}
            <div class="form-section">
                <div class="section-title">Wound Site</div>

                {{-- Hidden input that stores selected sites for form submission --}}
                <input type="hidden" name="wound_site" id="wound_site_input" value="{{ old('wound_site') }}">

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

                {{-- Selected tags --}}
                <div class="wound-tags" id="wound-tags">
                    <span class="no-site-placeholder" id="no-site-msg">No wound site selected</span>
                </div>

                <span class="diagram-hint">Click a body region to mark the wound site. Click again to deselect.</span>
            </div>

            {{-- ── SECTION 4: MONITORING INFORMATION ── --}}
            <div class="form-section">
                <div class="section-title">Monitoring Information</div>
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

            {{-- FORM BUTTONS --}}
            <div class="btn-row">
                <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">Save Patient</button>
            </div>

        </form>

    </main>

    {{-- ── BODY DIAGRAM SCRIPT ── --}}
    <script>
        const selected = new Set();

        // Pre-populate from old() value on validation fail
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
            const noMsg = document.getElementById('no-site-msg');
            const hiddenInput = document.getElementById('wound_site_input');

            container.innerHTML = '';

            if (selected.size === 0) {
                const placeholder = document.createElement('span');
                placeholder.className = 'no-site-placeholder';
                placeholder.id = 'no-site-msg';
                placeholder.textContent = 'No wound site selected';
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
    </script>

</body>
</html>
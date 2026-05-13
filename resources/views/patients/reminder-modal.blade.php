<!-- ============================================================
     VACCINE REMINDER MODAL
     Triggered by: .reminder-btn buttons in index.blade.php
     ============================================================ -->
<div class="modal fade" id="vaccineReminderModal" tabindex="-1" aria-labelledby="vaccineReminderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:none;border-radius:18px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.15);font-family:'Poppins',sans-serif;">

            {{-- HEADER --}}
            <div style="background:linear-gradient(135deg,#1a3a1a,#2d6a2d);padding:1.1rem 1.5rem;display:flex;justify-content:space-between;align-items:center;">
                <div style="display:flex;align-items:center;gap:10px;color:white;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity:0.85;">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.06 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/>
                    </svg>
                    <h5 class="modal-title" id="vaccineReminderModalLabel" style="color:white;font-weight:700;font-size:1rem;margin:0;">Vaccine Reminder</h5>
                </div>
                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                    style="background:rgba(255,255,255,0.15);border:none;color:white;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            {{-- FORM --}}
            <form action="{{ route('patients.sendReminder') }}" method="POST">
                @csrf
                <input type="hidden" name="patient_id" id="reminder-patient-id">

                <div style="padding:1.4rem;background:#f8faf9;">

                    {{-- Patient info display --}}
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:1rem;">

                        <div style="grid-column:1/-1;background:white;border:1px solid #ececec;border-radius:10px;padding:11px 14px;">
                            <div style="font-size:0.65rem;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.07em;margin-bottom:4px;">Full Name</div>
                            <div id="reminder-full-name" style="font-size:0.95rem;font-weight:700;color:#1a3a1a;">—</div>
                        </div>

                        <div style="background:white;border:1px solid #ececec;border-radius:10px;padding:11px 14px;">
                            <div style="font-size:0.65rem;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.07em;margin-bottom:4px;">Contact Number</div>
                            <div id="reminder-contact-number" style="font-size:0.88rem;font-weight:600;color:#1f2937;">—</div>
                        </div>

                        <div style="background:white;border:1px solid #ececec;border-radius:10px;padding:11px 14px;">
                            <div style="font-size:0.65rem;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.07em;margin-bottom:4px;">Email Address</div>
                            <div id="reminder-email" style="font-size:0.88rem;font-weight:600;color:#1f2937;word-break:break-all;">—</div>
                        </div>

                        <div style="grid-column:1/-1;background:white;border:1px solid #ececec;border-radius:10px;padding:11px 14px;">
                            <div style="font-size:0.65rem;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.07em;margin-bottom:4px;">Referred Clinic</div>
                            <div id="reminder-clinic" style="font-size:0.88rem;font-weight:600;color:#1f2937;">—</div>
                        </div>

                    </div>

                    <hr style="border:none;border-top:1px solid #e5e7eb;margin-bottom:1rem;">

                    {{-- Send options --}}
                    <div style="margin-bottom:1rem;">
                        <label style="font-size:0.7rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:0.05em;display:block;margin-bottom:6px;">
                            Send Options <span style="color:#dc2626;">*</span>
                        </label>
                        <div style="display:flex;gap:8px;flex-wrap:wrap;">
                            <label style="display:flex;align-items:center;gap:8px;padding:9px 16px;border:1.5px solid #e5e7eb;border-radius:10px;cursor:pointer;background:white;font-size:0.85rem;font-weight:500;color:#374151;transition:all 0.15s;" id="opt-sms">
                                <input type="radio" name="method" value="sms" style="accent-color:#2d6a2d;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                                SMS Only
                            </label>
                            <label style="display:flex;align-items:center;gap:8px;padding:9px 16px;border:1.5px solid #e5e7eb;border-radius:10px;cursor:pointer;background:white;font-size:0.85rem;font-weight:500;color:#374151;transition:all 0.15s;" id="opt-email">
                                <input type="radio" name="method" value="email" style="accent-color:#2d6a2d;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                Email Only
                            </label>
                            <label style="display:flex;align-items:center;gap:8px;padding:9px 16px;border:1.5px solid #2d6a2d;border-radius:10px;cursor:pointer;background:#f0fdf4;font-size:0.85rem;font-weight:600;color:#1a3a1a;transition:all 0.15s;" id="opt-both">
                                <input type="radio" name="method" value="both" checked style="accent-color:#2d6a2d;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                Both SMS &amp; Email
                            </label>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div>
                        <label style="font-size:0.7rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:0.05em;display:block;margin-bottom:6px;">
                            Message <span style="color:#dc2626;">*</span>
                        </label>
                        <textarea name="message" id="reminder-message" required rows="4"
                            style="width:100%;padding:10px 14px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.85rem;font-family:'Poppins',sans-serif;resize:vertical;outline:none;background:#fff;color:#1f2937;line-height:1.5;"
                            onfocus="this.style.borderColor='#2d6a2d';this.style.boxShadow='0 0 0 3px rgba(45,106,45,0.1)';"
                            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';"></textarea>
                    </div>

                </div>

                {{-- FOOTER --}}
                <div style="background:white;border-top:1px solid #f0f0f0;padding:0.9rem 1.4rem;display:flex;justify-content:flex-end;gap:8px;">
                    <button type="button" data-bs-dismiss="modal"
                        style="padding:9px 20px;background:#f3f4f6;color:#6b7280;border:none;border-radius:8px;font-size:0.82rem;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;">
                        Cancel
                    </button>
                    <button type="submit"
                        style="padding:9px 24px;background:linear-gradient(135deg,#1a3a1a,#2d6a2d);color:white;border:none;border-radius:8px;font-size:0.82rem;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;display:inline-flex;align-items:center;gap:6px;box-shadow:0 4px 12px rgba(45,106,45,0.28);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Send Reminder
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

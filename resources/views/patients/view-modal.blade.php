<!-- ============================================================
     VIEW PATIENT MODAL
     Triggered by: .btn-view buttons in index.blade.php
     ============================================================ -->
<div class="modal fade" id="viewPatientModal" tabindex="-1" aria-labelledby="viewPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" id="vm-modal-content">

            {{-- HEADER --}}
            <div class="modal-header" id="vm-header">
                <div class="vm-header-left">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity:0.85;">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <h5 class="modal-title" id="viewPatientModalLabel">Patient Details</h5>
                </div>
                <button type="button" class="vm-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            {{-- BODY --}}
            <div class="modal-body" id="vm-body">
                <div class="vm-grid">

                    <div class="vm-field vm-full">
                        <div class="vm-label">Full Name</div>
                        <div class="vm-value" id="detail-full-name">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Age / Sex</div>
                        <div class="vm-value" id="detail-age-sex">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Contact Number</div>
                        <div class="vm-value" id="detail-contact-number">—</div>
                    </div>

                    <div class="vm-field vm-full">
                        <div class="vm-label">Address</div>
                        <div class="vm-value" id="detail-address">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Date of Exposure</div>
                        <div class="vm-value" id="detail-date-of-exposure">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Place of Exposure</div>
                        <div class="vm-value" id="detail-place-of-exposure">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Type of Exposure</div>
                        <div class="vm-value" id="detail-type-of-exposure">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Source of Exposure</div>
                        <div class="vm-value" id="detail-source-of-exposure">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Wound Site</div>
                        <div class="vm-value" id="detail-wound-site">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Bite Category</div>
                        <div class="vm-value" id="detail-bite-category">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Referred Clinic</div>
                        <div class="vm-value" id="detail-referred-clinic">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Vaccine Days</div>
                        <div class="vm-value" id="detail-vaccine-days">—</div>
                    </div>

                    <div class="vm-field vm-full" id="vm-medical-row">
                        <div class="vm-label">Medical History / Known Allergies</div>
                        <div class="vm-value" id="detail-medical-history">—</div>
                    </div>

                </div>
            </div>

{{-- FOOTER --}}
<div class="modal-footer">
    <button type="button" class="btn-print" onclick="window.print()">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17 17h2a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h2"></path>
            <path d="M17 9V5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v4"></path>
            <path d="M15 13H9a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Z"></path>
        </svg>
        Print Record
    </button>

    <button type="button" class="vm-btn vm-btn-secondary" data-bs-dismiss="modal">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"></path>
            <path d="M9 14.996h3l8.5-8.5a2.121 2.121 0 0 0-3-3l-8.5 8.5v3Z"></path>
            <path d="m16 5 3 3"></path>
        </svg>
        Edit
    </button>
</div>
</div>
</div>
</div>



<style>
    #viewPatientModal .modal-content {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        font-family: 'Poppins', sans-serif;
    }

    #viewPatientModal .modal-header {
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        padding: 1.1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
    }

    #viewPatientModal .vm-header-left {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
    }

    #viewPatientModal .modal-title {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        margin: 0;
    }

    #viewPatientModal .vm-close-btn {
        background: rgba(255,255,255,0.15);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    #viewPatientModal .vm-close-btn:hover { background: rgba(255,255,255,0.28); }

    #viewPatientModal .modal-body {
        padding: 1.4rem;
        background: #f8faf9;
    }

    #viewPatientModal .vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    #viewPatientModal .vm-full { grid-column: 1 / -1; }

    #viewPatientModal .vm-field {
        background: white;
        border: 1px solid #ececec;
        border-radius: 10px;
        padding: 11px 14px;
    }

    #viewPatientModal .vm-label {
        font-size: 0.65rem;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        margin-bottom: 4px;
    }

    #viewPatientModal .vm-value {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1f2937;
        min-height: 18px;
    }

    /* FOOTER FIX - Pinagsama ang flex logic */
    #viewPatientModal .modal-footer {
        background: white;
        border-top: 1px solid #f0f0f0;
        padding: 0.9rem 1.4rem;
        display: flex !important; /* Force Side-by-Side */
        flex-direction: row !important;
        justify-content: flex-end;
        gap: 12px; 
    }

#viewPatientModal .vm-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;        /* Mas malawak na gap para sa malaking icon */
        padding: 12px 24px; /* Dinagdagan ang padding (Dating 8px 18px) */
        border-radius: 10px;
        font-size: 1rem;    /* Ginawang 1rem (Dating 0.82rem) */
        font-weight: 600;
        border: none;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: all 0.2s ease;
    }

    #viewPatientModal .vm-btn-secondary {
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        color: #f8f8f8;
    }

    #viewPatientModal .vm-btn-secondary:hover { opacity: 0.9; }

    /* PRINT BUTTON STYLE */
#viewPatientModal .btn-print {
        background: linear-gradient(135deg, #24452e, #355840);
        color: white;
        border: none;
        padding: 12px 24px; /* Dinagdagan ang padding (Dating 8px 18px) */
        border-radius: 10px;
        font-size: 1rem;    /* Ginawang 1rem (Dating 0.82rem) */
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 10px;        /* Mas malawak na gap */
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    /* Hover effects para sa premium feel */
    #viewPatientModal .btn-print:hover, 
    #viewPatientModal .vm-btn:hover{
        opacity: 0.9;
        transform: translateY(-2px); /* Bahagyang aangat pag ni-hover */
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

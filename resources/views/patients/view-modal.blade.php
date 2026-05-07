<!-- View Patient Modal -->
<div class="modal fade" id="viewPatientModal" tabindex="-1" aria-labelledby="viewPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">
                <div class="modal-header-left">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity:0.8;">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <h5 class="modal-title" id="viewPatientModalLabel">Patient Details</h5>
                </div>
                <button type="button" class="vm-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            {{-- BODY --}}
            <div class="modal-body">

                {{-- 2-column grid --}}
                <div class="vm-grid">

                    <div class="vm-field">
                        <div class="vm-label">Full Name</div>
                        <div class="vm-value" id="detail-full-name">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Age / Sex</div>
                        <div class="vm-value" id="detail-age-sex">—</div>
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
                        <div class="vm-label">Contact Number</div>
                        <div class="vm-value" id="detail-contact-number">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Type of Exposure</div>
                        <div class="vm-value" id="detail-type-of-exposure">—</div>
                    </div>

                    <div class="vm-field">
                        <div class="vm-label">Source of Exposure</div>
                        <div class="vm-value" id="detail-source-of-exposure">—</div>
                    </div>

                    <div class="vm-field vm-full">
                        <div class="vm-label">Vaccination Status</div>
                        <div class="vm-value" id="detail-vaccination-status">—</div>
                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="modal-footer vm-footer">
                <button type="button" class="vm-btn vm-btn-secondary" data-bs-dismiss="modal">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                    Close
                </button>
                <div style="display:flex;gap:8px;">
                    <button type="button" class="vm-btn vm-btn-edit" id="vm-edit-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                        Edit
                    </button>
                    <button type="button" class="vm-btn vm-btn-save" id="vm-save-btn" style="display:none;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* === VIEW MODAL STYLES === */
    #viewPatientModal .modal-content {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    #viewPatientModal .modal-header {
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        color: white;
        padding: 1.1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
    }

    #viewPatientModal .modal-header-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #viewPatientModal .modal-title {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        margin: 0;
        letter-spacing: 0.02em;
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
        flex-shrink: 0;
    }

    #viewPatientModal .vm-close-btn:hover {
        background: rgba(255,255,255,0.28);
    }

    #viewPatientModal .modal-body {
        padding: 1.6rem;
        background: #f8faf9;
    }

    /* 2-column grid */
    #viewPatientModal .vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    #viewPatientModal .vm-full {
        grid-column: 1 / -1;
    }

    #viewPatientModal .vm-field {
        background: white;
        border: 1px solid #ececec;
        border-radius: 10px;
        padding: 12px 14px;
        transition: border-color 0.2s;
    }

    #viewPatientModal .vm-field:hover {
        border-color: #c8e6c9;
    }

    #viewPatientModal .vm-label {
        font-size: 0.68rem;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        margin-bottom: 5px;
    }

    #viewPatientModal .vm-value {
        font-size: 0.92rem;
        font-weight: 600;
        color: #1f2937;
        min-height: 20px;
    }

    /* Footer */
    #viewPatientModal .vm-footer {
        background: white;
        border-top: 1px solid #f0f0f0;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #viewPatientModal .vm-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 18px;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        font-family: inherit;
    }

    #viewPatientModal .vm-btn-secondary {
        background: #f3f4f6;
        color: #6b7280;
    }

    #viewPatientModal .vm-btn-secondary:hover {
        background: #e5e7eb;
        color: #374151;
    }

    #viewPatientModal .vm-btn-edit {
        background: #e0f2e9;
        color: #1a5c2a;
    }

    #viewPatientModal .vm-btn-edit:hover {
        background: #c6e8d1;
    }

    #viewPatientModal .vm-btn-save {
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        color: white;
    }

    #viewPatientModal .vm-btn-save:hover {
        opacity: 0.9;
    }
</style>

<script>
    // Toggle Edit / Save buttons
    document.addEventListener('DOMContentLoaded', function () {
        const editBtn = document.getElementById('vm-edit-btn');
        const saveBtn = document.getElementById('vm-save-btn');

        if (editBtn && saveBtn) {
            editBtn.addEventListener('click', function () {
                editBtn.style.display = 'none';
                saveBtn.style.display = 'inline-flex';
            });

            saveBtn.addEventListener('click', function () {
                // TODO: wire up actual save logic here
                saveBtn.style.display = 'none';
                editBtn.style.display = 'inline-flex';
            });

            // Reset buttons when modal closes
            document.getElementById('viewPatientModal').addEventListener('hidden.bs.modal', function () {
                saveBtn.style.display = 'none';
                editBtn.style.display = 'inline-flex';
            });
        }
    });
</script>

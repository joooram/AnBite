<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    /* === OVERLAY === */
    #addStaffModal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.45);
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    /* === MODAL BOX === */
    .am-modal-box {
        background: #ffffff;
        width: 100%;
        max-width: 460px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.18);
        animation: amSlideIn 0.22s ease;
    }

    @keyframes amSlideIn {
        from { opacity: 0; transform: translateY(-16px) scale(0.98); }
        to   { opacity: 1; transform: translateY(0)     scale(1);    }
    }

    /* === HEADER === */
    .am-modal-header {
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        padding: 1.1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .am-modal-header-left {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
    }

    .am-modal-header-left svg {
        opacity: 0.85;
        flex-shrink: 0;
    }

    .am-modal-title {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        margin: 0;
        letter-spacing: 0.02em;
    }

    .am-close-btn {
        background: rgba(255, 255, 255, 0.15);
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

    .am-close-btn:hover {
        background: rgba(255, 255, 255, 0.28);
    }

    /* === BODY === */
    .am-modal-body {
        padding: 1.6rem;
        background: #f8faf9;
    }

    .am-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .am-form-group {
        display: flex;
        flex-direction: column;
    }

    .am-form-group.full {
        grid-column: 1 / -1;
    }

    .am-label {
        font-size: 0.68rem;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 6px;
    }

    .am-required {
        color: #dc2626;
    }

    .am-input {
        padding: 10px 13px;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        font-size: 0.88rem;
        background: #ffffff;
        font-family: 'Poppins', sans-serif;
        color: #1f2937;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        width: 100%;
    }

    .am-input:focus {
        border-color: #2d6a2d;
        box-shadow: 0 0 0 3px rgba(45, 106, 45, 0.1);
    }

    .am-input::placeholder {
        color: #c4c9d4;
    }

    /* === FOOTER === */
    .am-modal-footer {
        background: white;
        border-top: 1px solid #f0f0f0;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    .am-btn-cancel {
        padding: 9px 20px;
        background: white;
        color: #6b7280;
        border: 1.5px solid #e5e7eb;
        border-radius: 99px;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: background 0.15s, border-color 0.15s;
    }

    .am-btn-cancel:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #374151;
    }

    .am-btn-save {
        padding: 9px 24px;
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        color: white;
        border: none;
        border-radius: 99px;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 4px 12px rgba(45, 106, 45, 0.28);
        transition: opacity 0.15s, transform 0.1s;
    }

    .am-btn-save:hover {
        opacity: 0.92;
        transform: translateY(-1px);
    }

    .am-btn-save:active {
        transform: translateY(0);
    }
</style>

{{-- ADD STAFF MODAL --}}
<div id="addStaffModal">
    <div class="am-modal-box">

        {{-- HEADER --}}
        <div class="am-modal-header">
            <div class="am-modal-header-left">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="8.5" cy="7" r="4"/>
                    <line x1="20" y1="8" x2="20" y2="14"/>
                    <line x1="23" y1="11" x2="17" y2="11"/>
                </svg>
                <h5 class="am-modal-title">Add New CHO Staff Account</h5>
            </div>
            <button type="button" class="am-close-btn" onclick="closeModal()" aria-label="Close">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        {{-- BODY --}}
        <div class="am-modal-body">
            <form id="addStaffForm" action="{{ route('admin.storeStaff') }}" method="POST">
                @csrf
                <div class="am-form-grid">

                    <div class="am-form-group">
                        <label class="am-label">First Name <span class="am-required">*</span></label>
                        <input type="text" name="first_name" class="am-input" placeholder="e.g. Juan" required>
                    </div>

                    <div class="am-form-group">
                        <label class="am-label">Last Name <span class="am-required">*</span></label>
                        <input type="text" name="last_name" class="am-input" placeholder="e.g. Dela Cruz" required>
                    </div>

                    <div class="am-form-group full">
                        <label class="am-label">Username <span class="am-required">*</span></label>
                        <input type="text" name="username" class="am-input" placeholder="e.g. cho_staff7" required>
                    </div>

                    <div class="am-form-group full">
                        <label class="am-label">Password <span class="am-required">*</span></label>
                        <input type="password" name="password" class="am-input" placeholder="Enter a secure password" required>
                    </div>

                </div>
            </form>
        </div>

        {{-- FOOTER --}}
        <div class="am-modal-footer">
            <button type="button" class="am-btn-cancel" onclick="closeModal()">Cancel</button>
            <button type="submit" form="addStaffForm" class="am-btn-save">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Save Account
            </button>
        </div>

    </div>
</div>

<script>
    function openModal() {
        document.getElementById('addStaffModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('addStaffModal').style.display = 'none';
    }

    // Close when clicking the backdrop
    document.getElementById('addStaffModal').addEventListener('click', function (e) {
        if (e.target === this) closeModal();
    });
</script>

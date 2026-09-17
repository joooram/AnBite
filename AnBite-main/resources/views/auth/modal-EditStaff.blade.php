<style>
    #editStaffModal {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.45);
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    #editStaffModal .am-modal-box {
        animation: amSlideIn 0.22s ease;
    }
</style>

<div id="editStaffModal">
    <div class="am-modal-box">

        {{-- HEADER --}}
        <div class="am-modal-header">
            <div class="am-modal-header-left">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
                <h5 class="am-modal-title">Edit Staff Account</h5>
            </div>
            <button type="button" class="am-close-btn" onclick="closeEditModal()" aria-label="Close">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        {{-- BODY --}}
        <div class="am-modal-body">
            <form id="editStaffForm" method="POST">
                @csrf
                @method('PUT')
                <div class="am-form-grid">

                    <div class="am-form-group">
                        <label class="am-label">First Name <span class="am-required">*</span></label>
                        <input type="text" name="first_name" id="edit_first_name" class="am-input" placeholder="e.g. Juan" required>
                    </div>

                    <div class="am-form-group">
                        <label class="am-label">Last Name <span class="am-required">*</span></label>
                        <input type="text" name="last_name" id="edit_last_name" class="am-input" placeholder="e.g. Dela Cruz" required>
                    </div>

                    <div class="am-form-group full">
                        <label class="am-label">Username <span class="am-required">*</span></label>
                        <input type="text" name="username" id="edit_username" class="am-input" placeholder="e.g. cho_staff7" required>
                    </div>

                </div>
            </form>
        </div>

        {{-- FOOTER --}}
        <div class="am-modal-footer">
            <button type="button" class="am-btn-cancel" onclick="closeEditModal()">Cancel</button>
            <button type="submit" form="editStaffForm" class="am-btn-save">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Save Changes
            </button>
        </div>

    </div>
</div>

<script>
    function openEditModal(id, firstName, lastName, username) {
        document.getElementById('edit_first_name').value = firstName;
        document.getElementById('edit_last_name').value  = lastName;
        document.getElementById('edit_username').value   = username;

        // Set the form action dynamically
        document.getElementById('editStaffForm').action = '/admin/staff/' + id;

        document.getElementById('editStaffModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editStaffModal').style.display = 'none';
    }

    // Close on backdrop click
    document.getElementById('editStaffModal').addEventListener('click', function (e) {
        if (e.target === this) closeEditModal();
    });
</script>

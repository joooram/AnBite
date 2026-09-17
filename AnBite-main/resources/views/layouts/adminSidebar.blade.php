<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f6;
        display: flex;
        min-height: 100vh;
    }

    /* === SIDEBAR === */
    .sidebar {
        width: 247px;
        min-width: 230px;
        background: #071907;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        padding: 1.5rem 0.8rem;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
    }

    .sidebar-logo {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 90px;
        width: 100%;
        padding-bottom: 1.5rem;
        margin-bottom: 1rem;
        flex-shrink: 0;
        gap: 8px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-image {
        width: 45px;
        height: 45px;
        object-fit: contain;
    }

    .brand-name {
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .nav-label {
        color: rgba(255,255,255,0.4);
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin: 1rem 0 0.5rem 1rem;
    }

    .nav-menu-wrapper {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0 1rem;
        height: 48px;
        color: #bbb;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
        font-size: 0.9rem;
        white-space: nowrap;
    }

    .nav-item svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .nav-item:hover {
        background: rgba(255,255,255,0.08);
        color: #fff;
    }

    .nav-item.active {
        background: #2d6a2d;
        color: #fff;
        font-weight: 500;
        border-left: 4px solid #4ade80;
    }

    .sidebar-footer {
        margin-top: auto;
        padding: 1rem 0;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    /* === SHARED MAIN LAYOUT === */
    .main {
        margin-left: 230px;
        flex: 1;
        padding: 2rem;
        min-height: 100vh;
    }

    /* === SHARED TOPBAR === */
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

    .topbar-user {
        display: flex;
        align-items: center;
        gap: 10px;
        background: white;
        padding: 8px 16px;
        border-radius: 99px;
        border: 0.5px solid #e0e0e0;
        font-size: 0.85rem;
        color: #1a3a1a;
        font-weight: 500;
    }

    .user-avatar {
        width: 30px;
        height: 30px;
        background: #1a3a1a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.72rem;
        color: white;
        font-weight: 700;
    }

    /* === SHARED PANEL === */
    .panel {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #f0f0f0;
        padding: 1.4rem;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 1.5rem;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.2rem;
    }

    .panel-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #1a3a1a;
    }

    .panel-sub {
        font-size: 0.75rem;
        color: #888;
        margin-top: 2px;
    }

    /* === SHARED STAT CARDS === */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.2rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.4rem;
        border: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        position: relative;
        overflow: hidden;
        transition: all 0.25s ease;
        box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    }

    .stat-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(to bottom, #2d6a2d, #6abf69);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
    }

    .stat-label {
        font-size: 0.7rem;
        color: #6b7280;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .stat-num {
        font-size: 2.2rem;
        font-weight: 800;
        color: #111827;
    }

    .stat-sub {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 4px;
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.95;
        flex-shrink: 0;
    }

    .stat-icon svg {
        width: 22px;
        height: 22px;
    }

    /* === SHARED TABLE === */
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.82rem;
    }

    thead th {
        text-align: left;
        padding: 10px 14px;
        background: #ecfdf5;
        color: #374151;
        font-weight: 600;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    thead th:first-child { border-radius: 8px 0 0 8px; }
    thead th:last-child  { border-radius: 0 8px 8px 0; }

    tbody td {
        padding: 11px 14px;
        color: #444;
        border-bottom: 0.5px solid #f5f5f5;
        vertical-align: middle;
    }

    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover { background: #fafafa; }

    /* === SHARED BADGES === */
    .badge {
        display: inline-block;
        font-size: 0.68rem;
        padding: 3px 10px;
        border-radius: 99px;
        font-weight: 600;
    }

    .badge-active   { background: #dcfce7; color: #166534; }
    .badge-inactive { background: #f3f4f6; color: #6b7280; }
    .badge-admin    { background: #e0f2fe; color: #0369a1; }
    .badge-staff    { background: #fef9c3; color: #854d0e; }

    /* === SHARED BUTTONS === */
    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 16px;
        background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
        color: white;
        border-radius: 99px;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-add:hover { background: #2d6a2d; }

    .action-btn {
        font-size: 0.72rem;
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        background: white;
        color: #374151;
        cursor: pointer;
        margin-right: 4px;
        transition: all 0.2s;
    }

    .action-btn:hover { background: #f3f4f6; }

    .action-btn.danger {
        border-color: #fca5a5;
        color: #dc2626;
    }

    .action-btn.danger:hover { background: #fef2f2; }

    /* === SHARED USER CELL === */
    .user-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .table-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #1a3a1a;
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* === SHARED FORM INPUTS === */
    .pw-input {
        padding: 7px 10px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        font-size: 0.8rem;
        font-family: 'Poppins', sans-serif;
        flex-grow: 1;
        outline: none;
        transition: border 0.2s;
    }

    .pw-input:focus { border-color: #2d6a2d; }

    .reset-pw-form {
        display: flex;
        gap: 8px;
        align-items: center;
    }
</style>

<aside class="sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('images/2ndlogo.png') }}" alt="AnBite Logo" class="logo-image">
        <span class="brand-name">ANBITE</span>
    </div>

    <div class="nav-label">Main Menu</div>

    <div class="nav-menu-wrapper">
        <a href="{{ route('admin.adminDashboard') }}" class="nav-item {{ request()->routeIs('admin.adminDashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.accounts') }}" class="nav-item {{ request()->routeIs('admin.accounts') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            <span>Account Management</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <a href="{{ route('logout') }}" class="nav-item logout">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span>Logout</span>
        </a>
    </div>
</aside>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap');

    .sidebar { 
        width: 230px; 
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
    }

    /* NA-UPDATE PARA MAGKAROON NG LINYA SA IBABA */
    .sidebar-logo { 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        justify-content: center; 
        min-height: 90px; 
        width: 100%; 
        padding-bottom: 1.5rem; /* Nagbigay ng space sa pagitan ng text at ng linya */
        margin-bottom: 1rem; /* Space sa ilalim ng linya papunta sa "MAIN MENU" */
        flex-shrink: 0;    
        gap: 8px; 
        border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* ITO ANG LINYA NA KULAY GRAY/TRANSPARENT WHITE */
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

    .nav-item svg { 
        width: 20px; 
        height: 20px; 
        flex-shrink: 0; 
    }

    .nav-item span {
        font-size: 0.9rem;
        white-space: nowrap;
    }

    /* Hover State */
    .nav-item:hover { 
        background: rgba(255,255,255,0.08); 
        color: #fff; 
    }

    /* Active State */
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
</style>

<aside class="sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('images/2ndlogo.png') }}" alt="AnBite Logo" class="logo-image">
        <span class="brand-name">ANBITE</span>
    </div>

    <div class="nav-label">Main Menu</div>

    <div class="nav-menu-wrapper">
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('patients.create') }}" class="nav-item {{ request()->routeIs('patients.create') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            <span>Patient Registration</span>
        </a>

        <a href="{{ route('patients.index') }}" class="nav-item {{ request()->routeIs('patients.index') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span>Patient Records</span>
        </a>

        <a href="{{ route('hotspot') }}" class="nav-item {{ request()->routeIs('hotspot') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="10" r="3"/><path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z"/></svg>
            <span>Hotspot Map</span>
        </a>

        <a href="{{ route('charts') }}" class="nav-item {{ request()->routeIs('charts') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            <span>Charts & Reports</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <a href="{{ route('logout') }}" class="nav-item logout">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span>Logout</span>
        </a>
    </div>
</aside>
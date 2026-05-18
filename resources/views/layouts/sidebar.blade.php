<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    /* GLOBAL FONT */
    .sidebar,
    .sidebar * {
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box; /* Sinisigurong sakop ng width ang padding */
    }

    body {
        margin: 0;
        padding: 0;
    }

    /* SIDEBAR */
    .sidebar { 
        width: 230px; 
        min-width: 230px; 
        max-width: 230px; /* Ipinako ang sukat para hindi lumaki kailanman */
        background: #071907; 
        min-height: 100vh; 
        display: flex; 
        flex-direction: column; 
        padding: 1.5rem 0.8rem; 
        position: fixed; 
        top: 0; 
        left: 0; 
        z-index: 9999;
        transition: all 0.35s ease;
        overflow-x: hidden; /* Pinipigilan ang pag-overflow pakanan */
        overflow-y: auto;   /* Pwedeng mag-scroll pababa kung madaming menu */
        box-shadow: 4px 0 18px rgba(0,0,0,0.15);
    }

    /* COLLAPSED */
    .sidebar.collapsed {
        width: 78px;
        min-width: 78px;
        max-width: 78px;
    }

    .sidebar.collapsed .brand-name,
    .sidebar.collapsed .nav-label,
    .sidebar.collapsed .nav-item span {
        opacity: 0;
        visibility: hidden;
        width: 0;
        display: none; /* Tinatanggal sa layout flow kapag nakasara */
    }

    .sidebar.collapsed .nav-item {
        justify-content: center;
        padding: 0;
    }

    /* LABEL */
    .nav-label { 
        color: rgba(255,255,255,0.4); 
        font-size: 0.7rem; 
        text-transform: uppercase; 
        letter-spacing: 1.2px; 
        margin: 1rem 0 0.5rem 1rem;
    }

    /* MENU */
    .nav-menu-wrapper {
        display: flex;
        flex-direction: column;
        gap: 4px;
        width: 100%;
    }

    /* ITEM (TINAMAAN AT INAYOS PARA SA TEXT-WRAPPING) */
    .nav-item { 
        display: flex; 
        align-items: center; 
        gap: 12px; 
        padding: 0.5rem 1rem; /* Pinalitan mula height:50px para mag-adjust ang taas base sa linya ng text */
        min-height: 50px; 
        width: 100%;
        color: #bbb; 
        text-decoration: none; 
        border-radius: 10px; 
        transition: all 0.25s ease;
        border-left: 4px solid transparent;
        position: relative;
        overflow: hidden;
    }

    /* TINAMAAN NA SPAN TAG */
    .nav-item span {
        font-size: 0.92rem;
        font-weight: 400;
        white-space: normal !important;  /* PINAPAYAGANG MAGBABA NG LINYA ANG TEXT */
        word-wrap: break-word !important; /* PINAPALIPAT SA BABA KAPAG MAHABANG SALITA */
        line-height: 1.3 !important;      /* MAGANDANG SPACING SA PAGITAN NG DALAWANG LINYA */
        text-align: left;
        flex: 1; /* Kinukuha ang natitirang espasyo sa tabi ng icon */
    }

    .nav-item svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0; /* Pinipigilan ang icon na mapikit o mayumak kapag bumaba ang text */
    }

    /* HOVER */
    .nav-item:hover { 
        background: rgba(255,255,255,0.08); 
        color: #fff;
        transform: translateX(4px);
    }

    /* ACTIVE */
    .nav-item.active { 
        background: #2d6a2d; 
        color: #fff; 
        font-weight: 500;
        border-left: 4px solid #4ade80;
    }

    .nav-item.active span {
        font-weight: 500;
    }

    /* LOGO */
    .sidebar-logo { 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        justify-content: center; 
        min-height: 90px; 
        width: 100%; 
        padding-bottom: 1.5rem;
        margin-bottom: 1rem;
        gap: 8px; 
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .logo-image {
        width: 45px; 
        height: 45px;
        object-fit: contain;
    }

    .brand-name {
        color: #fff;
        font-size: 1.25rem; 
        font-weight: 600;
        letter-spacing: 2px;
    }

    /* FOOTER */
    .sidebar-footer { 
        margin-top: auto; 
        padding: 1rem 0;
        border-top: 1px solid rgba(255,255,255,0.1);
        width: 100%;
    }
</style>

<aside class="sidebar" id="sidebar">

    <div class="sidebar-logo">
        <img src="{{ asset('images/2ndlogo.png') }}" class="logo-image">
        <span class="brand-name">ANBITE</span>
    </div>

    <div class="nav-label">Main Menu</div>

    <div class="nav-menu-wrapper">

        <a href="{{ route('dashboard') }}"
           class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="3" y="14" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
            </svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('patients.create') }}"
           class="nav-item {{ request()->routeIs('patients.create') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="8.5" cy="7" r="4"/>
                <line x1="20" y1="8" x2="20" y2="14"/>
                <line x1="23" y1="11" x2="17" y2="11"/>
            </svg>
            <span>Patient Registration</span>
        </a>

        <a href="{{ route('patients.index') }}"
           class="nav-item {{ request()->routeIs('patients.index') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            <span>Patient Records</span>
        </a>

        <a href="{{ route('hotspot') }}"
           class="nav-item {{ request()->routeIs('hotspot') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="10" r="3"/>
                <path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z"/>
            </svg>
            <span>Heatmap</span>
        </a>

        <a href="{{ route('charts') }}"
           class="nav-item {{ request()->routeIs('charts') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="20" x2="18" y2="10"/>
                <line x1="12" y1="20" x2="12" y2="4"/>
                <line x1="6" y1="20" x2="6" y2="14"/>
            </svg>
            <span>Charts & Reports</span>
        </a>

        <a href="{{ route('ai.decision') }}"
           class="nav-item {{ request()->routeIs('ai.decision') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="M12 8v4"/>
                <path d="M12 16h.01"/>
            </svg>
            <span>AI Decision Support</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <a href="{{ route('logout') }}" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
            <span>Logout</span>
        </a>
    </div>

</aside>
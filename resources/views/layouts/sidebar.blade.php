<style>
    /* Dito nakalagay ang design ng sidebar mo para hindi masira sa ibang pages */
    .sidebar { width: 230px; background: #1a3a1a; min-height: 100vh; display: flex; flex-direction: column; padding: 1.5rem 1rem; position: fixed; top: 0; left: 0; z-index: 100; }
    .sidebar-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .logo-circle { width: 36px; height: 36px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .logo-circle svg { width: 18px; height: 18px; }
    .logo-text { font-size: 1.2rem; font-weight: 800; color: white; }
    .nav-label { color: #888; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; padding-left: 0.5rem; }
    .nav-item { display: flex; align-items: center; gap: 12px; padding: 0.8rem 1rem; color: #bbb; text-decoration: none; border-radius: 8px; margin-bottom: 0.5rem; transition: 0.2s; }
    .nav-item svg { width: 20px; height: 20px; }
    .nav-item:hover { background: rgba(255,255,255,0.05); color: white; }
    .nav-item.active { background: #2d6a2d; color: white; }
    .sidebar-footer { margin-top: auto; padding-top: 1rem; border-top: 1px solid rgba(255,255,255,0.1); }
</style>

<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-circle">
            <svg viewBox="0 0 42 42" fill="none">
                <circle cx="21" cy="21" r="20" stroke="#1a3a1a" stroke-width="1.5"/>
                <rect x="19" y="10" width="4" height="22" rx="2" fill="#1a3a1a"/>
                <rect x="10" y="19" width="22" height="4" rx="2" fill="#1a3a1a"/>
            </svg>
        </div>
        <span class="logo-text">AnBite</span>
    </div>

    <div class="nav-label">Main Menu</div>

    {{-- 1. Dashboard --}}
    <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
        Dashboard
    </a>

    {{-- 2. Patient Registration --}}
    <a href="{{ route('patients.create') }}" class="nav-item {{ request()->routeIs('patients.create') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
        Patient Registration
    </a>

    {{-- 3. Patient Records --}}
    <a href="{{ route('patients.index') }}" class="nav-item {{ request()->routeIs('patients.index') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Patient Records
    </a>

    {{-- 4. Hotspot Map --}}
    <a href="{{ route('hotspot') }}" class="nav-item {{ request()->routeIs('hotspot') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="10" r="3"/><path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z"/></svg>
        Hotspot Map
    </a>

    {{-- 5. Charts --}}
    <a href="{{ route('charts') }}" class="nav-item {{ request()->routeIs('charts') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        Charts & Reports
    </a>

    <div class="sidebar-footer">
        <a href="{{ route('logout') }}" class="nav-item logout">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            Logout
        </a>
    </div>
</aside>
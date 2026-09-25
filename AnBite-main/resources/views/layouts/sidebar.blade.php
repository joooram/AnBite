<style>
    html,
    body {
        overflow-x: hidden !important;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        width: 230px;
        min-width: 230px;
        max-width: 230px;
        height: 100vh;
        min-height: 100vh;
        padding: 20px 12px;
        overflow-x: hidden;
        overflow-y: auto;
        box-sizing: border-box;
        border-right: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 0 30px 30px 0;
        background: linear-gradient(
            180deg,
            #061706 0%,
            #09210d 48%,
            #0d2c14 100%
        );
        box-shadow: 8px 0 30px rgba(0, 0, 0, 0.18);
        font-family: 'Poppins', sans-serif !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        transition:
            width 350ms ease-in-out,
            min-width 350ms ease-in-out,
            max-width 350ms ease-in-out,
            padding 350ms ease-in-out;
    }

    .sidebar,
    .sidebar button,
    .sidebar a,
    .sidebar span,
    .sidebar div {
        font-family: 'Poppins', sans-serif !important;
    }

    .sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.12);
    }

    .sidebar * {
        box-sizing: border-box;
    }

    .sidebar.collapsed {
        width: 78px !important;
        min-width: 78px !important;
        max-width: 78px !important;
        padding: 18px 10px;
    }

    body.sidebar-expanded main {
        margin-left: 230px !important;
    }

    body.sidebar-collapsed main {
        margin-left: 78px !important;
    }

    body.sidebar-expanded main,
    body.sidebar-collapsed main {
        transition: margin-left 350ms ease-in-out !important;
    }

    .sidebar-logo {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 106px;
        margin: 0 0 22px 0;
        padding: 12px 10px;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        outline: none;
        background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.07),
            rgba(255, 255, 255, 0.025)
        );
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.05),
            0 8px 22px rgba(0, 0, 0, 0.08);
        transition:
            min-height 350ms ease-in-out,
            height 350ms ease-in-out,
            margin-bottom 350ms ease-in-out,
            padding 350ms ease-in-out,
            border-color 250ms ease,
            background 250ms ease,
            box-shadow 250ms ease;
    }

    .sidebar-logo:hover {
        border-color: rgba(255, 255, 255, 0.14);
        background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.09),
            rgba(255, 255, 255, 0.035)
        );
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.06),
            0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .sidebar-logo:focus-visible {
        box-shadow:
            0 0 0 2px rgba(74, 222, 128, 0.45),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
    }

    .logo-pair {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 10px;
        transition: gap 350ms ease-in-out;
    }

    .anbite-logo,
    .cho-logo {
        display: block;
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        object-fit: contain;
        border-radius: 50%;
        transition:
            width 350ms ease-in-out,
            height 350ms ease-in-out,
            transform 250ms ease,
            opacity 250ms ease;
    }

    .sidebar-logo:hover .anbite-logo,
    .sidebar-logo:hover .cho-logo {
        transform: scale(1.04);
    }

    .brand-name {
        display: block;
        margin-top: 10px;
        color: rgba(255, 255, 255, 0.92);
        font-family: 'Poppins', sans-serif !important;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.2;
        letter-spacing: 0.28em;
        text-align: center;
        transition:
            opacity 200ms ease,
            transform 250ms ease;
    }

    .nav-label {
        display: block;
        margin: 0 0 9px 10px;
        color: rgba(255, 255, 255, 0.38);
        font-family: 'Poppins', sans-serif !important;
        font-size: 10px;
        font-weight: 600;
        line-height: 1.3;
        letter-spacing: 0.20em;
        text-transform: uppercase;
        transition:
            opacity 200ms ease,
            margin 350ms ease-in-out;
    }

    .nav-menu-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 6px;
    }

    .nav-item {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        min-height: 48px;
        padding: 10px 12px;
        gap: 12px;
        border: 1px solid transparent;
        border-radius: 13px;
        color: #b8c5ba;
        background: transparent;
        font-family: 'Poppins', sans-serif !important;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.35;
        text-decoration: none;
        transition:
            transform 200ms ease,
            background 200ms ease,
            border-color 200ms ease,
            color 200ms ease,
            box-shadow 200ms ease,
            width 350ms ease-in-out,
            min-height 350ms ease-in-out,
            padding 350ms ease-in-out;
    }

    .nav-item:hover {
        transform: translateX(2px);
        border-color: rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.055);
        color: #ffffff;
    }

    .nav-item.active {
        border-color: rgba(255, 255, 255, 0.04);
        background: linear-gradient(
            90deg,
            #2d6a2d 0%,
            #205b28 100%
        );
        color: #ffffff;
        box-shadow:
            0 6px 18px rgba(45, 106, 45, 0.22),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
    }

    .nav-item.active::before {
        content: '';
        position: absolute;
        top: 11px;
        left: 0;
        width: 3px;
        height: 26px;
        border-radius: 0 4px 4px 0;
        background: #4ade80;
    }

    .nav-item svg {
        display: block;
        width: 21px;
        height: 21px;
        flex-shrink: 0;
        color: currentColor;
        opacity: 0.95;
        transition:
            transform 200ms ease,
            opacity 200ms ease;
    }

    .nav-item:hover svg {
        transform: scale(1.06);
        opacity: 1;
    }

    .nav-item span {
        display: block;
        flex: 1;
        min-width: 0;
        color: inherit;
        font-family: 'Poppins', sans-serif !important;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.35;
        white-space: normal;
    }

    .sidebar-footer {
        width: 100%;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        transition: padding 350ms ease-in-out;
    }

    .sidebar-footer .nav-item:hover {
        border-color: rgba(248, 113, 113, 0.10);
        background: rgba(239, 68, 68, 0.07);
        color: #fecaca;
    }

    .sidebar.collapsed .brand-name,
    .sidebar.collapsed .nav-label,
    .sidebar.collapsed .nav-item span {
        display: none !important;
    }

    .sidebar.collapsed .sidebar-logo {
        min-height: 58px;
        height: 58px;
        margin-bottom: 22px;
        padding: 5px;
        border-color: transparent;
        background: transparent;
        box-shadow: none;
    }

    .sidebar.collapsed .sidebar-logo:hover {
        border-color: rgba(255, 255, 255, 0.04);
        background: rgba(255, 255, 255, 0.035);
        box-shadow: none;
    }

    .sidebar.collapsed .logo-pair {
        gap: 3px;
    }

    .sidebar.collapsed .anbite-logo,
    .sidebar.collapsed .cho-logo {
        width: 25px;
        height: 25px;
    }

    .sidebar.collapsed .nav-menu-wrapper {
        align-items: center;
        gap: 8px;
    }

    .sidebar.collapsed .nav-item {
        width: 50px;
        min-width: 50px;
        max-width: 50px;
        min-height: 50px;
        height: 50px;
        margin-left: auto;
        margin-right: auto;
        padding: 0;
        justify-content: center;
        align-items: center;
        gap: 0;
        border-radius: 14px;
        transform: none;
    }

    .sidebar.collapsed .nav-item:hover {
        transform: none;
    }

    .sidebar.collapsed .nav-item svg {
        width: 21px;
        height: 21px;
    }

    .sidebar.collapsed .nav-item.active {
        background: linear-gradient(
            145deg,
            #2d7a36 0%,
            #205b28 100%
        );
        box-shadow:
            0 7px 18px rgba(45, 106, 45, 0.30),
            inset 0 1px 0 rgba(255, 255, 255, 0.08);
    }

    .sidebar.collapsed .nav-item.active::before {
        top: 12px;
        left: -10px;
        width: 3px;
        height: 26px;
    }

    .sidebar.collapsed .sidebar-footer {
        padding-top: 16px;
    }

    .sidebar.collapsed .sidebar-footer .nav-item {
        margin-left: auto;
        margin-right: auto;
    }

    .sidebar.collapsed .nav-item[data-label]::after {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .sidebar.collapsed .nav-item[data-label]:hover::after {
        content: attr(data-label);
        position: fixed;
        top: 50%;
        left: 88px;
        z-index: 99999;
        width: max-content;
        max-width: 220px;
        padding: 8px 12px;
        border: 1px solid rgba(255, 255, 255, 0.10);
        border-radius: 9px;
        background: #14351a;
        color: #ffffff;
        font-family: 'Poppins', sans-serif !important;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.25;
        letter-spacing: 0.01em;
        white-space: nowrap;
        box-shadow:
            0 8px 22px rgba(0, 0, 0, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
        opacity: 1;
        visibility: visible;
        transform: translateY(-50%);
    }

    .sidebar.collapsed .nav-item[data-label]:hover::before {
        content: '';
        position: fixed;
        top: 50%;
        left: 82px;
        z-index: 99999;
        width: 0;
        height: 0;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
        border-right: 6px solid #14351a;
        transform: translateY(-50%);
        pointer-events: none;
    }
</style>

<aside
    id="sidebar"
    class="sidebar"
>
    <button
        id="sidebarLogoToggle"
        type="button"
        class="sidebar-logo"
        aria-label="Collapse sidebar"
        title="Collapse sidebar"
        aria-expanded="true"
    >
        <div class="logo-pair">
            <img
                src="{{ asset('images/ANBITE NEW LOGO.png') }}"
                alt="ANBITE Logo"
                class="anbite-logo"
            >


        </div>

        <span class="brand-name">
            ANBITE
        </span>
    </button>

    <div class="nav-label">
        Main Menu
    </div>

    <nav class="nav-menu-wrapper">
        <a
            href="{{ route('dashboard') }}"
            data-label="Dashboard"
            class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="3" y="14" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
            </svg>

            <span>
                Dashboard
            </span>
        </a>

        <a
            href="{{ route('patients.create') }}"
            data-label="Patient Registration"
            class="nav-item {{ request()->routeIs('patients.create') ? 'active' : '' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="8.5" cy="7" r="4"/>
                <line x1="20" y1="8" x2="20" y2="14"/>
                <line x1="23" y1="11" x2="17" y2="11"/>
            </svg>

            <span>
                Patient Registration
            </span>
        </a>

        <a
            href="{{ route('patients.index') }}"
            data-label="Patient Records"
            class="nav-item {{ request()->routeIs('patients.index') ? 'active' : '' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>

            <span>
                Patient Records
            </span>
        </a>

        <a
            href="{{ route('hotspot') }}"
            data-label="Heatmap"
            class="nav-item {{ request()->routeIs('hotspot') ? 'active' : '' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <circle cx="12" cy="10" r="3"/>
                <path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z"/>
            </svg>

            <span>
                Heatmap
            </span>
        </a>

        <a
            href="{{ route('charts') }}"
            data-label="Charts & Reports"
            class="nav-item {{ request()->routeIs('charts') ? 'active' : '' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <line x1="18" y1="20" x2="18" y2="10"/>
                <line x1="12" y1="20" x2="12" y2="4"/>
                <line x1="6" y1="20" x2="6" y2="14"/>
            </svg>

            <span>
                Charts & Reports
            </span>
        </a>

        <a
            href="{{ route('ai.decision') }}"
            data-label="AI Decision Support"
            class="nav-item {{ request()->routeIs('ai.decision') ? 'active' : '' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="M12 8v4"/>
                <path d="M12 16h.01"/>
            </svg>

            <span>
                AI Decision Support
            </span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <a
            href="{{ route('logout') }}"
            data-label="Logout"
            class="nav-item"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>

            <span>
                Logout
            </span>
        </a>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const sidebarLogoToggle = document.getElementById('sidebarLogoToggle');

        if (!sidebar || !sidebarLogoToggle) {
            return;
        }

        const mainContent =
            document.getElementById('main-content') ||
            document.querySelector('main');

        function updateLayout() {
            const isCollapsed = sidebar.classList.contains('collapsed');

            document.body.classList.toggle(
                'sidebar-collapsed',
                isCollapsed
            );

            document.body.classList.toggle(
                'sidebar-expanded',
                !isCollapsed
            );

            if (mainContent) {
                mainContent.style.marginLeft = isCollapsed
                    ? '78px'
                    : '230px';

                mainContent.style.transition =
                    'margin-left 350ms ease-in-out';
            }

            sidebarLogoToggle.setAttribute(
                'aria-label',
                isCollapsed
                    ? 'Expand sidebar'
                    : 'Collapse sidebar'
            );

            sidebarLogoToggle.setAttribute(
                'title',
                isCollapsed
                    ? 'Expand sidebar'
                    : 'Collapse sidebar'
            );

            sidebarLogoToggle.setAttribute(
                'aria-expanded',
                String(!isCollapsed)
            );
        }

        sidebarLogoToggle.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
            updateLayout();
        });

        sidebar.classList.remove('collapsed');

        updateLayout();
    });
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 230px;
            background: #1a3a1a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo-circle {
            width: 36px; height: 36px;
            background: white;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .logo-circle svg { width: 18px; height: 18px; }
        .logo-text { font-size: 1.2rem; font-weight: 800; color: white; }

        .nav-label {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
            padding-left: 12px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: 8px;
            color: rgba(255,255,255,0.7);
            text-decoration: none; font-size: 0.85rem;
            margin-bottom: 2px; transition: all 0.2s;
        }

        .nav-item:hover { background: rgba(255,255,255,0.1); color: white; }
        .nav-item.active { background: rgba(255,255,255,0.18); color: white; font-weight: 600; }
        .nav-item svg { width: 17px; height: 17px; flex-shrink: 0; }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1rem;
        }

        .nav-item.logout { color: #ff9999; }
        .nav-item.logout:hover { background: rgba(255,100,100,0.1); }

        /* ── MAIN ── */
        .main { margin-left: 230px; flex: 1; padding: 2rem; }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .topbar-title { font-size: 1.3rem; font-weight: 700; color: #1a3a1a; }
        .topbar-sub { font-size: 0.82rem; color: #888; margin-top: 2px; }

        .topbar-user {
            display: flex; align-items: center; gap: 10px;
            background: white; padding: 8px 16px;
            border-radius: 99px; border: 0.5px solid #e0e0e0;
            font-size: 0.85rem; color: #1a3a1a; font-weight: 500;
        }

        .user-avatar {
            width: 30px; height: 30px;
            background: #1a3a1a; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.72rem; color: white; font-weight: 700;
        }

        /* ── STAT CARDS ── */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.2rem 1.4rem;
            border: 0.5px solid #e8e8e8;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stat-label { font-size: 0.72rem; color: #888; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.04em; }
        .stat-num { font-size: 2rem; font-weight: 800; color: #1a3a1a; line-height: 1; }
        .stat-sub { font-size: 0.7rem; color: #aaa; margin-top: 4px; }
        .stat-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .stat-icon svg { width: 20px; height: 20px; }

        /* ── MID ROW ── */
        .mid-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .panel {
            background: white;
            border-radius: 12px;
            border: 0.5px solid #e8e8e8;
            padding: 1.2rem 1.4rem;
        }

        .panel-title {
            font-size: 0.88rem;
            font-weight: 600;
            color: #1a3a1a;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .panel-title span { font-size: 0.75rem; color: #888; font-weight: 400; }
        #heatmapPreview { height: 220px; border-radius: 8px; }

        /* ── BOTTOM ROW ── */
        .bottom-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
        }

        table { width: 100%; border-collapse: collapse; font-size: 0.82rem; }
        thead th { text-align: left; padding: 8px 12px; background: #f8f8f8; color: #555; font-weight: 600; font-size: 0.72rem; text-transform: uppercase; border-bottom: 1px solid #eee; }
        tbody td { padding: 10px 12px; color: #444; border-bottom: 0.5px solid #f5f5f5; }
        tbody tr:hover { background: #fafafa; }

        .badge { display: inline-block; font-size: 0.7rem; padding: 2px 8px; border-radius: 99px; font-weight: 600; }
        .badge-dog { background: #E6F1FB; color: #185FA5; }
        .badge-cat { background: #FAEEDA; color: #854F0B; }

        .right-col { display: flex; flex-direction: column; gap: 1rem; }

        .activity-item { display: flex; gap: 10px; padding: 8px 0; border-bottom: 0.5px solid #f5f5f5; }
        .activity-item:last-child { border-bottom: none; }
        .activity-dot { width: 8px; height: 8px; border-radius: 50%; background: #1a3a1a; margin-top: 5px; flex-shrink: 0; }
        .activity-text { font-size: 0.8rem; color: #444; line-height: 1.5; }
        .activity-time { font-size: 0.7rem; color: #bbb; }

        .empty-state { text-align: center; padding: 2rem; color: #bbb; font-size: 0.82rem; }

        .btn-add {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 7px 16px; background: #1a3a1a; color: white;
            border-radius: 99px; text-decoration: none;
            font-size: 0.8rem; font-weight: 600;
        }
        .btn-add:hover { background: #2d6a2d; }
    </style>
</head>
<body>

    {{-- ── SIDEBAR ── --}}
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
        <a href="{{ route('dashboard') }}" class="nav-item active">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            Dashboard
        </a>

        {{-- 2. Patient Registration (Add new patient form) --}}
        <a href="{{ route('patients.create') }}" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Patient Registration
        </a>

        {{-- 3. Patient Records (View all patients) --}}
        <a href="{{ route('patients.index') }}" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Patient Records
        </a>

        {{-- 4. Hotspot Map --}}
        <a href="{{ route('hotspot') }}" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="10" r="3"/><path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 14 8 14s8-8.75 8-14a8 8 0 0 0-8-8z"/></svg>
            Hotspot Map
        </a>

        {{-- 5. Charts --}}
        <a href="{{ route('charts') }}" class="nav-item">
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

    {{-- ── MAIN CONTENT ── --}}
    <main class="main">

        <div class="topbar">
            <div>
                <div class="topbar-title">Dashboard</div>
                <div class="topbar-sub">Batangas City — {{ date('F Y') }}</div>
            </div>
            <div class="topbar-user">
                <div class="user-avatar">{{ strtoupper(substr(session('full_name', 'U'), 0, 2)) }}</div>
                {{ session('full_name', 'Staff') }}
            </div>
        </div>

        {{-- STAT CARDS --}}
        <div class="stat-grid">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Bite Cases</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">All recorded cases</div>
                </div>
                <div class="stat-icon" style="background:#fef2f2;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2"><path d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Vaccinated</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">Completed PEP</div>
                </div>
                <div class="stat-icon" style="background:#E1F5EE;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#0F6E56" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Missed Doses</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">Needs follow-up</div>
                </div>
                <div class="stat-icon" style="background:#FAEEDA;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#854F0B" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Dog Bites</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">Canine incidents</div>
                </div>
                <div class="stat-icon" style="background:#E6F1FB;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#185FA5" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Cat Bites</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">Feline incidents</div>
                </div>
                <div class="stat-icon" style="background:#EEEDFE;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#534AB7" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Other Animal Bites</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">Other incidents</div>
                </div>
                <div class="stat-icon" style="background:#F1EFE8;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#5F5E5A" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                </div>
            </div>
        </div>

        {{-- CHART + MAP --}}
        <div class="mid-grid">
            <div class="panel">
                <div class="panel-title">
                    Monthly Bite Cases — Batangas City
                    <span>{{ date('Y') }}</span>
                </div>
                <canvas id="casesChart" height="90"></canvas>
            </div>
            <div class="panel">
                <div class="panel-title">
                    Hotspot Map Preview
                    <a href="{{ route('hotspot') }}" style="font-size:0.75rem;color:#2d6a2d;text-decoration:none;">Click to expand →</a>
                </div>
                <div id="heatmapPreview"></div>
            </div>
        </div>

        {{-- PATIENT LOG + ACTIVITY --}}
        <div class="bottom-grid">
            <div class="panel">
                <div class="panel-title">
                    Patient Log Records
                    <div style="display:flex;align-items:center;gap:8px;">
                        <span>{{ date('F Y') }}</span>
                        <a href="{{ route('patients.create') }}" class="btn-add">+ Add Patient</a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Animal</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">No patient records yet. <a href="{{ route('patients.create') }}" style="color:#2d6a2d;font-weight:600;">Add your first patient!</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="right-col">
                <div class="panel">
                    <div class="panel-title">Upcoming Vaccine Doses <span>Next 7 days</span></div>
                    <div class="empty-state" style="padding:1rem 0;">No upcoming doses scheduled.</div>
                </div>
                <div class="panel">
                    <div class="panel-title">Recent Activity</div>
                    <div class="activity-item">
                        <div class="activity-dot"></div>
                        <div>
                            <div class="activity-text">System initialized successfully</div>
                            <div class="activity-time">Just now</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot" style="background:#2d6a2d;"></div>
                        <div>
                            <div class="activity-text">{{ session('full_name', 'Staff') }} logged in</div>
                            <div class="activity-time">{{ date('h:i A') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
        // Chart.js
        const ctx = document.getElementById('casesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [{ label: 'Bite Cases', data: [0,0,0,0,0,0,0,0,0,0,0,0], backgroundColor: '#1a3a1a', borderRadius: 4 }]
            },
            options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { color: '#f0f0f0' } }, x: { grid: { display: false } } } }
        });

        // Leaflet map preview
        const map = L.map('heatmapPreview', { center: [13.7565, 121.0583], zoom: 11, zoomControl: false, dragging: false, scrollWheelZoom: false });
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' }).addTo(map);
    </script>

</body>
</html>
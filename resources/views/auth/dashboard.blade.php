<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
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
@stack('scripts')
@include('layouts.sidebar')

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
                    <div class="stat-num">35</div>
                    <div class="stat-sub">All recorded cases</div>
                </div>
                <div class="stat-icon" style="background:#fef2f2;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M256 32C269.3 32 280 42.7 280 56L280 67C288.6 69.2 296.9 72.6 304.8 77.3L311 71C320.4 61.6 335.6 61.6 344.9 71C354.2 80.4 354.3 95.6 344.9 104.9L338.6 111.2C343.2 119 346.6 127.4 348.9 136L359.9 136C373.2 136 383.9 146.7 383.9 160C383.9 173.3 373.2 184 359.9 184L348.9 184C346.7 192.6 343.3 200.9 338.6 208.8L345 215C354.4 224.4 354.4 239.6 345 248.9C335.6 258.2 320.4 258.3 311.1 248.9L307 244.8L276.9 274.9L281 279C290.4 288.4 290.4 303.6 281 312.9C271.6 322.2 256.4 322.3 247.1 312.9L243 308.8C233 318.8 223 328.8 212.9 338.9L217 343C226.4 352.4 226.4 367.6 217 376.9C207.6 386.2 192.4 386.3 183.1 376.9L176.8 370.6C169 375.2 160.6 378.6 152 380.9L152 391.9C152 405.2 141.3 415.9 128 415.9C114.7 415.9 104 405.2 104 391.9L104 380.9C95.4 378.7 87.1 375.3 79.2 370.6L73 377C63.6 386.4 48.4 386.4 39.1 377C29.8 367.6 29.7 352.4 39.1 343.1L45.4 336.8C40.8 329 37.4 320.6 35.1 312L24.1 312C10.8 312 .1 301.3 .1 288C.1 274.7 10.8 264 24.1 264L35.1 264C37.3 255.4 40.7 247.1 45.4 239.2L39 233C29.6 223.6 29.6 208.4 39 199.1C48.4 189.8 63.6 189.7 72.9 199.1L77 203.2C87 193.2 97 183.2 107.1 173.1L103 169C93.6 159.6 93.6 144.4 103 135.1C112.4 125.8 127.6 125.7 136.9 135.1L141 139.2L171.1 109.1L167 105C157.6 95.6 157.6 80.4 167 71.1C176.4 61.8 191.6 61.7 201 71L207.3 77.3C215.1 72.7 223.5 69.3 232.1 67L232.1 56C232.1 42.7 242.8 32 256.1 32zM128 320C145.7 320 160 305.7 160 288C160 270.3 145.7 256 128 256C110.3 256 96 270.3 96 288C96 305.7 110.3 320 128 320zM240 208C240 190.3 225.7 176 208 176C190.3 176 176 190.3 176 208C176 225.7 190.3 240 208 240C225.7 240 240 225.7 240 208zM536 248L536 259C544.6 261.2 552.9 264.6 560.8 269.3L567 263C576.4 253.6 591.6 253.6 600.9 263C610.2 272.4 610.3 287.6 600.9 296.9L594.6 303.2C599.2 311 602.6 319.4 604.9 328L615.9 328C629.2 328 639.9 338.7 639.9 352C639.9 365.3 629.2 376 615.9 376L604.9 376C602.7 384.6 599.3 392.9 594.6 400.8L601 407C610.4 416.4 610.4 431.6 601 440.9C591.6 450.2 576.4 450.3 567.1 440.9L563 436.8L532.9 466.9L537 471C546.4 480.4 546.4 495.6 537 504.9C527.6 514.2 512.4 514.3 503.1 504.9L499 500.8C489 510.8 479 520.8 468.9 530.9L473 535C482.4 544.4 482.4 559.6 473 568.9C463.6 578.2 448.4 578.3 439.1 568.9L432.8 562.6C425 567.2 416.6 570.6 408 572.9L408 583.9C408 597.2 397.3 607.9 384 607.9C370.7 607.9 360 597.2 360 583.9L360 572.9C351.4 570.7 343.1 567.3 335.2 562.6L329 569C319.6 578.4 304.4 578.4 295.1 569C285.8 559.6 285.7 544.4 295.1 535.1L301.4 528.8C296.8 521 293.4 512.6 291.1 504L280.1 504C266.8 504 256.1 493.3 256.1 480C256.1 466.7 266.8 456 280.1 456L291.1 456C293.3 447.4 296.7 439.1 301.4 431.2L295 425C285.6 415.6 285.6 400.4 295 391.1C304.4 381.8 319.6 381.7 328.9 391.1L333 395.2C343 385.2 353 375.2 363.1 365.1L359 361C349.6 351.6 349.6 336.4 359 327.1C368.4 317.8 383.6 317.7 392.9 327.1L397 331.2L427.1 301.1L423 297C413.6 287.6 413.6 272.4 423 263.1C432.4 253.8 447.6 253.7 456.9 263.1L463.2 269.4C471 264.8 479.4 261.4 488 259.1L488 248.1C488 234.8 498.7 224.1 512 224.1C525.3 224.1 536 234.8 536 248.1zM448 448C448 430.3 433.7 416 416 416C398.3 416 384 430.3 384 448C384 465.7 398.3 480 416 480C433.7 480 448 465.7 448 448z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Vaccinated</div>
                    <div class="stat-num">30</div>
                    <div class="stat-sub">Completed PEP</div>
                </div>
                <div class="stat-icon" style="background:#E1F5EE;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M529.5 47C520.1 37.6 504.9 37.6 495.6 47C486.3 56.4 486.2 71.6 495.6 80.9L510.6 95.9L464.5 142L401.5 79C392.1 69.6 376.9 69.6 367.6 79C358.3 88.4 358.2 103.6 367.6 112.9L374.6 119.9L296.5 198L337.5 239C346.9 248.4 346.9 263.6 337.5 272.9C328.1 282.2 312.9 282.3 303.6 272.9L262.6 231.9L216.5 278L257.5 319C266.9 328.4 266.9 343.6 257.5 352.9C248.1 362.2 232.9 362.3 223.6 352.9L182.6 311.9L144.9 349.6C134.4 360.1 128.5 374.3 128.5 389.2L128.5 478L71.5 535C62.1 544.4 62.1 559.6 71.5 568.9C80.9 578.2 96.1 578.3 105.4 568.9L162.4 511.9L251.2 511.9C266.1 511.9 280.3 506 290.8 495.5L520.5 265.8L527.5 272.8C536.9 282.2 552.1 282.2 561.4 272.8C570.7 263.4 570.8 248.2 561.4 238.9L498.4 175.9L544.5 129.8L559.5 144.8C568.9 154.2 584.1 154.2 593.4 144.8C602.7 135.4 602.8 120.2 593.4 110.9L529.4 46.9z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Notified Patient</div>
                    <div class="stat-num">30</div>
                    <div class="stat-sub">Notified</div>
                </div>
                <div class="stat-icon" style="background:#FAEEDA;">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M320 64C334.7 64 348.2 72.1 355.2 85L571.2 485C577.9 497.4 577.6 512.4 570.4 524.5C563.2 536.6 550.1 544 536 544L104 544C89.9 544 76.8 536.6 69.6 524.5C62.4 512.4 62.1 497.4 68.8 485L284.8 85C291.8 72.1 305.3 64 320 64zM320 416C302.3 416 288 430.3 288 448C288 465.7 302.3 480 320 480C337.7 480 352 465.7 352 448C352 430.3 337.7 416 320 416zM320 224C301.8 224 287.3 239.5 288.6 257.7L296 361.7C296.9 374.2 307.4 384 319.9 384C332.5 384 342.9 374.3 343.8 361.7L351.2 257.7C352.5 239.5 338.1 224 319.8 224z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Dog Bites</div>
                    <div class="stat-num">18</div>
                    <div class="stat-sub">Canine incidents</div>
                </div>
                <div class="stat-icon" style="background:#E6F1FB;">
                    <svg width="46" height="46" fill="#185FA5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
  <path d="M64 176C80.6 176 94.2 188.6 95.8 204.7L96.1 211.3C97.8 227.4 111.4 240 128 240L307.1 240L448 300.4L448 544C448 561.7 433.7 576 416 576L384 576C366.3 576 352 561.7 352 544L352 412.7C328 425 300.8 432 272 432C243.2 432 216 425 192 412.7L192 544C192 561.7 177.7 576 160 576L128 576C110.3 576 96 561.7 96 544L96 298.4C58.7 285.2 32 249.8 32 208C32 190.3 46.3 176 64 176zM387.8 32C395.5 32 402.7 35.6 407.4 41.8L424 64L476.1 64C488.8 64 501 69.1 510 78.1L528 96L584 96C597.3 96 608 106.7 608 120L608 144C608 188.2 572.2 224 528 224L464 224L457 252L332.3 198.6L363.9 51.4C366.3 40.1 376.2 32 387.8 32zM480 108C469 108 460 117 460 128C460 139 469 148 480 148C491 148 500 139 500 128C500 117 491 108 480 108z"/>
</svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Cat Bites</div>
                    <div class="stat-num">17</div>
                    <div class="stat-sub">Feline incidents</div>
                </div>
                <div class="stat-icon" style="background:#EEEDFE;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M96 160C149 160 192 203 192 256L192 341.8C221.7 297.1 269.8 265.6 325.4 257.8C351 317.8 410.6 359.9 480 359.9C490.9 359.9 501.6 358.8 512 356.8L512 544C512 561.7 497.7 576 480 576C462.3 576 448 561.7 448 544L448 403.2L312 512L368 512C385.7 512 400 526.3 400 544C400 561.7 385.7 576 368 576L224 576C171 576 128 533 128 480L128 256C128 239.4 115.4 225.8 99.3 224.2L92.7 223.9C76.6 222.2 64 208.6 64 192C64 174.3 78.3 160 96 160zM565.8 67.2C576.2 58.5 592 65.9 592 79.5L592 192C592 253.9 541.9 304 480 304C418.1 304 368 253.9 368 192L368 79.5C368 65.9 383.8 58.5 394.2 67.2L448 112L512 112L565.8 67.2zM432 172C421 172 412 181 412 192C412 203 421 212 432 212C443 212 452 203 452 192C452 181 443 172 432 172zM528 172C517 172 508 181 508 192C508 203 517 212 528 212C539 212 548 203 548 192C548 181 539 172 528 172z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Unnotified Patients</div>
                    <div class="stat-num">5</div>
                    <div class="stat-sub">Unnotified</div>
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
                    Quarterly Bite Cases — Batangas City
                    <span>{{ date('Y') }}</span>
                </div>
                <div style="position: relative; height: 300px; width: 100%;">
                <canvas id="casesChart"></canvas>
                </div>
            </div>
            
            <div class="panel">
                <div class="panel-title">
                    Hotspot Map Preview
                    <a href="{{ route('hotspot') }}" class="nav-item {{ request()->routeIs('hotspot') ? 'active' : '' }}">> View Full Map</a>
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

    const casesChart = new Chart(ctx, {
        type: 'line', 
        data: {
            // Pinalitan natin ang labels para maging Quarterly
            labels: ['Q1 (Jan-Mar)', 'Q2 (Apr-Jun)', 'Q3 (Jul-Sep)', 'Q4 (Oct-Dec)'],
            datasets: [{
                label: 'Bite Cases',
                // Apat na numbers na lang! 
                // (Pinagsama-sama ko yung mga dummy cases kanina per quarter)
                data: [55, 95, 108, 76], 
                
                // Same design parin para bumagay sa theme mo
                borderColor: '#2a5240', 
                backgroundColor: 'rgba(42, 82, 64, 0.2)',
                borderWidth: 2,
                pointBackgroundColor: '#305930',
                fill: true, 
                tension: 0.3 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false 
                }
            },
            scales: {
                y: {
                    beginAtZero: true 
                }
            }
        }
    });

        // Leaflet map preview
        const map = L.map('heatmapPreview', { center: [13.7565, 121.0583], zoom: 11, zoomControl: false, dragging: false, scrollWheelZoom: false });
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' }).addTo(map);
    </script>

</body>
</html>
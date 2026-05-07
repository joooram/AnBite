<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Hotspot Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* === MAIN === */
        .main {
            margin-left: 230px;
            flex: 1;
            padding: 2rem;
        }

        /* === TOPBAR === */
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

        .topbar-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            padding: 8px 16px;
            border-radius: 99px;
            border: 0.5px solid #e0e0e0;
            font-size: 0.82rem;
            color: #1a3a1a;
            font-weight: 500;
        }

        .topbar-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 0 3px rgba(34,197,94,0.2);
        }

        /* === MAP PANEL === */
        .map-panel {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .map-panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .map-panel-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #1a3a1a;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .map-panel-title svg { color: #2d6a2d; }

        .map-panel-sub {
            font-size: 0.75rem;
            color: #9ca3af;
            margin-top: 2px;
        }

        .map-legend {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.72rem;
            color: #6b7280;
            font-weight: 500;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        #map {
            height: 440px;
            width: 100%;
            z-index: 1;
        }

        /* === TABLE PANEL === */
        .table-panel {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        .table-panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .table-panel-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #1a3a1a;
        }

        .table-panel-sub {
            font-size: 0.75rem;
            color: #9ca3af;
            margin-top: 2px;
        }

        .month-badge {
            font-size: 0.72rem;
            background: #ecfdf5;
            color: #166534;
            padding: 4px 12px;
            border-radius: 99px;
            font-weight: 600;
        }

        /* === TABLE === */
        .hotspot-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.82rem;
        }

        .hotspot-table thead th {
            text-align: left;
            padding: 10px 16px;
            background: #ecfdf5;
            color: #374151;
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .hotspot-table thead th:last-child { text-align: center; }

        .hotspot-table tbody td {
            padding: 11px 16px;
            color: #374151;
            border-bottom: 0.5px solid #f5f5f5;
            vertical-align: middle;
        }

        .hotspot-table tbody tr:last-child td { border-bottom: none; }
        .hotspot-table tbody tr:hover { background: #fafafa; }

        /* Rank badge */
        .rank-num {
            width: 26px;
            height: 26px;
            border-radius: 8px;
            background: #f3f4f6;
            color: #6b7280;
            font-size: 0.72rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .rank-num.top-1 { background: #fef3c7; color: #92400e; }
        .rank-num.top-2 { background: #f1f5f9; color: #475569; }
        .rank-num.top-3 { background: #fef2f2; color: #991b1b; }

        /* Case count + bar */
        .cases-cell { text-align: center; }

        .cases-count {
            font-size: 0.88rem;
            font-weight: 700;
            color: #1a3a1a;
            margin-bottom: 4px;
        }

        .cases-bar-wrap {
            width: 100%;
            height: 5px;
            background: #f0f0f0;
            border-radius: 99px;
            overflow: hidden;
        }

        .cases-bar {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(to right, #2d6a2d, #6abf69);
        }

        /* === TOTAL FOOTER === */
        .total-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.4rem;
            background: linear-gradient(135deg, #1a3a1a, #2d6a2d);
            color: white;
        }

        .total-label {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            opacity: 0.85;
        }

        .total-value {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .total-sub {
            font-size: 0.7rem;
            opacity: 0.65;
            margin-top: 1px;
        }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <main class="main">

        {{-- TOPBAR --}}
        <div class="topbar">
            <div>
                <div class="topbar-title">Rabies Hotspot Map</div>
                <div class="topbar-sub">Batangas City — {{ date('F Y') }}</div>
            </div>
            <div class="topbar-badge">
                <div class="topbar-badge-dot"></div>
                Live Map
            </div>
        </div>

        {{-- MAP PANEL --}}
        <div class="map-panel">
            <div class="map-panel-header">
                <div>
                    <div class="map-panel-title">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        Barangay Incident Map
                    </div>
                    <div class="map-panel-sub">Click a marker to view barangay details</div>
                </div>
                <div class="map-legend">
                    <div class="legend-item">
                        <div class="legend-dot" style="background:#2d6a2d;"></div>
                        Barangay Marker
                    </div>
                    <div class="legend-item">
                        <div class="legend-dot" style="background:#e53e3e;"></div>
                        High Risk
                    </div>
                </div>
            </div>
            <div id="map"></div>
        </div>

        {{-- TABLE PANEL --}}
        <div class="table-panel">
            <div class="table-panel-header">
                <div>
                    <div class="table-panel-title">Top 10 Barangays — Highest Rabies Cases</div>
                    <div class="table-panel-sub">Ranked by total reported incidents this month</div>
                </div>
                <span class="month-badge">{{ date('F Y') }}</span>
            </div>

            <table class="hotspot-table">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>Barangay Name</th>
                        <th style="width:180px; text-align:center;">Total Cases</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $hotspots = [
                            ['name' => 'Pallocan Silangan',   'cases' => 15],
                            ['name' => 'Kumintang Ibaba',     'cases' => 13],
                            ['name' => 'Balete',              'cases' => 12],
                            ['name' => 'Tabangao Ambulong',   'cases' => 11],
                            ['name' => 'San Pedro',           'cases' => 10],
                            ['name' => 'Bolbok',              'cases' =>  9],
                            ['name' => 'Alangilan',           'cases' =>  8],
                            ['name' => 'Santa Clara',         'cases' =>  7],
                            ['name' => 'Sorosoro Ilaya',      'cases' =>  6],
                            ['name' => 'Mahabang Dahilig',    'cases' =>  5],
                        ];
                        $max = $hotspots[0]['cases'];
                    @endphp

                    @foreach($hotspots as $i => $row)
                    <tr>
                        <td>
                            <div class="rank-num {{ $i === 0 ? 'top-1' : ($i === 1 ? 'top-2' : ($i === 2 ? 'top-3' : '')) }}">
                                {{ $i + 1 }}
                            </div>
                        </td>
                        <td>
                            <div style="font-weight:600; color:#1f2937;">{{ $row['name'] }}</div>
                            <div style="font-size:0.7rem; color:#9ca3af; margin-top:1px;">Batangas City</div>
                        </td>
                        <td class="cases-cell">
                            <div class="cases-count">{{ $row['cases'] }}</div>
                            <div class="cases-bar-wrap">
                                <div class="cases-bar" style="width: {{ ($row['cases'] / $max) * 100 }}%;"></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- TOTAL FOOTER --}}
            <div class="total-footer">
                <div>
                    <div class="total-label">Total Cases — Batangas City</div>
                    <div class="total-sub">All barangays combined this month</div>
                </div>
                <div style="text-align:right;">
                    <div class="total-value">96</div>
                    <div class="total-sub">reported incidents</div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            var map = L.map('map').setView([13.7565, 121.0583], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var barangays = [
                "Barangay 1","Barangay 2","Barangay 3","Barangay 4","Barangay 5","Barangay 6",
                "Barangay 7","Barangay 8","Barangay 9","Barangay 10","Barangay 11","Barangay 12",
                "Barangay 13","Barangay 14","Barangay 15","Barangay 16","Barangay 17","Barangay 18",
                "Barangay 19","Barangay 20","Barangay 21","Barangay 22","Barangay 23","Barangay 24",
                "Balete","Banaba Center","Banaba Kanluran","Banaba Silangan","Banaba Ibaba",
                "Bilogo","Bolbok","Bukal","Calicanto","Catandala","Concepcion",
                "Conde Itaas","Conde Labak","Kumba","Cuta","Dalig","Dela Paz",
                "Dela Paz Pulot Aplaya","Dela Paz Pulot Itaas","Domoclay","Dumantay",
                "Gulod Itaas","Gulod Labak","Haligue Kanluran","Haligue Silangan",
                "Ilihan","Kumintang Ibaba","Kumintang Ilaya","Libyo","Liponpon Isla Verde",
                "Maapas","Mahabang Dahilig","Mahabang Parang","Mahacot Silangan",
                "Mahacot Kanluran","Malalim","Malibayo","Malitam","Maruclap","Mabacong",
                "Pagkilatan","Paharang Kanluran","Paharang Silangan","Pallocan Kanluran",
                "Pallocan Silangan","Pinamucan Ibaba","Pinamucan","Pinamucan Silangan",
                "Sampaga","San Agapito Isla Verde","San Agustin Kanluran",
                "San Agustin Silangan","San Andres Isla Verde","San Antonio Isla Verde",
                "San Isidro","San Jose Sico","San Miguel","San Pedro",
                "Santa Clara","Santa Rita Aplaya","Santa Rita Karsada",
                "Santo Domingo","Santo Nino","Simlong","Sirang Lupa",
                "Sorosoro Ibaba","Sorosoro Ilaya","Sorosoro Karsada",
                "Tabangao Aplaya","Tabangao Ambulong","Tabangao Dao",
                "Talahib Pandayan","Talahib Payapa","Talumpok Kanluran",
                "Talumpok Silangan","Tinga Itaas","Tinga Labak",
                "Tulo","Wawa"
            ];

            barangays.forEach(function(name) {
                var lat = 13.7565 + (Math.random() - 0.5) * 0.05;
                var lng = 121.0583 + (Math.random() - 0.5) * 0.05;

                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup("<b>" + name + "</b>");
            });

        });
    </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite - Hotspot Map</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f3f4f6; display: flex; min-height: 100vh; }
        .main { margin-left: 230px; flex: 1; padding: 2rem; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.8rem; }
        .topbar-title { font-size: 1.3rem; font-weight: 700; color: #1a3a1a; }
        .topbar-sub { font-size: 0.82rem; color: #888; margin-top: 2px; }
        .topbar-badge { display: flex; align-items: center; gap: 8px; background: white; padding: 8px 16px; border-radius: 99px; border: 0.5px solid #e0e0e0; font-size: 0.82rem; color: #1a3a1a; font-weight: 500; }
        .topbar-badge-dot { width: 8px; height: 8px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 0 3px rgba(34,197,94,0.2); }
        .controls-row { display: flex; gap: 8px; align-items: center; flex-wrap: wrap; margin-bottom: 1rem; }
        .view-btn { padding: 7px 16px; border-radius: 8px; border: 1.5px solid #1a3a1a; background: white; color: #1a3a1a; font-size: 0.8rem; font-weight: 600; cursor: pointer; transition: all .15s; font-family: 'Poppins', sans-serif; }
        .view-btn.active, .view-btn:hover { background: #1a3a1a; color: white; }
        .filter-select { padding: 7px 12px; border-radius: 8px; border: 1.5px solid #e0e0e0; font-size: 0.8rem; color: #333; background: white; cursor: pointer; font-family: 'Poppins', sans-serif; outline: none; }
        .map-panel { background: white; border-radius: 16px; border: 1px solid #f0f0f0; box-shadow: 0 4px 14px rgba(0,0,0,0.04); overflow: hidden; margin-bottom: 1.5rem; }
        .map-panel-header { display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.4rem; border-bottom: 1px solid #f0f0f0; }
        .map-panel-title { font-size: 0.9rem; font-weight: 700; color: #1a3a1a; display: flex; align-items: center; gap: 8px; }
        .map-panel-sub { font-size: 0.75rem; color: #9ca3af; margin-top: 2px; }
        #map { height: 460px; width: 100%; display: block; }
        .map-legend { background: white; padding: 10px 14px; border-radius: 10px; border: 1px solid #ddd; font-size: 12px; line-height: 2; box-shadow: 0 2px 8px rgba(0,0,0,.1); font-family: 'Poppins', sans-serif; }
        .map-legend strong { display: block; color: #1a3a1a; font-size: 11px; letter-spacing: .05em; text-transform: uppercase; margin-bottom: 4px; }
        .legend-row { display: flex; align-items: center; gap: 8px; }
        .legend-dot { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }
        .table-panel { background: white; border-radius: 16px; border: 1px solid #f0f0f0; box-shadow: 0 4px 14px rgba(0,0,0,0.04); overflow: hidden; }
        .table-panel-header { display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.4rem; border-bottom: 1px solid #f0f0f0; }
        .table-panel-title { font-size: 0.9rem; font-weight: 700; color: #1a3a1a; }
        .table-panel-sub { font-size: 0.75rem; color: #9ca3af; margin-top: 2px; }
        .month-badge { font-size: 0.72rem; background: #ecfdf5; color: #166534; padding: 4px 12px; border-radius: 99px; font-weight: 600; }
        .tbl-head { display: grid; grid-template-columns: 50px 1fr 100px 160px; padding: 10px 16px; background: #ecfdf5; color: #374151; font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .04em; gap: 8px; }
        .tbl-row { display: grid; grid-template-columns: 50px 1fr 100px 160px; padding: 12px 16px; gap: 8px; align-items: center; border-bottom: 0.5px solid #f5f5f5; cursor: pointer; transition: background .12s; }
        .tbl-row:hover { background: #f5faf5; }
        .tbl-row:last-child { border-bottom: none; }
        .rank-badge { width: 28px; height: 28px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; font-weight: 700; color: white; background: #9ca3af; }
        .rank-badge.top-1 { background: #92400e; }
        .rank-badge.top-2 { background: #475569; }
        .rank-badge.top-3 { background: #991b1b; }
        .bgy-name { font-size: 0.85rem; font-weight: 600; color: #1f2937; }
        .bgy-sub { font-size: 0.7rem; color: #9ca3af; margin-top: 1px; }
        .risk-chip { display: inline-block; font-size: 0.65rem; font-weight: 700; padding: 2px 8px; border-radius: 99px; margin-left: 6px; vertical-align: middle; }
        .case-num { font-weight: 700; font-size: 0.95rem; text-align: right; }
        .bar-bg { background: #f0f0f0; border-radius: 99px; height: 6px; overflow: hidden; margin-top: 4px; }
        .bar-fill { height: 100%; border-radius: 99px; }
        .total-footer { display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.4rem; background: linear-gradient(135deg, #1a3a1a, #2d6a2d); color: white; }
        .total-label { font-size: 0.8rem; font-weight: 600; letter-spacing: .05em; text-transform: uppercase; opacity: .85; }
        .total-value { font-size: 1.6rem; font-weight: 800; }
        .total-sub { font-size: 0.7rem; opacity: .65; margin-top: 1px; }
        .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.45); backdrop-filter: blur(3px); z-index: 99999; align-items: center; justify-content: center; }
        .modal-box { background: white; border-radius: 16px; overflow: hidden; max-width: 380px; width: 92%; box-shadow: 0 20px 60px rgba(0,0,0,.2); }
        .modal-header { background: linear-gradient(135deg,#1a3a1a,#2d6a2d); padding: 1rem 1.4rem; display: flex; justify-content: space-between; align-items: center; }
        .modal-header h3 { color: white; font-size: 1rem; font-weight: 700; margin: 0; }
        .modal-close { background: rgba(255,255,255,.15); border: none; color: white; width: 30px; height: 30px; border-radius: 8px; cursor: pointer; font-size: 18px; display: flex; align-items: center; justify-content: center; }
        .modal-close:hover { background: rgba(255,255,255,.28); }
        .modal-body { padding: 1.2rem 1.4rem; background: #f8faf9; }
        .modal-coords { color: #9ca3af; font-size: 0.72rem; margin-bottom: 1rem; }
        .modal-stat-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .modal-stat { border-radius: 10px; padding: 14px; text-align: center; }
        .modal-stat.full { grid-column: span 2; }
        .modal-stat-num { font-size: 1.6rem; font-weight: 800; }
        .modal-stat-label { font-size: 0.7rem; color: #6b7280; margin-top: 3px; }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <main class="main">

        <div class="topbar">
            <div>
                <div class="topbar-title">Rabies Heatmap</div>
                <div class="topbar-sub">Batangas City &mdash; {{ date('F Y') }}</div>
            </div>
            <div class="topbar-badge">
                <div class="topbar-badge-dot"></div>
                <span id="totalChip">Loading...</span>
            </div>
        </div>

        <div class="controls-row">
            <button class="view-btn active" id="btn-heat"    onclick="setView('heat')">Heatmap</button>
            <button class="view-btn"         id="btn-markers" onclick="setView('markers')"> Markers</button>
            <button class="view-btn"         id="btn-both"    onclick="setView('both')"> Both</button>
            <select class="filter-select" id="filterSel" onchange="filterTable()">
                <option value="all">All Barangays</option>
                <option value="high">Critical / High (&ge; 7 cases)</option>
                <option value="med">Medium (4&ndash;6 cases)</option>
                <option value="low">Low (1&ndash;3 cases)</option>
            </select>
        </div>

        <div class="map-panel">
            <div class="map-panel-header">
                <div>
                    <div class="map-panel-title">Barangay Incident Map</div>
                    <div class="map-panel-sub">Click a marker to view barangay details</div>
                </div>
            </div>
            <div id="map"></div>
        </div>

        <div class="table-panel">
            <div class="table-panel-header">
                <div>
                    <div class="table-panel-title">Barangay Case Breakdown</div>
                    <div class="table-panel-sub" id="showingLabel"></div>
                </div>
                <span class="month-badge">{{ date('F Y') }}</span>
            </div>
            <div class="tbl-head">
                <div>#</div>
                <div>Barangay</div>
                <div style="text-align:right">Cases</div>
                <div>Intensity</div>
            </div>
            <div id="tbl-body"></div>
            <div class="total-footer">
                <div>
                    <div class="total-label">Total Cases &mdash; Batangas City</div>
                    <div class="total-sub">All barangays combined</div>
                </div>
                <div style="text-align:right">
                    <div class="total-value" id="totalVal">0</div>
                    <div class="total-sub">reported incidents</div>
                </div>
            </div>
        </div>

    </main>

    <div class="modal-overlay" id="modal" onclick="if(event.target===this)closeModal()">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="m-name"></h3>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p class="modal-coords" id="m-coords"></p>
                <div class="modal-stat-grid" id="m-stats"></div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        const barangayData = [
            {name:"Pallocan Silangan",  lat:13.7732, lng:121.0721, cases:15},
            {name:"Kumintang Ibaba",    lat:13.7560, lng:121.0583, cases:13},
            {name:"Balete",             lat:13.7490, lng:121.0620, cases:12},
            {name:"Tabangao Ambulong",  lat:13.7210, lng:121.0720, cases:11},
            {name:"San Pedro",          lat:13.7680, lng:121.0500, cases:10},
            {name:"Bolbok",             lat:13.7380, lng:121.0520, cases:9},
            {name:"Alangilan",          lat:13.7820, lng:121.0650, cases:8},
            {name:"Santa Clara",        lat:13.7600, lng:121.0680, cases:7},
            {name:"Sorosoro Ilaya",     lat:13.7290, lng:121.0480, cases:6},
            {name:"Mahabang Dahilig",   lat:13.7950, lng:121.0790, cases:5},
            {name:"Cuta",               lat:13.7540, lng:121.0560, cases:4},
            {name:"Calicanto",          lat:13.7610, lng:121.0430, cases:4},
            {name:"Conde Itaas",        lat:13.7250, lng:121.0390, cases:3},
            {name:"Dalig",              lat:13.7880, lng:121.0870, cases:3},
            {name:"Gulod Itaas",        lat:13.7700, lng:121.0600, cases:3},
            {name:"Dela Paz",           lat:13.7640, lng:121.0510, cases:3},
            {name:"Dumantay",           lat:13.7820, lng:121.0820, cases:2},
            {name:"Simlong",            lat:13.7450, lng:121.0440, cases:2},
            {name:"Pinamucan",          lat:13.7150, lng:121.0560, cases:2},
            {name:"Malitam",            lat:13.7350, lng:121.0640, cases:2},
            {name:"Wawa",               lat:13.7480, lng:121.0750, cases:1},
            {name:"Tulo",               lat:13.7580, lng:121.0680, cases:1},
            {name:"Sampaga",            lat:13.7770, lng:121.0740, cases:1},
            {name:"Santo Nino",         lat:13.7500, lng:121.0310, cases:1},
        ];

        const maxCases   = Math.max(...barangayData.map(b => b.cases));
        const totalCases = barangayData.reduce((s, b) => s + b.cases, 0);

        document.getElementById('totalChip').textContent =
            totalCases + ' total cases across ' + barangayData.length + ' barangays';
        document.getElementById('totalVal').textContent = totalCases;

        function riskColor(c) {
            if (c >= 10) return '#d32f2f';
            if (c >= 7)  return '#e65100';
            if (c >= 4)  return '#f9a825';
            return '#388e3c';
        }
        function riskLabel(c) {
            if (c >= 10) return {text:'Critical', bg:'#fdecea', col:'#c62828'};
            if (c >= 7)  return {text:'High',     bg:'#fff3e0', col:'#bf360c'};
            if (c >= 4)  return {text:'Medium',   bg:'#fffde7', col:'#f57f17'};
            return              {text:'Low',      bg:'#e8f5e9', col:'#2e7d32'};
        }

        /* ── Map ── */
        const map = L.map('map').setView([13.758, 121.058], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 19
        }).addTo(map);

        /* ── Heatmap: drawn with canvas circles (no plugin needed) ── */
        const heatCanvas = L.canvas({ padding: 0.5 });
        const heatGroup  = L.layerGroup();

        barangayData.forEach(b => {
            const r = Math.max(8, Math.min(40, b.cases * 3));
            const circle = L.circle([b.lat, b.lng], {
                radius: r * 30,
                color: 'transparent',
                fillColor: riskColor(b.cases),
                fillOpacity: 0.35,
                renderer: heatCanvas
            });
            heatGroup.addLayer(circle);
        });
        heatGroup.addTo(map);

        /* ── Markers ── */
        const markersGroup = L.layerGroup();
        barangayData.forEach((b, i) => {
            const color = riskColor(b.cases);
            const size  = Math.max(14, Math.min(32, b.cases * 2));
            const lbl   = riskLabel(b.cases);
            const icon  = L.divIcon({
                className: '',
                html: '<div style="width:' + size + 'px;height:' + size + 'px;border-radius:50%;' +
                      'background:' + color + ';border:2.5px solid white;' +
                      'box-shadow:0 2px 6px rgba(0,0,0,.4);' +
                      'display:flex;align-items:center;justify-content:center;' +
                      'color:white;font-size:' + (size > 20 ? 10 : 8) + 'px;font-weight:700;' +
                      'font-family:Poppins,sans-serif;">' + b.cases + '</div>',
                iconSize:   [size, size],
                iconAnchor: [size/2, size/2]
            });
            L.marker([b.lat, b.lng], {icon})
                .bindPopup(
                    '<div style="font-family:Poppins,sans-serif;min-width:160px">' +
                    '<b style="color:#1a3a1a;font-size:14px">' + b.name + '</b><br>' +
                    '<span style="font-size:13px;color:#444">Cases: <b style="color:' + color + '">' + b.cases + '</b></span><br>' +
                    '<span style="font-size:11px;background:' + lbl.bg + ';color:' + lbl.col + ';' +
                    'padding:2px 8px;border-radius:99px;display:inline-block;margin-top:4px;font-weight:600">' +
                    lbl.text + ' Risk</span></div>',
                    {maxWidth: 220}
                )
                .on('click', function() { showModal(i); })
                .addTo(markersGroup);
        });

        /* ── Legend ── */
        const legend = L.control({position: 'bottomright'});
        legend.onAdd = function() {
            const d = L.DomUtil.create('div', 'map-legend');
            d.innerHTML =
                '<strong>Risk Level</strong>' +
                '<div class="legend-row"><div class="legend-dot" style="background:#d32f2f"></div> Critical &ge;10</div>' +
                '<div class="legend-row"><div class="legend-dot" style="background:#e65100"></div> High 7&ndash;9</div>' +
                '<div class="legend-row"><div class="legend-dot" style="background:#f9a825"></div> Medium 4&ndash;6</div>' +
                '<div class="legend-row"><div class="legend-dot" style="background:#388e3c"></div> Low 1&ndash;3</div>';
            return d;
        };
        legend.addTo(map);

        /* ── View Toggle ── */
        let currentView = 'heat';
        function setView(v) {
            currentView = v;
            ['heat','markers','both'].forEach(id =>
                document.getElementById('btn-' + id).classList.remove('active'));
            document.getElementById('btn-' + v).classList.add('active');
            if (v === 'heat')    { map.addLayer(heatGroup); map.removeLayer(markersGroup); }
            else if (v === 'markers') { map.removeLayer(heatGroup); map.addLayer(markersGroup); }
            else                 { map.addLayer(heatGroup); map.addLayer(markersGroup); }
        }

        /* ── Table ── */
        function renderTable(data) {
            document.getElementById('showingLabel').textContent =
                'Showing ' + data.length + ' of ' + barangayData.length + ' barangays';
            document.getElementById('tbl-body').innerHTML = data.map(function(b) {
                const idx    = barangayData.indexOf(b);
                const color  = riskColor(b.cases);
                const lbl    = riskLabel(b.cases);
                const pct    = Math.round((b.cases / maxCases) * 100);
                const rank   = idx + 1;
                const rankCls = rank === 1 ? 'top-1' : rank === 2 ? 'top-2' : rank === 3 ? 'top-3' : '';
                return '<div class="tbl-row" onclick="showModal(' + idx + ')">' +
                    '<div><div class="rank-badge ' + rankCls + '">' + rank + '</div></div>' +
                    '<div><div class="bgy-name">' + b.name +
                    '<span class="risk-chip" style="background:' + lbl.bg + ';color:' + lbl.col + '">' + lbl.text + '</span></div>' +
                    '<div class="bgy-sub">Batangas City</div></div>' +
                    '<div class="case-num" style="color:' + color + '">' + b.cases + '</div>' +
                    '<div><div class="bar-bg"><div class="bar-fill" style="width:' + pct + '%;background:' + color + '"></div></div></div>' +
                    '</div>';
            }).join('');
        }

        function filterTable() {
            const f = document.getElementById('filterSel').value;
            let d = barangayData;
            if (f === 'high') d = barangayData.filter(b => b.cases >= 7);
            else if (f === 'med') d = barangayData.filter(b => b.cases >= 4 && b.cases <= 6);
            else if (f === 'low') d = barangayData.filter(b => b.cases <= 3);
            renderTable(d);
        }

        /* ── Modal ── */
        function showModal(idx) {
            const b     = barangayData[idx];
            const lbl   = riskLabel(b.cases);
            const color = riskColor(b.cases);
            document.getElementById('m-name').textContent = b.name;
            document.getElementById('m-coords').textContent =
                'Coordinates: ' + b.lat.toFixed(4) + 'N, ' + b.lng.toFixed(4) + 'E';
            document.getElementById('m-stats').innerHTML =
                '<div class="modal-stat" style="background:#f5faf5">' +
                '<div class="modal-stat-num" style="color:' + color + '">' + b.cases + '</div>' +
                '<div class="modal-stat-label">Total Cases</div></div>' +
                '<div class="modal-stat" style="background:' + lbl.bg + '">' +
                '<div class="modal-stat-num" style="color:' + lbl.col + ';font-size:1.2rem">' + lbl.text + '</div>' +
                '<div class="modal-stat-label">Risk Level</div></div>' +
                '<div class="modal-stat full" style="background:#f0f0f0">' +
                '<div class="modal-stat-num" style="color:#1a3a1a;font-size:1.1rem">' +
                Math.round((b.cases / totalCases) * 100) + '% of city total</div>' +
                '<div class="modal-stat-label">' + b.cases + ' out of ' + totalCases + ' city-wide cases</div></div>';
            map.flyTo([b.lat, b.lng], 15, {duration: 1.2});
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        /* ── Init ── */
        renderTable(barangayData);
    </script>
</body>
</html>
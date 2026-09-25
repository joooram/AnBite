<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="font-['Poppins',sans-serif] bg-[#EEF3EF] flex min-h-screen overflow-x-hidden">
@stack('scripts')
@include('layouts.sidebar')

<main class="ml-[230px] flex-1 px-[2.2rem] py-8 min-w-0">

    <div class="flex justify-between items-center mb-[1.6rem]">
        <div>
            <div class="text-2xl font-bold text-[#16241c]">Dashboard</div>
            <div class="text-[0.85rem] text-[#7a8880] mt-0.5">Batangas City — {{ date('F Y') }}</div>
        </div>
        <div class="flex items-center gap-[10px] bg-white pl-1.5 pr-3.5 py-1.5 rounded-full border border-[#e6ebe7] text-[0.85rem] text-[#16241c] font-semibold shadow-[0_2px_8px_rgba(16,40,28,0.04)]">
            <div class="w-8 h-8 bg-[#1f6f4a] rounded-full flex items-center justify-center text-[0.78rem] text-white font-bold shrink-0">{{ substr(Auth::user()->first_name, 0, 1) }}</div>
            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
        </div>
    </div>

    <!-- SAME CONTENT BELOW (NO CHANGES) -->

        {{-- QUANTITY / SUMMARY CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-[1.4rem]">

{{-- CARD 1: TOTAL PATIENTS (highlighted) --}}
<div class="bg-gradient-to-br from-[#1f6f4a] to-[#355E3B] rounded-[14px] p-[1.1rem_1.15rem] shadow-[0_8px_20px_rgba(31,111,74,0.28)]">
    <div class="grid grid-cols-[1fr_auto] items-center gap-4">

        {{-- LEFT: Label + subtitle --}}
        <div>
            <div class="flex items-center gap-2 mb-[0.7rem]">
                <div class="w-[26px] h-[26px] rounded-lg flex items-center justify-center shrink-0 bg-white/15">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>

                <div class="text-[0.66rem] font-semibold text-white/80 uppercase tracking-[0.04em] leading-[1.25]">
                    Total Patients
                </div>
            </div>

            {{-- TODO: replace with real patient count variable, e.g. {{ $totalPatients }} --}}
            <div class="text-[0.72rem] text-white/70 mt-[5px]">
                All recorded patients
            </div>
        </div>

        {{-- RIGHT: Total number --}}
        <div class="text-[2.5rem] font-extrabold text-white leading-none">
            35
        </div>

    </div>
</div>

            {{-- CARD 2: VACCINATION STATUS (Vaccinated + Unvaccinated) --}}
            <div class="bg-white rounded-[14px] p-[1.1rem_1.15rem] border border-[#edf1ee] shadow-[0_4px_14px_rgba(16,40,28,0.045)]">
                <div class="text-[0.66rem] font-semibold text-[#6b7a70] uppercase tracking-[0.04em] leading-[1.25] mb-[0.7rem]">Vaccination Status</div>
                <div class="flex divide-x divide-[#edf1ee]">
                    <div class="flex-1 pr-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#1E8E3E] shrink-0"></span>
                            <span class="text-[0.7rem] text-[#6b7a70]">Vaccinated</span>
                        </div>
                        <div class="text-[1.5rem] font-extrabold text-[#16241c] leading-none">30</div>
                    </div>
                    <div class="flex-1 pl-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#C77D11] shrink-0"></span>
                            <span class="text-[0.7rem] text-[#6b7a70]">Unvaccinated</span>
                        </div>
                        {{-- TODO: replace with real unvaccinated count variable, e.g. {{ $totalUnvaccinated }} --}}
                        <div class="text-[1.5rem] font-extrabold text-[#16241c] leading-none">5</div>
                    </div>
                </div>
            </div>

            {{-- CARD 3: ANIMAL BITES (Dog + Cat) --}}
            <div class="bg-white rounded-[14px] p-[1.1rem_1.15rem] border border-[#edf1ee] shadow-[0_4px_14px_rgba(16,40,28,0.045)]">
                <div class="text-[0.66rem] font-semibold text-[#6b7a70] uppercase tracking-[0.04em] leading-[1.25] mb-[0.7rem]">Animal Bites</div>
                <div class="flex divide-x divide-[#edf1ee]">
                    <div class="flex-1 pr-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#2563AC] shrink-0"></span>
                            <span class="text-[0.7rem] text-[#6b7a70]">Dog Bites</span>
                        </div>
                        <div class="text-[1.5rem] font-extrabold text-[#16241c] leading-none">18</div>
                    </div>
                    <div class="flex-1 pl-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#6B4FBB] shrink-0"></span>
                            <span class="text-[0.7rem] text-[#6b7a70]">Cat Bites</span>
                        </div>
                        <div class="text-[1.5rem] font-extrabold text-[#16241c] leading-none">17</div>
                    </div>
                </div>
            </div>

            {{-- CARD 4: NOTIFICATION STATUS (Notified + Unnotified) --}}
            <div class="bg-white rounded-[14px] p-[1.1rem_1.15rem] border border-[#edf1ee] shadow-[0_4px_14px_rgba(16,40,28,0.045)]">
                <div class="text-[0.66rem] font-semibold text-[#6b7a70] uppercase tracking-[0.04em] leading-[1.25] mb-[0.7rem]">Notification Status</div>
                <div class="flex divide-x divide-[#edf1ee]">
                    <div class="flex-1 pr-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#0E9488] shrink-0"></span>
                            <span class="text-[0.7rem] text-[#6b7a70]">Notified</span>
                        </div>
                        <div class="text-[1.5rem] font-extrabold text-[#16241c] leading-none">30</div>
                    </div>
                    <div class="flex-1 pl-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#D33A3A] shrink-0"></span>
                            <span class="text-[0.7rem] text-[#6b7a70]">Unnotified</span>
                        </div>
                        <div class="text-[1.5rem] font-extrabold text-[#16241c] leading-none">5</div>
                    </div>
                </div>
            </div>

        </div>

        {{-- CHART + MAP --}}
       <div class="grid grid-cols-[1.6fr_1fr] max-[1100px]:grid-cols-1 gap-4 mb-4 items-stretch">
    <div class="bg-white rounded-[14px] border border-[#edf1ee] p-[1.3rem_1.4rem] shadow-[0_4px_14px_rgba(16,40,28,0.04)]">
        <div class="flex justify-between items-start gap-4 mb-[1.1rem]">
            <div class="flex items-start gap-2.5">
                <div class="w-[30px] h-[30px] rounded-lg bg-[#e7f2ec] flex items-center justify-center shrink-0 mt-px">
                    <svg class="w-[15px] h-[15px]" viewBox="0 0 24 24" fill="none" stroke="#1f6f4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 17 9 11 13 15 21 7"/>
                        <polyline points="14 7 21 7 21 14"/>
                    </svg>
                </div>

                <div>
                    <div class="text-[0.98rem] font-bold text-[#16241c]">
                        Present Month Bite Case Trend
                    </div>

                    <div class="text-[0.75rem] text-[#8b978f] mt-0.5">
                        Weekly count of animal-bite cases for {{ date('F Y') }}
                    </div>
                </div>
            </div>

            <div class="inline-flex items-center gap-1.5 bg-[#f1f6f2] text-[#45564c] text-[0.74rem] font-semibold px-3 py-1.5 rounded-full whitespace-nowrap">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ date('F Y') }}
            </div>
        </div>

        <div class="relative h-[280px] w-full">
            <canvas id="casesChart"></canvas>
        </div>
    </div>

            <div class="bg-white rounded-[14px] border border-[#edf1ee] p-[1.3rem_1.4rem] shadow-[0_4px_14px_rgba(16,40,28,0.04)]">
                <div class="flex justify-between items-start gap-4 mb-[1.1rem]">
                    <div class="flex items-start gap-2.5">
                        <div class="w-[30px] h-[30px] rounded-lg bg-[#e7f2ec] flex items-center justify-center shrink-0 mt-px">
                            <svg class="w-[15px] h-[15px]" viewBox="0 0 24 24" fill="none" stroke="#1f6f4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <div class="text-[0.98rem] font-bold text-[#16241c]">Map of Batangas City</div>
                            <div class="text-[0.75rem] text-[#8b978f] mt-0.5">Heatmap preview</div>
                        </div>
                    </div>
                    <a href="{{ route('hotspot') }}" class="inline-flex items-center gap-1 text-[0.78rem] font-semibold text-[#1f6f4a] no-underline whitespace-nowrap hover:underline {{ request()->routeIs('hotspot') ? 'active' : '' }}">
                        View Full Map
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                </div>
                <div id="heatmapPreview" class="h-[300px] rounded-[10px] overflow-hidden"></div>
            </div>
        </div>

        {{-- PATIENT LOG + TOP BARANGAYS --}}
        <div class="grid grid-cols-[1.6fr_1fr] max-[1100px]:grid-cols-1 gap-4">
            <div class="bg-white rounded-[14px] border border-[#edf1ee] p-[1.3rem_1.4rem] shadow-[0_4px_14px_rgba(16,40,28,0.04)]">
                <div class="flex justify-between items-start gap-4 mb-[1.1rem]">
                    <div class="flex items-start gap-2.5">
                        <div class="w-[30px] h-[30px] rounded-lg bg-[#e7f2ec] flex items-center justify-center shrink-0 mt-px">
                            <svg class="w-[15px] h-[15px]" viewBox="0 0 24 24" fill="none" stroke="#1f6f4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div>
                            <div class="text-[0.98rem] font-bold text-[#16241c]">Recently Added Patients</div>
                            <div class="text-[0.75rem] text-[#8b978f] mt-0.5">Latest registered patient records</div>
                        </div>
                    </div>
                    <a href="{{ route('patients.create') }}" class="inline-flex items-center gap-1.5 px-4 py-[7px] bg-[#1f6f4a] text-white rounded-full no-underline text-[0.8rem] font-semibold whitespace-nowrap hover:bg-[#185a3b]">+ Add Patient</a>
                </div>
                <table class="w-full border-collapse text-[0.83rem]">
                    <thead class="border-b border-[#eef2ef]">
                        <tr>
                            <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">ID</th>
                            <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">Full Name</th>
                            <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">Barangay</th>
                            <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">Date of Exposure</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f4f6f4]">
                        {{-- SAME DATA SOURCE (NO CHANGES) — table simplified to ID / Full Name / Barangay / Date of Exposure per requested layout.
                             If a $recentPatients collection is passed from the controller, loop it below; otherwise the existing empty state is shown. --}}
                        @isset($recentPatients)
                            @forelse($recentPatients as $patient)
                                <tr class="hover:bg-[#fafcfb]">
                                    <td class="px-2.5 py-[11px] text-[#33413a]">{{ $patient->id }}</td>
                                    <td class="px-2.5 py-[11px] text-[#33413a]">{{ $patient->full_name }}</td>
                                    <td class="px-2.5 py-[11px] text-[#33413a]">{{ $patient->barangay }}</td>
                                    <td class="px-2.5 py-[11px] text-[#33413a]">{{ $patient->date_of_exposure }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center px-4 py-8 text-[#a7b3ac] text-[0.82rem]">No patient records yet. <a href="{{ route('patients.create') }}" class="text-[#1f6f4a] font-semibold">Add your first patient!</a></div>
                                    </td>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <td colspan="4">
                                    <div class="text-center px-4 py-8 text-[#a7b3ac] text-[0.82rem]">No patient records yet. <a href="{{ route('patients.create') }}" class="text-[#1f6f4a] font-semibold">Add your first patient!</a></div>
                                </td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>

            <div class="bg-white rounded-[14px] border border-[#edf1ee] p-[1.3rem_1.4rem] shadow-[0_4px_14px_rgba(16,40,28,0.04)]">
                <div class="flex justify-between items-start gap-4 mb-[1.1rem]">
                    <div class="flex items-start gap-2.5">
                        <div class="w-[30px] h-[30px] rounded-lg bg-[#e7f2ec] flex items-center justify-center shrink-0 mt-px">
                            <svg class="w-[15px] h-[15px]" viewBox="0 0 24 24" fill="none" stroke="#1f6f4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg>
                        </div>
                        <div>
                            <div class="text-[0.98rem] font-bold text-[#16241c]">Top 10 Barangays</div>
                            <div class="text-[0.75rem] text-[#8b978f] mt-0.5">Highest bite cases this month</div>
                        </div>
                    </div>
                </div>
                <table class="w-full border-collapse text-[0.83rem]">
                    {{-- NEW SECTION — no existing data source was found for this in the current dashboard.
                         Wire a $topBarangays collection (rank, barangay, total_cases) from the controller to populate it;
                         the empty state below shows until that data is supplied. --}}
                    @isset($topBarangays)
                        <thead class="border-b border-[#eef2ef]">
                            <tr>
                                <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">Rank</th>
                                <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">Barangay</th>
                                <th class="text-left px-2.5 py-2 text-[#8b978f] font-semibold text-[0.76rem]">Total Cases</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f4f6f4]">
                            @forelse($topBarangays as $i => $row)
                                <tr class="hover:bg-[#fafcfb]">
                                    <td class="px-2.5 py-[11px]">
                                        <span class="inline-flex items-center justify-center w-[22px] h-[22px] rounded-full text-[0.72rem] font-bold {{ $i === 0 ? 'bg-[#f2a01c] text-white' : ($i === 1 ? 'bg-[#b9c1bc] text-white' : ($i === 2 ? 'bg-[#d97b3f] text-white' : 'bg-[#eef2ef] text-[#6b7a70]')) }}">{{ $i + 1 }}</span>
                                    </td>
                                    <td class="px-2.5 py-[11px] text-[#33413a]">{{ $row->barangay }}</td>
                                    <td class="px-2.5 py-[11px] text-[#33413a]">{{ $row->total_cases }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3"><div class="text-center px-4 py-8 text-[#a7b3ac] text-[0.82rem]">No barangay data available yet.</div></td></tr>
                            @endforelse
                        </tbody>
                    @else
                        <tbody>
                            <tr><td><div class="text-center px-4 py-8 text-[#a7b3ac] text-[0.82rem]">No barangay data available yet.</div></td></tr>
                        </tbody>
                    @endisset
                </table>
            </div>
        </div>

    </main>

@php
    // Dashboard chart data only:
    // Current month, grouped into exactly 4 reporting weeks.
    // Week 1 = Day 1-7
    // Week 2 = Day 8-14
    // Week 3 = Day 15-21
    // Week 4 = Day 22-end of month (up to today)

    $dashboardNow = now();
    $dashboardStartOfMonth = $dashboardNow->copy()->startOfMonth();

    $weeklyLabels = [
        'Week 1',
        'Week 2',
        'Week 3',
        'Week 4',
    ];

    $weeklyCases = [];

    for ($week = 0; $week < 4; $week++) {
        $startDay = ($week * 7) + 1;
        $endDay = $week < 3 ? ($startDay + 6) : $dashboardStartOfMonth->daysInMonth;

        // Do not count future dates in the current month.
        if ($dashboardNow->day < $startDay) {
            $weeklyCases[] = 0;
            continue;
        }

        $endDay = min($endDay, $dashboardNow->day);

        $weekStart = $dashboardStartOfMonth->copy()
            ->day($startDay)
            ->startOfDay();

        $weekEnd = $dashboardStartOfMonth->copy()
            ->day($endDay)
            ->endOfDay();

        $weeklyCases[] = \App\Models\BiteIncident::whereBetween('date_of_exposure', [
            $weekStart->toDateString(),
            $weekEnd->toDateString(),
        ])->count();
    }
@endphp

<script type="application/json" id="casesChartData">{!! json_encode([
    'labels' => $weeklyLabels,
    'data' => $weeklyCases,
]) !!}</script>

<script>
    const chartDataElement = document.getElementById('casesChartData');
    const chartData = JSON.parse(chartDataElement.textContent);

    const weeklyLabels = chartData.labels;
    const weeklyData = chartData.data;

    const ctx = document.getElementById('casesChart').getContext('2d');

    const casesChart = new Chart(ctx, {
        type: 'line',

        data: {
            labels: weeklyLabels,

            datasets: [{
                label: 'Bite Cases',
                data: weeklyData,

                borderColor: '#1f6f4a',
                backgroundColor: 'rgba(31, 111, 74, 0.12)',
                borderWidth: 2,

                pointBackgroundColor: '#1f6f4a',
                pointBorderColor: '#1f6f4a',
                pointRadius: 4,
                pointHoverRadius: 6,

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
                },

                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.parsed.y} bite case${context.parsed.y === 1 ? '' : 's'}`;
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },

                    title: {
                        display: true,
                        text: 'Week'
                    }
                },

                y: {
                    beginAtZero: true,

                    ticks: {
                        precision: 0
                    },

                    title: {
                        display: true,
                        text: 'Number of Bite Cases'
                    }
                }
            }
        }
    });


    // Leaflet map preview — SAME CONFIG AS BEFORE (no changes)
    const map = L.map('heatmapPreview', {
        center: [13.7565, 121.0583],
        zoom: 11,
        zoomControl: false,
        dragging: false,
        scrollWheelZoom: false
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);
</script>

</body>
</html>
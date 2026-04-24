<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Patient Records</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; display: flex; min-height: 100vh; }
        .sidebar { width: 220px; background: #1a3a1a; min-height: 100vh; display: flex; flex-direction: column; padding: 1.5rem 1rem; position: fixed; top: 0; left: 0; }
        .sidebar-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .logo-circle { width: 36px; height: 36px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        .logo-circle svg { width: 18px; height: 18px; }
        .logo-text { font-size: 1.2rem; font-weight: 800; color: white; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 8px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.88rem; margin-bottom: 4px; transition: all 0.2s; }
        .nav-item:hover { background: rgba(255,255,255,0.1); color: white; }
        .nav-item.active { background: rgba(255,255,255,0.15); color: white; font-weight: 600; }
        .nav-item svg { width: 16px; height: 16px; flex-shrink: 0; }
        .sidebar-footer { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; }
        .nav-item.logout { color: #ff9999; }
        .main { margin-left: 220px; flex: 1; padding: 2rem; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        .page-title { font-size: 1.3rem; font-weight: 700; color: #1a3a1a; }
        .page-sub { font-size: 0.82rem; color: #888; margin-top: 2px; }
        .btn-add { padding: 10px 20px; background: #1a3a1a; color: white; border-radius: 99px; text-decoration: none; font-size: 0.88rem; font-weight: 600; display: flex; align-items: center; gap: 6px; }
        .btn-add:hover { background: #2d6a2d; }
        .tabs { display: flex; gap: 8px; margin-bottom: 1.5rem; }
        .tab { padding: 8px 20px; border-radius: 99px; font-size: 0.85rem; font-weight: 500; cursor: pointer; border: 1.5px solid #ddd; background: white; color: #888; text-decoration: none; }
        .tab.active { background: #1a3a1a; color: white; border-color: #1a3a1a; }
        .panel { background: white; border-radius: 12px; border: 0.5px solid #e8e8e8; padding: 1.2rem 1.4rem; }
        .success-box { background: #E1F5EE; border: 1px solid #5DCAA5; color: #0F6E56; font-size: 0.78rem; border-radius: 8px; padding: 10px 14px; margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; font-size: 0.82rem; }
        thead th { text-align: left; padding: 10px 12px; background: #f8f8f8; color: #555; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.03em; border-bottom: 1px solid #eee; }
        tbody td { padding: 12px 12px; color: #444; border-bottom: 0.5px solid #f5f5f5; vertical-align: top; }
        tbody tr:hover { background: #fafafa; }
        .badge { display: inline-block; font-size: 0.7rem; padding: 2px 8px; border-radius: 99px; font-weight: 600; }
        .badge-dog   { background: #E6F1FB; color: #185FA5; }
        .badge-cat   { background: #FAEEDA; color: #854F0B; }
        .badge-scratch { background: #EEEDFE; color: #3C3489; }
        .badge-bite    { background: #FCEBEB; color: #A32D2D; }
        .badge-nonbite { background: #E1F5EE; color: #0F6E56; }
        .btn-view { font-size: 0.75rem; padding: 4px 12px; background: #1a3a1a; color: white; border-radius: 99px; text-decoration: none; }
        .btn-view:hover { background: #2d6a2d; }
        .empty-state { text-align: center; padding: 3rem; color: #bbb; font-size: 0.88rem; }
        .empty-state a { color: #2d6a2d; font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

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
        <nav>
            <a href="{{ route('dashboard') }}" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
            <a href="{{ route('patients.index') }}" class="nav-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                Patient Registration
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                Hotspot Heatmap
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Barangay Records
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="nav-item logout">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
        </div>
    </aside>

    <main class="main">
        <div class="page-header">
            <div>
                <div class="page-title">Patient Registration</div>
                <div class="page-sub">All registered bite incident patients</div>
            </div>
            <a href="{{ route('patients.create') }}" class="btn-add">
                + Add Patient
            </a>
        </div>

        <div class="tabs">
            <a href="{{ route('patients.index') }}" class="tab {{ !request('filter') ? 'active' : '' }}">All Patients</a>
            <a href="{{ route('patients.index') }}?filter=vaccinated" class="tab {{ request('filter') == 'vaccinated' ? 'active' : '' }}">Vaccinated</a>
            <a href="{{ route('patients.index') }}?filter=unvaccinated" class="tab {{ request('filter') == 'unvaccinated' ? 'active' : '' }}">Unvaccinated</a>
        </div>

        @if (session('success'))
            <div class="success-box">{{ session('success') }}</div>
        @endif

        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Age / Sex</th>
                        <th>Address</th>
                        <th>Date of Exposure</th>
                        <th>Type</th>
                        <th>Source</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $patient->full_name }}</strong><br>
                                <span style="font-size:0.72rem;color:#aaa;">{{ $patient->contact_number ?? 'No contact' }}</span>
                            </td>
                            <td>{{ $patient->age }} / {{ $patient->sex }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->date_of_exposure)->format('M d, Y') }}</td>
                            <td>
                                @if($patient->type_of_exposure == 'Bite')
                                    <span class="badge badge-bite">Bite</span>
                                @elseif($patient->type_of_exposure == 'Scratch')
                                    <span class="badge badge-scratch">Scratch</span>
                                @else
                                    <span class="badge badge-nonbite">Non-Bite</span>
                                @endif
                            </td>
                            <td>
                                @if(str_contains($patient->source_of_exposure, 'Dog'))
                                    <span class="badge badge-dog">{{ $patient->source_of_exposure }}</span>
                                @else
                                    <span class="badge badge-cat">{{ $patient->source_of_exposure }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('patients.show', $patient->id) }}" class="btn-view">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    No patients registered yet.<br>
                                    <a href="{{ route('patients.create') }}">Register your first patient →</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
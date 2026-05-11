<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
</head>
<body>

    @include('layouts.adminSidebar')

    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <div class="topbar-title">Admin Dashboard</div>
                <div class="topbar-sub">User Management — {{ date('F Y') }}</div>
            </div>
            <div class="topbar-user">
                <div class="user-avatar">AD</div>
                Admin
            </div>
        </div>

        <!-- 3 STAT CARDS -->
        <div class="stat-grid">

            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Users</div>
                    <div class="stat-num">{{ $users->count() }}</div>
                    <div class="stat-sub">Registered in system</div>
                </div>
                <div class="stat-icon" style="background-color: #e0f2e9; color: #2d6a2d;">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card">
                <div>
                    <div class="stat-label">Active Users</div>
                    <div class="stat-num">{{ $users->count() }}</div>
                    <div class="stat-sub">Currently active</div>
                </div>
                <div class="stat-icon" style="background-color: #dcfce7; color: #166534;">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card">
                <div>
                    <div class="stat-label">Inactive Users</div>
                    <div class="stat-num">0</div>
                    <div class="stat-sub">Disabled accounts</div>
                </div>
                <div class="stat-icon" style="background-color: #f3f4f6; color: #6b7280;">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                </div>
            </div>

        </div>

        <!-- USERS TABLE -->
        <div class="panel">
            <div class="panel-header">
                <div>
                    <div class="panel-title">System Users</div>
                    <div class="panel-sub">{{ $users->count() }} registered CHO staff account{{ $users->count() !== 1 ? 's' : '' }}</div>
                </div>
                <a href="{{ route('admin.accounts') }}" class="btn-add">Manage Accounts</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $i => $user)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">
                                    {{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}
                                </div>
                                {{ $user->first_name }} {{ $user->last_name }}
                            </div>
                        </td>
                        <td>{{ $user->username }}</td>
                        <td><span class="badge badge-staff">CHO Staff</span></td>
                        <td style="font-size:0.78rem; color:#9ca3af;">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:2rem; color:#9ca3af; font-size:0.82rem;">
                            No staff accounts yet.
                            <a href="{{ route('admin.accounts') }}" style="color:#2d6a2d; font-weight:600;">Go to Account Management</a> to add one.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>

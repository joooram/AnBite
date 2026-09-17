<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Account Management</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <style>
        /* Extra styles specific to this page only */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.82rem;
            font-weight: 500;
            margin-bottom: 1.2rem;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn { from { opacity:0; transform:translateY(-6px); } to { opacity:1; transform:translateY(0); } }
        .alert-success { background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; }
        .alert-error   { background:#fef2f2; border:1px solid #fecaca; color:#dc2626; }
        .alert svg { flex-shrink:0; margin-top:1px; }
    </style>
</head>
<body>

    @include('layouts.adminSidebar')

    <main class="main">

        {{-- TOPBAR --}}
        <div class="topbar">
            <div>
                <div class="topbar-title">Account Management</div>
                <div class="topbar-sub">Manage CHO staff accounts — {{ date('F Y') }}</div>
            </div>
            <div class="topbar-user">
                <div class="user-avatar">AD</div>
                Admin
            </div>
        </div>

        {{-- SUCCESS / ERROR ALERTS --}}
        @if (session('success'))
            <div class="alert alert-success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- ACCOUNTS TABLE --}}
        <div class="panel">
            <div class="panel-header">
                <div>
                    <div class="panel-title">CHO Staff Accounts</div>
                    <div class="panel-sub">{{ $users->count() }} registered staff account{{ $users->count() !== 1 ? 's' : '' }}</div>
                </div>
                <button class="btn-add" onclick="openModal()">+ Add New CHO Staff</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Reset Password</th>
                        <th>Actions</th>
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
                        <td>
                            <form action="{{ route('admin.updatePassword', $user->id) }}" method="POST" class="reset-pw-form">
                                @csrf
                                @method('POST')
                                <input type="password" name="new_password" class="pw-input" placeholder="New password (min 8 chars)" minlength="8" required>
                                <button type="submit" class="btn-add" style="border-radius:6px; padding:7px 14px; white-space:nowrap;">Reset</button>
                            </form>
                        </td>
                        <td>
                            {{-- EDIT BUTTON --}}
                            <button class="action-btn"
                                onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->first_name) }}', '{{ addslashes($user->last_name) }}', '{{ addslashes($user->username) }}')">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>

                            {{-- DELETE BUTTON --}}
                            <form action="{{ route('admin.destroyStaff', $user->id) }}" method="POST" style="display:inline;"
                                  onsubmit="return confirm('Delete account of {{ $user->first_name }} {{ $user->last_name }}? This cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn danger">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:2rem; color:#9ca3af; font-size:0.82rem;">
                            No CHO staff accounts yet. Click <strong>+ Add New CHO Staff</strong> to create one.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>

    {{-- ADD STAFF MODAL --}}
    @include('auth.modal-AccountManagement')

    {{-- EDIT STAFF MODAL --}}
    @include('auth.modal-EditStaff')

</body>
</html>

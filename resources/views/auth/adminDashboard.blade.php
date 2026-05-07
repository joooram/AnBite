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
                    <div class="stat-num">6</div>
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
                    <div class="stat-num">5</div>
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
                    <div class="stat-num">1</div>
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
                    <div class="panel-sub">All registered CHO staff accounts</div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar">MJM</div>
                                Marl Joram Mapa
                            </div>
                        </td>
                        <td>CHO Staff 1</td>
                        <td>mapa@gmail.com</td>
                        <td><span class="badge badge-staff">Staff</span></td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C2</div>
                                Maria Santos
                            </div>
                        </td>
                        <td>cho_staff2</td>
                        <td>cho.staff2@gmail.com</td>
                        <td><span class="badge badge-staff">Staff</span></td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C3</div>
                                Juan dela Cruz
                            </div>
                        </td>
                        <td>cho_staff3</td>
                        <td>cho.staff3@gmail.com</td>
                        <td><span class="badge badge-staff">Staff</span></td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C4</div>
                                Ana Reyes
                            </div>
                        </td>
                        <td>cho_staff4</td>
                        <td>cho.staff4@gmail.com</td>
                        <td><span class="badge badge-staff">Staff</span></td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C5</div>
                                Pedro Lim
                            </div>
                        </td>
                        <td>cho_staff5</td>
                        <td>cho.staff5@gmail.com</td>
                        <td><span class="badge badge-staff">Staff</span></td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#9ca3af;">C6</div>
                                Rosa Mendoza
                            </div>
                        </td>
                        <td>cho_staff6</td>
                        <td>cho.staff6@gmail.com</td>
                        <td><span class="badge badge-staff">Staff</span></td>
                        <td><span class="badge badge-inactive">Inactive</span></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>

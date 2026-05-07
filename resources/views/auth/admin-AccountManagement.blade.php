<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Account Management</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
</head>
<body>

    @include('layouts.adminSidebar')

    <main class="main">

        <!-- TOPBAR -->
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

        <!-- ACCOUNTS TABLE -->
        <div class="panel">
            <div class="panel-header">
                <div>
                    <div class="panel-title">CHO Staff Accounts</div>
                    <div class="panel-sub">All registered staff with system access</div>
                </div>
                <a href="#" class="btn-add">+ Add New CHO Staff</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Reset Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar">JR</div>
                                Joram Reyes
                            </div>
                        </td>
                        <td>cho_staff1</td>
                        <td>joram@gmail.com</td>
                        <td>
                            <form class="reset-pw-form">
                                <input type="password" class="pw-input" placeholder="Type new password...">
                                <button type="submit" class="btn-add" style="border-radius:6px; padding: 7px 14px;">Save</button>
                            </form>
                        </td>
                        <td>
                            <button class="action-btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <button class="action-btn danger">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C2</div>
                                Maria Santos
                            </div>
                        </td>
                        <td>cho_staff2</td>
                        <td>cho.staff2@gmail.com</td>
                        <td>
                            <form class="reset-pw-form">
                                <input type="password" class="pw-input" placeholder="Type new password...">
                                <button type="submit" class="btn-add" style="border-radius:6px; padding: 7px 14px;">Save</button>
                            </form>
                        </td>
                        <td>
                            <button class="action-btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <button class="action-btn danger">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C3</div>
                                Juan dela Cruz
                            </div>
                        </td>
                        <td>cho_staff3</td>
                        <td>cho.staff3@gmail.com</td>
                        <td>
                            <form class="reset-pw-form">
                                <input type="password" class="pw-input" placeholder="Type new password...">
                                <button type="submit" class="btn-add" style="border-radius:6px; padding: 7px 14px;">Save</button>
                            </form>
                        </td>
                        <td>
                            <button class="action-btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <button class="action-btn danger">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C4</div>
                                Ana Reyes
                            </div>
                        </td>
                        <td>cho_staff4</td>
                        <td>cho.staff4@gmail.com</td>
                        <td>
                            <form class="reset-pw-form">
                                <input type="password" class="pw-input" placeholder="Type new password...">
                                <button type="submit" class="btn-add" style="border-radius:6px; padding: 7px 14px;">Save</button>
                            </form>
                        </td>
                        <td>
                            <button class="action-btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <button class="action-btn danger">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#2d6a2d;">C5</div>
                                Pedro Lim
                            </div>
                        </td>
                        <td>cho_staff5</td>
                        <td>cho.staff5@gmail.com</td>
                        <td>
                            <form class="reset-pw-form">
                                <input type="password" class="pw-input" placeholder="Type new password...">
                                <button type="submit" class="btn-add" style="border-radius:6px; padding: 7px 14px;">Save</button>
                            </form>
                        </td>
                        <td>
                            <button class="action-btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <button class="action-btn danger">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="table-avatar" style="background:#9ca3af;">C6</div>
                                Rosa Mendoza
                            </div>
                        </td>
                        <td>cho_staff6</td>
                        <td>cho.staff6@gmail.com</td>
                        <td>
                            <form class="reset-pw-form">
                                <input type="password" class="pw-input" placeholder="Type new password...">
                                <button type="submit" class="btn-add" style="border-radius:6px; padding: 7px 14px;">Save</button>
                            </form>
                        </td>
                        <td>
                            <button class="action-btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <button class="action-btn danger">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>

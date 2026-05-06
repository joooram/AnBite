<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Manage Staff Accounts</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; background-color: #f4f7f6; font-family: 'Poppins', sans-serif;">

    @include('layouts.adminSidebar')

    <div style="margin-left: 230px; padding: 40px; min-height: 100vh; box-sizing: border-box;">
        
        <h2 style="color: #1a4331; margin-bottom: 25px; font-weight: 700; font-size: 1.8rem;">Admin Dashboard – Manage Staff Accounts</h2>

        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 6px; margin-bottom: 25px; border: 1px solid #c3e6cb; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 800px; text-align: left;">
                <thead>
                    <tr style="background-color: #1a4331; color: white;">
                        <th style="padding: 18px 20px; font-weight: 600; font-size: 1rem;">Name</th>
                        <th style="padding: 18px 20px; font-weight: 600; font-size: 1rem;">Username</th>
                        <th style="padding: 18px 20px; font-weight: 600; font-size: 1rem;">Email</th>
                        <th style="padding: 18px 20px; font-weight: 600; font-size: 1rem;">Reset Password</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users))
                        @foreach($users as $user)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 15px 20px; color: #111827; font-weight: 600;">{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td style="padding: 15px 20px; color: #4b5563; font-weight: 500;">{{ $user->username }}</td>
                            <td style="padding: 15px 20px; color: #4b5563; font-weight: 500;">{{ $user->email }}</td>
                            <td style="padding: 15px 20px;">
                                
                                <form action="{{ route('admin.updatePassword', $user->id) }}" method="POST" style="display: flex; gap: 10px; margin: 0; align-items: center;" onsubmit="return confirm('Are you sure you want to change the password for this account?');">
                                    @csrf
                                    <input type="password" name="new_password" placeholder="Type new password" required minlength="8" style="padding: 10px 15px; border: 1px solid #d1d5db; border-radius: 6px; flex: 1; outline: none; font-family: 'Poppins', sans-serif; font-size: 0.9rem;">
                                    <button type="submit" style="background-color: #1a4331; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: 600; font-family: 'Poppins', sans-serif; transition: background-color 0.2s;">Save</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="padding: 30px; text-align: center; color: #6b7280; font-style: italic;">No staff accounts found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>
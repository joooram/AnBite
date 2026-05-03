{{-- adminPage.blade.php --}}

<div style="padding: 20px; font-family: sans-serif;">
    <h2 style="color: #2a5240;">Admin Dashboard - Manage Staff Accounts</h2>

    {{-- Lalabas ito kapag successful ang pagpalit ng password --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; background: white; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #2a5240; color: white; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Username</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Email</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Reset Password</th>
            </tr>
        </thead>
        <tbody>
            {{-- Iikot ang loop na ito para ilista lahat ng registered users --}}
            @foreach($users as $user)
            <tr>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $user->first_name }} {{ $user->last_name }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $user->username }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $user->email }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">
                    
                    {{-- Form para mag-type at mag-save ng bagong password --}}
                    <form action="{{ route('admin.updatePassword', $user->id) }}" method="POST" style="display: flex; gap: 5px; margin: 0;" onsubmit="return confirm('Are you sure you want to change the password for this account?');">
                        @csrf
                        <input type="password" name="new_password" placeholder="Type new password" required minlength="8" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; flex: 1;">
                        <button type="submit" style="background-color: #305930; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">Save</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
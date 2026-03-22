<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; margin: 0; padding: 2rem; }
        .container { max-width: 480px; margin: 0 auto; background: white; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: #1a3a1a; padding: 2rem; text-align: center; }
        .header h1 { color: white; font-size: 1.5rem; margin: 0; }
        .header p { color: rgba(255,255,255,0.7); font-size: 0.82rem; margin: 4px 0 0; }
        .body { padding: 2rem; }
        .greeting { font-size: 1rem; color: #333; margin-bottom: 1rem; }
        .message { font-size: 0.88rem; color: #666; line-height: 1.6; margin-bottom: 1.5rem; }
        .otp-box { background: #f3f4f6; border: 2px dashed #1a3a1a; border-radius: 12px; padding: 1.5rem; text-align: center; margin-bottom: 1.5rem; }
        .otp-code { font-size: 2.5rem; font-weight: 800; color: #1a3a1a; letter-spacing: 0.3em; }
        .otp-label { font-size: 0.75rem; color: #888; margin-top: 4px; }
        .warning { background: #FAEEDA; border-radius: 8px; padding: 10px 14px; font-size: 0.78rem; color: #854F0B; margin-bottom: 1rem; }
        .footer { background: #f8f8f8; padding: 1rem 2rem; text-align: center; font-size: 0.72rem; color: #aaa; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>AnBite</h1>
            <p>Tracking System for Rabies Prevention, Control and Management</p>
        </div>
        <div class="body">
            <p class="greeting">Hello, {{ $first_name }}!</p>
            <p class="message">
                Thank you for registering with the AnBite system of the City Health Office.
                Please use the verification code below to activate your account.
            </p>
            <div class="otp-box">
                <div class="otp-code">{{ $otp }}</div>
                <div class="otp-label">Your 6-digit verification code</div>
            </div>
            <div class="warning">
                This code expires in <strong>10 minutes</strong>. Do not share this code with anyone.
            </div>
            <p class="message">
                If you did not register for AnBite, please ignore this email.
            </p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} AnBite — Batangas City Health Office. All rights reserved.
        </div>
    </div>
</body>
</html>
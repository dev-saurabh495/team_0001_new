<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Team 0001</title>
    <style>
        body { margin: 0; padding: 0; background: #f4f7fb; font-family: Arial, Helvetica, sans-serif; color: #0D1B2A; }
        .wrapper { max-width: 620px; margin: 0 auto; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 18px; overflow: hidden; }
        .header { padding: 30px 24px; text-align: center; background: linear-gradient(135deg, #0D1B2A, #1B263B); }
        .logo-wrap { width: 78px; height: 78px; margin: 0 auto 18px; border-radius: 50%; background: #ffffff; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 24px rgba(13,27,42,.18); }
        .logo-wrap img { width: 54px; height: 54px; object-fit: contain; }
        .brand { color: #ffffff; font-size: 22px; font-weight: 700; letter-spacing: .28em; }
        .brand span { color: #D4AF37; }
        .body { padding: 36px 32px 20px; }
        .eyebrow { color: #987719; font-size: 12px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; }
        .title { margin: 12px 0 16px; color: #0D1B2A; font-size: 30px; line-height: 1.2; }
        .text { margin: 0 0 20px; color: #475569; font-size: 16px; line-height: 1.7; }
        .welcome-box { margin: 24px 0; padding: 20px; border: 1px solid #f0d778; border-radius: 12px; background: #fff8dc; color: #0D1B2A; font-size: 16px; line-height: 1.6; }
        .foot { padding: 0 32px 32px; color: #64748b; font-size: 14px; line-height: 1.7; }
        @media only screen and (max-width: 620px) { .body, .foot { padding-left: 18px; padding-right: 18px; } }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo-wrap">
                <img src="{{ asset('images/logo.png') }}" alt="Team 0001 logo">
            </div>
            <div class="brand">TEAM <span>0001</span></div>
        </div>
        <div class="body">
            <div class="eyebrow">Your journey starts here</div>
            <h1 class="title">Welcome, {{ $user->name }}!</h1>
            <p class="text">Your Team 0001 account is verified and ready. We are glad to have you with us.</p>
            <div class="welcome-box">Together, we turn youth energy into meaningful community impact.</div>
            <p class="text">You can now sign in and start exploring the Team 0001 community.</p>
        </div>
        <div class="foot">
            <p>Thank you for joining us.</p>
            <p>Warm regards,<br>Team 0001</p>
        </div>
    </div>
</body>
</html>

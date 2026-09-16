<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team 0001 OTP Verification</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f7fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #0D1B2A;
        }
        .wrapper {
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }
        .header {
            background: linear-gradient(135deg, #0D1B2A 0%, #1B263B 100%);
            padding: 28px 24px;
            text-align: center;
        }
        .logo-wrap {
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 24px rgba(13,27,42,0.18);
        }
        .logo-wrap img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }
        .brand {
            color: #ffffff;
            letter-spacing: 0.28em;
            font-size: 22px;
            font-weight: 700;
        }
        .brand span {
            color: #D4AF37;
        }
        .body {
            padding: 34px 32px 20px;
        }
        .title {
            font-size: 28px;
            line-height: 1.2;
            margin: 0 0 16px;
            color: #0D1B2A;
        }
        .text {
            font-size: 16px;
            line-height: 1.7;
            color: #475569;
            margin: 0 0 24px;
        }
        .otp-box {
            background: #fff8dc;
            border: 1px solid #f0d778;
            border-radius: 12px;
            text-align: center;
            padding: 22px 18px;
            margin: 18px 0 26px;
        }
        .otp-label {
            font-size: 12px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #7a5f14;
            margin-bottom: 10px;
            display: block;
        }
        .otp-code {
            font-size: 34px;
            letter-spacing: 0.18em;
            font-weight: 700;
            color: #0D1B2A;
        }
        .foot {
            padding: 0 32px 32px;
            font-size: 14px;
            line-height: 1.7;
            color: #475569;
        }
        .button {
            display: inline-block;
            background: #D4AF37;
            color: #0D1B2A;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 700;
            margin-top: 10px;
        }
        @media only screen and (max-width: 620px) {
            .body, .foot {
                padding-left: 18px;
                padding-right: 18px;
            }
        }
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
            <h1 class="title">Verify your email</h1>
            <p class="text">Hello {{ $user->name }},</p>
            <p class="text">Use the one-time verification code below to complete your Team 0001 signup.</p>

            <div class="otp-box">
                <span class="otp-label">Verification code</span>
                <div class="otp-code">{{ $otp }}</div>
            </div>

            <p class="text">This code expires in 10 minutes. If you didn’t create this account, you can ignore this email.</p>
        </div>

        <div class="foot">
            <p>Need help? Contact Team 0001 support.</p>
            <p>Best regards,<br>Team 0001</p>
        </div>
    </div>
</body>
</html>

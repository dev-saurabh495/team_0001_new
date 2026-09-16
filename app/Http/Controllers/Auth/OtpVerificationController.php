<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Team0001WelcomeMail;
use App\Models\User;
use App\Notifications\Team0001ActivityNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class OtpVerificationController extends Controller
{
    public function show(): View
    {
        return view('auth.otp-verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        if (! $user->otp_expires_at || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'This OTP has expired. Please request a new one.']);
        }

        if (! Hash::check($request->otp, $user->email_otp ?? '')) {
            return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }

        $user->update([
            'email_verified_at' => now(),
            'email_otp' => null,
            'otp_expires_at' => null,
        ]);

        auth()->login($user);
        $request->session()->regenerate();
        $request->session()->forget('otp_email');

        Mail::to($user->email)->send(new Team0001WelcomeMail($user));
        $user->notify(new Team0001ActivityNotification(
            'Welcome to Team 0001',
            'Your account is verified and ready to make an impact.',
            'welcome',
            route('profile.edit'),
        ));

        return redirect()->route('dashboard')->with('status', 'Email verified successfully. Welcome to Team 0001!');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Team0001OtpMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $key = 'register:' . Str::lower($request->ip());

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withInput($request->except([
                    'password',
                    'password_confirmation',
                ]))
                ->withErrors([
                    'email' => "Too many registration attempts. Please try again in {$seconds} seconds.",
                ]);
        }

        RateLimiter::hit($key, 60);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
                'regex:/^[+()0-9\s-]{7,30}$/',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],

            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'terms' => [
                'required',
                'accepted',
            ],
        ], [
            'name.required' => 'Please enter your full name.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'An account with this email already exists.',

            'phone.regex' => 'Please enter a valid phone number.',

            'password.confirmed' => 'The passwords do not match.',

            'profile_picture.image' => 'Please upload a valid image file.',
            'profile_picture.mimes' => 'Profile picture must be a JPG, JPEG, PNG, or WEBP file.',
            'profile_picture.max' => 'Profile picture must not exceed 2MB.',

            'terms.accepted' => 'You must accept the Terms of Service and Community Guidelines.',
        ]);

        $otp = random_int(100000, 999999);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'email_otp' => Hash::make((string) $otp),
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');

            $user->update([
                'profile_picture' => $path,
            ]);
        }

        Mail::to($user->email)->send(
            new Team0001OtpMail($user, $otp)
        );

        RateLimiter::clear($key);

        $request->session()->put('otp_email', $user->email);

        return redirect()
            ->route('otp.verify')
            ->with('status', 'Your account has been created. Please enter the 6-digit OTP sent to your email.');
    }
}

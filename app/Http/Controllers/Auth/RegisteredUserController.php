<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        /*
         * Rate-limit registration attempts by IP address.
         *
         * This helps prevent automated account creation.
         */
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

        /*
         * Validate the request.
         */
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
                'email:rfc,dns',
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

            'terms.accepted' => 'You must accept the Terms of Service and Community Guidelines.',
        ]);

        /*
         * Create the user.
         *
         * Hash::make() ensures the raw password is never stored.
         */
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        /*
         * Fire Laravel's Registered event.
         *
         * This is useful for email verification and other
         * registration-related listeners.
         */
        event(new Registered($user));

        /*
         * Log the user in immediately after registration so they can access
         * the verification page, but keep the account unverified until they
         * confirm their email address.
         */
        auth()->login($user);

        /*
         * Regenerate the session ID to prevent session fixation.
         */
        $request->session()->regenerate();

        /*
         * Clear the rate limiter after successful registration.
         */
        RateLimiter::clear($key);

        return redirect()
            ->route('verification.notice')
            ->with('status', 'Account created successfully. Please verify your email to continue.');
    }
}

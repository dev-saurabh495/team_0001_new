<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $notifications = $user->notifications()->latest()->limit(8)->get();
        $unreadNotifications = $user->unreadNotifications()->count();

        $stats = [
            [
                'label' => 'Community members',
                'value' => number_format($user::query()->count()),
                'detail' => 'Registered members',
                'icon' => '◎',
            ],
            [
                'label' => 'Account days',
                'value' => $user->created_at?->diffInDays(now()) ?? 0,
                'detail' => 'Since joining Team 0001',
                'icon' => '◷',
            ],
            [
                'label' => 'Notifications',
                'value' => number_format($user->notifications()->count()),
                'detail' => $unreadNotifications . ' unread',
                'icon' => '◆',
            ],
            [
                'label' => 'Email status',
                'value' => $user->hasVerifiedEmail() ? 'OK' : 'Pending',
                'detail' => $user->hasVerifiedEmail() ? 'Verified account' : 'Verify your email',
                'icon' => $user->hasVerifiedEmail() ? '✓' : '!',
            ],
        ];

        return view('dashboard', compact('notifications', 'unreadNotifications', 'stats'));
    }
}

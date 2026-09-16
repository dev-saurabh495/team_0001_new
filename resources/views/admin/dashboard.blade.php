@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    @php
        $stats = [
            'members' => 128,
            'events' => 14,
            'news' => 27,
            'gallery' => 46,
            'messages' => 18,
        ];
    @endphp

    <div class="space-y-6">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
            @foreach([
                ['label' => 'Total Members', 'value' => $stats['members'], 'change' => '+12%'],
                ['label' => 'Upcoming Events', 'value' => $stats['events'], 'change' => '+3 this month'],
                ['label' => 'Published News', 'value' => $stats['news'], 'change' => '+8 this week'],
                ['label' => 'Gallery Items', 'value' => $stats['gallery'], 'change' => '+5 new'],
                ['label' => 'Unread Messages', 'value' => $stats['messages'], 'change' => '4 urgent'],
            ] as $stat)
                <div class="rounded-2xl border border-border-subtle bg-surface p-4 shadow-sm dark:border-border-subtle-dark dark:bg-surface-dark">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">{{ $stat['label'] }}</p>
                            <p class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">{{ $stat['value'] }}</p>
                        </div>
                        <span class="rounded-full bg-gold/10 px-2.5 py-1 text-[11px] font-medium text-gold-dark dark:text-gold">{{ $stat['change'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Overview</p>
                        <h2 class="mt-2 text-xl font-semibold text-text-primary dark:text-text-primary-dark">Recent activity</h2>
                    </div>
                    <span class="rounded-full border border-border-subtle px-2.5 py-1 text-xs text-text-secondary dark:border-border-subtle-dark dark:text-text-secondary-dark">Last 30 days</span>
                </div>

                <div class="space-y-4">
                    @foreach([
                        ['title' => 'Youth leadership forum published', 'meta' => 'News • 2 hours ago'],
                        ['title' => 'Volunteer onboarding kicked off', 'meta' => 'Members • 5 hours ago'],
                        ['title' => 'Community clean-up event added', 'meta' => 'Events • Yesterday'],
                        ['title' => 'Gallery album refreshed', 'meta' => 'Gallery • 2 days ago'],
                    ] as $item)
                        <div class="flex items-start gap-3 rounded-xl border border-border-subtle bg-background p-3 dark:border-border-subtle-dark dark:bg-background-dark">
                            <div class="mt-0.5 h-2.5 w-2.5 rounded-full bg-gold"></div>
                            <div>
                                <p class="font-medium text-text-primary dark:text-text-primary-dark">{{ $item['title'] }}</p>
                                <p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">{{ $item['meta'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Agenda</p>
                        <h2 class="mt-2 text-xl font-semibold text-text-primary dark:text-text-primary-dark">Upcoming events</h2>
                    </div>
                </div>

                <div class="space-y-3">
                    @foreach([
                        ['name' => 'Community Leaders Forum', 'date' => 'Sep 25', 'time' => '6:30 PM'],
                        ['name' => 'Volunteer Outreach Day', 'date' => 'Sep 28', 'time' => '9:00 AM'],
                        ['name' => 'Creative Youth Showcase', 'date' => 'Oct 02', 'time' => '4:00 PM'],
                    ] as $event)
                        <div class="flex items-center gap-3 rounded-xl border border-border-subtle bg-background p-3 dark:border-border-subtle-dark dark:bg-background-dark">
                            <div class="flex h-12 w-12 flex-col items-center justify-center rounded-xl bg-gold/10 text-center text-[11px] font-semibold text-gold-dark dark:text-gold">
                                <span>{{ explode(' ', $event['date'])[0] }}</span>
                                <span>{{ $event['date'] }}</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="truncate font-medium text-text-primary dark:text-text-primary-dark">{{ $event['name'] }}</p>
                                <p class="text-xs text-text-secondary dark:text-text-secondary-dark">{{ $event['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-2">
            <div class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Members</p>
                        <h2 class="mt-2 text-xl font-semibold text-text-primary dark:text-text-primary-dark">Recent members</h2>
                    </div>
                </div>

                <div class="space-y-3">
                    @foreach([
                        ['name' => 'Aisha K.', 'role' => 'Volunteer'],
                        ['name' => 'Daniel M.', 'role' => 'Coordinator'],
                        ['name' => 'Leah T.', 'role' => 'Member'],
                    ] as $member)
                        <div class="flex items-center justify-between rounded-xl border border-border-subtle bg-background p-3 dark:border-border-subtle-dark dark:bg-background-dark">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gold/10 font-semibold text-gold-dark dark:text-gold">{{ strtoupper(substr($member['name'], 0, 1)) }}</div>
                                <div>
                                    <p class="font-medium text-text-primary dark:text-text-primary-dark">{{ $member['name'] }}</p>
                                    <p class="text-xs text-text-secondary dark:text-text-secondary-dark">{{ $member['role'] }}</p>
                                </div>
                            </div>
                            <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-medium text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">Active</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Messages</p>
                        <h2 class="mt-2 text-xl font-semibold text-text-primary dark:text-text-primary-dark">Recent messages</h2>
                    </div>
                </div>

                <div class="space-y-3">
                    @foreach([
                        ['title' => 'Partnership opportunity', 'detail' => 'From: City Youth Council • 1 hour ago'],
                        ['title' => 'Volunteer request', 'detail' => 'From: Community office • 3 hours ago'],
                        ['title' => 'Event feedback', 'detail' => 'From: Media team • 1 day ago'],
                    ] as $message)
                        <div class="rounded-xl border border-border-subtle bg-background p-3 dark:border-border-subtle-dark dark:bg-background-dark">
                            <p class="font-medium text-text-primary dark:text-text-primary-dark">{{ $message['title'] }}</p>
                            <p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">{{ $message['detail'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

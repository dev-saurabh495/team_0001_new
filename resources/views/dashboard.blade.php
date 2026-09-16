<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Member workspace</p>
                <h1 class="mt-2 font-heading text-3xl text-text-primary dark:text-text-primary-dark sm:text-4xl">Good morning, {{ Str::before(Auth::user()->name, ' ') }}.</h1>
                <p class="mt-2 text-sm text-text-secondary dark:text-text-secondary-dark">Here is what is happening across your Team 0001 community.</p>
            </div>
            <div class="flex items-center gap-2">
                <label for="dashboard-theme" class="sr-only">Choose theme</label>
                <select id="dashboard-theme" x-model="theme" class="rounded-xl border border-border-subtle bg-surface px-3 py-2.5 text-xs font-semibold text-text-primary outline-none transition focus:border-gold focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark">
                    <option value="system">System theme</option><option value="light">Light mode</option><option value="dark">Dark mode</option>
                </select>
                <button type="button" class="rounded-xl border border-border-subtle bg-surface p-2.5 text-text-secondary transition hover:border-gold hover:text-gold-dark dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-secondary-dark dark:hover:text-gold" aria-label="View notifications">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="1.7" d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/></svg>
                </button>
            </div>
        </div>
    </x-slot>

    @php
        $stats = [
            ['label' => 'Community projects', 'value' => '12', 'detail' => '+2 this month', 'icon' => '◆', 'tone' => 'gold'],
            ['label' => 'Hours contributed', 'value' => '48', 'detail' => '8h ahead of goal', 'icon' => '◷', 'tone' => 'blue'],
            ['label' => 'People reached', 'value' => '286', 'detail' => '+18% this quarter', 'icon' => '◎', 'tone' => 'green'],
            ['label' => 'Impact score', 'value' => '84', 'detail' => 'Excellent standing', 'icon' => '✦', 'tone' => 'rose'],
        ];
    @endphp

    <div class="space-y-6">
        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats as $stat)
                <article class="group relative overflow-hidden rounded-2xl border border-border-subtle bg-surface p-5 shadow-[0_12px_35px_rgba(13,27,42,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_18px_40px_rgba(13,27,42,0.08)] dark:border-border-subtle-dark dark:bg-surface-dark dark:shadow-none">
                    <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-gold/5 transition group-hover:bg-gold/10"></div>
                    <div class="relative flex items-start justify-between">
                        <div><p class="text-xs font-medium text-text-secondary dark:text-text-secondary-dark">{{ $stat['label'] }}</p><p class="mt-3 text-3xl font-semibold tracking-tight text-text-primary dark:text-text-primary-dark">{{ $stat['value'] }}</p><p class="mt-2 text-xs font-medium text-emerald-600 dark:text-emerald-400">{{ $stat['detail'] }}</p></div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold/10 text-lg text-gold-dark dark:text-gold">{{ $stat['icon'] }}</span>
                    </div>
                </article>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
            <article class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark sm:p-6">
                <div class="flex items-start justify-between gap-4"><div><p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-gold-dark dark:text-gold">Your momentum</p><h2 class="mt-2 text-xl font-semibold text-text-primary dark:text-text-primary-dark">Community impact</h2></div><span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">On track</span></div>
                <div class="mt-8 flex items-end gap-2"><span class="text-5xl font-semibold tracking-tight text-text-primary dark:text-text-primary-dark">84</span><span class="mb-2 text-sm text-text-secondary dark:text-text-secondary-dark">/ 100 impact score</span></div>
                <div class="mt-5 h-3 overflow-hidden rounded-full bg-background dark:bg-background-dark"><div class="h-full w-[84%] rounded-full bg-gradient-to-r from-gold-dark to-gold"></div></div>
                <div class="mt-5 grid grid-cols-3 gap-4 border-t border-border-subtle pt-5 dark:border-border-subtle-dark"><div><p class="text-lg font-semibold text-text-primary dark:text-text-primary-dark">6</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Active initiatives</p></div><div><p class="text-lg font-semibold text-text-primary dark:text-text-primary-dark">24</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">New connections</p></div><div><p class="text-lg font-semibold text-text-primary dark:text-text-primary-dark">92%</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Goal completion</p></div></div>
            </article>
            <article class="rounded-2xl border border-navy bg-navy p-6 text-white shadow-[0_18px_40px_rgba(13,27,42,0.16)]"><div class="flex items-start justify-between"><div><p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-gold">Next up</p><h2 class="mt-2 text-xl font-semibold">Leadership forum</h2></div><span class="rounded-lg bg-white/10 px-2.5 py-1 text-xs text-slate-200">SEP 25</span></div><p class="mt-5 text-sm leading-6 text-slate-300">Connect with young leaders and shape the next community action plan.</p><div class="mt-6 flex items-center justify-between border-t border-white/10 pt-5"><span class="text-xs text-slate-300">6:30 PM · Main hall</span><span class="flex -space-x-2"><span class="flex h-7 w-7 items-center justify-center rounded-full border-2 border-navy bg-gold text-[10px] font-bold text-navy">AK</span><span class="flex h-7 w-7 items-center justify-center rounded-full border-2 border-navy bg-slate-300 text-[10px] font-bold text-navy">DM</span><span class="flex h-7 w-7 items-center justify-center rounded-full border-2 border-navy bg-white text-[10px] font-bold text-navy">+8</span></span></div></article>
        </section>

        <section class="grid gap-6 xl:grid-cols-[1fr_1fr_0.82fr]">
            <article class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark"><div class="flex items-center justify-between"><div><p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Timeline</p><h2 class="mt-2 text-lg font-semibold text-text-primary dark:text-text-primary-dark">Recent activity</h2></div><button class="text-xs font-semibold text-gold-dark hover:text-gold dark:text-gold">View all</button></div><div class="mt-5 space-y-5"><div class="flex gap-3"><span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-gold ring-4 ring-gold/10"></span><div><p class="text-sm font-medium text-text-primary dark:text-text-primary-dark">You joined the clean-up initiative</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Today · 10:24 AM</p></div></div><div class="flex gap-3"><span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-emerald-500 ring-4 ring-emerald-500/10"></span><div><p class="text-sm font-medium text-text-primary dark:text-text-primary-dark">Impact score reached 84</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Yesterday · 4:12 PM</p></div></div><div class="flex gap-3"><span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-sky-500 ring-4 ring-sky-500/10"></span><div><p class="text-sm font-medium text-text-primary dark:text-text-primary-dark">New community connection added</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Sep 14 · 1:08 PM</p></div></div></div></article>
            <article class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark"><div class="flex items-center justify-between"><div><p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Quick actions</p><h2 class="mt-2 text-lg font-semibold text-text-primary dark:text-text-primary-dark">Make an impact</h2></div></div><div class="mt-5 grid grid-cols-2 gap-3"><a href="#" class="rounded-xl border border-border-subtle p-4 transition hover:border-gold hover:bg-gold/5 dark:border-border-subtle-dark"><span class="text-xl text-gold">＋</span><p class="mt-3 text-sm font-semibold text-text-primary dark:text-text-primary-dark">Join a project</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Find your next cause</p></a><a href="#" class="rounded-xl border border-border-subtle p-4 transition hover:border-gold hover:bg-gold/5 dark:border-border-subtle-dark"><span class="text-xl text-gold">↗</span><p class="mt-3 text-sm font-semibold text-text-primary dark:text-text-primary-dark">Invite a friend</p><p class="mt-1 text-xs text-text-secondary dark:text-text-secondary-dark">Grow the movement</p></a></div></article>
            <article class="rounded-2xl border border-border-subtle bg-surface p-5 dark:border-border-subtle-dark dark:bg-surface-dark"><p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-text-secondary dark:text-text-secondary-dark">Community note</p><h2 class="mt-2 text-lg font-semibold text-text-primary dark:text-text-primary-dark">Small actions matter.</h2><p class="mt-4 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">Every hour you contribute helps build a more connected and active community.</p><div class="mt-6 h-1.5 rounded-full bg-background dark:bg-background-dark"><div class="h-full w-3/4 rounded-full bg-gold"></div></div><p class="mt-2 text-right text-xs font-semibold text-gold-dark dark:text-gold">75% of this month’s goal</p></article>
        </section>
    </div>
</x-app-layout>

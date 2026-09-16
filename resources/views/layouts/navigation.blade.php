<nav x-data="{ open: false }" class="fixed inset-x-0 top-0 z-40 lg:inset-y-0 lg:right-auto lg:w-72">
    <div class="flex h-16 items-center justify-between border-b border-border-subtle bg-surface px-4 dark:border-border-subtle-dark dark:bg-surface-dark lg:h-full lg:flex-col lg:items-stretch lg:border-b-0 lg:border-r lg:px-5 lg:py-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3" aria-label="Team 0001 dashboard">
            <span class="team0001-logo-badge h-11 w-11 shrink-0"><img src="{{ asset('images/logo.png') }}" alt="Team 0001 logo"></span>
            <span class="font-heading text-lg tracking-[0.2em] text-text-primary dark:text-text-primary-dark">TEAM <span class="text-gold">0001</span></span>
        </a>
        <button type="button" @click="open = !open" class="rounded-xl p-2 text-text-secondary hover:bg-background dark:text-text-secondary-dark dark:hover:bg-background-dark lg:hidden" aria-label="Toggle navigation">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

        <div :class="open ? 'block' : 'hidden'" class="absolute left-0 right-0 top-16 border-b border-border-subtle bg-surface px-4 py-4 shadow-xl dark:border-border-subtle-dark dark:bg-surface-dark lg:static lg:flex lg:flex-1 lg:flex-col lg:border-0 lg:bg-transparent lg:px-0 lg:py-0 lg:shadow-none dark:lg:bg-transparent">
            <div class="mt-7 hidden px-3 lg:block"><p class="text-[10px] font-semibold uppercase tracking-[0.28em] text-text-secondary dark:text-text-secondary-dark">Workspace</p></div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-gold text-navy shadow-[0_10px_24px_rgba(212,175,55,0.18)]' : 'text-text-secondary hover:bg-background hover:text-text-primary dark:text-text-secondary-dark dark:hover:bg-background-dark dark:hover:text-text-primary-dark' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="1.7" d="m4 13 7-9 2 6h7l-7 9-2-6H4Z"/></svg>Overview
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-text-secondary transition hover:bg-background hover:text-text-primary dark:text-text-secondary-dark dark:hover:bg-background-dark dark:hover:text-text-primary-dark">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="none" stroke-width="1.7" d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7 8a7 7 0 0 0-14 0"/></svg>My profile
                </a>
                @hasanyrole('super-admin|admin|editor')
                    <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-text-secondary transition hover:bg-background hover:text-text-primary dark:text-text-secondary-dark dark:hover:bg-background-dark dark:hover:text-text-primary-dark">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="1.7" d="M4 19V5m0 14h16M8 16v-5m4 5V7m4 9v-3"/></svg>Admin console
                    </a>
                @endhasanyrole
            </div>
            <div class="mt-auto hidden border-t border-border-subtle pt-5 dark:border-border-subtle-dark lg:block">
                <div class="mb-4 flex items-center gap-3 px-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gold/15 font-semibold text-gold-dark dark:text-gold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <div class="min-w-0"><p class="truncate text-sm font-semibold text-text-primary dark:text-text-primary-dark">{{ Auth::user()->name }}</p><p class="truncate text-xs text-text-secondary dark:text-text-secondary-dark">{{ Auth::user()->email }}</p></div>
                </div>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-text-secondary transition hover:bg-red-50 hover:text-red-600 dark:text-text-secondary-dark dark:hover:bg-red-500/10 dark:hover:text-red-300"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="1.7" d="M15 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-3m4-8 3 3-3 3m3-3h-9"/></svg>Sign out</button></form>
            </div>
        </div>
    </div>
</nav>

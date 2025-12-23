<header id="main-header" class="absolute top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent">
    <nav class="container mx-auto flex items-center justify-between py-4 px-6">
        <div id="logo-text" class="flex items-center gap-2 text-xl font-bold text-white transition-colors duration-300">
            <img src="{{ asset('assets/logo-djingga.png') }}" alt="Djingga Logo" class="h-8 w-auto">
            <span>BaliGreen</span>
        </div>
        @php
            // determine active nav by current route/path
            $isHome = request()->routeIs('home') || request()->is('/');
            $isProfile = request()->routeIs('profile') || request()->is('profile*');
            $isProject = request()->is('project*') || request()->routeIs('project');
            $isActivity = request()->is('activity*') || request()->routeIs('activity');
            $isConsultation = request()->is('consultation*') || request()->routeIs('consultation');
        @endphp

        <ul class="flex space-x-6">
            <li>
                <a href="{{ route('home') }}" class="nav-link {{ $isHome ? 'active' : '' }} text-white transition-colors duration-300">Beranda</a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="nav-link {{ $isProfile ? 'active' : '' }} text-white transition-colors duration-300">Profil</a>
            </li>
            <li>
                <a href="{{ route('project') }}" class="nav-link {{ $isProject ? 'active' : '' }} text-white transition-colors duration-300">Project</a>
            </li>
            <li>
                <a href="{{ route('activity') }}" class="nav-link {{ $isActivity ? 'active' : '' }} text-white transition-colors duration-300">Aktivitas</a>
            </li>
            <li>
                <a href="{{ route('consultation') }}" class="nav-link {{ $isConsultation ? 'active' : '' }} text-white transition-colors duration-300">Konsultasi</a>
            </li>
        </ul>
    </nav>
</header>

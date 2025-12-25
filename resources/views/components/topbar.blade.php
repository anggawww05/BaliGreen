{{-- Simple Topbar Component for Dashboard --}}
<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
    <div class="flex items-center justify-between px-6 py-4">

        <div class="flex items-center space-x-4">
            <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div>
                <h1 class="text-xl font-semibold text-[#23272F]">Dashboard</h1>
                <p class="text-sm text-gray-500">Welcome back, Admin</p>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.edit-profile.index') }}" class="hidden md:block text-left hover:opacity-80 transition-opacity">
                <p class="text-sm font-medium text-[#23272F]">Super Admin</p>
            </a>
        </div>

    </div>
</header>

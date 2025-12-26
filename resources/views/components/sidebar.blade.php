<aside id="sidebar" class="fixed left-0 top-0 bottom-0 w-64 bg-white shadow-lg z-50 overflow-y-auto">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div>
                    <h2 class="text-lg font-bold text-[#23272F]">SAMDES</h2>
                    <p class="text-xs text-gray-500">Admin Panel</p>
                </div>
            </div>
        </div>
    </div>

    <nav class="p-4 space-y-2">
        @php $isActive = request()->routeIs('admin.statistic.index'); @endphp
        @php $isActive = request()->routeIs('admin.statistic.index'); @endphp
        <a href="{{ route('admin.statistic.index') }}"
            class="sidebar-menu-item group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ $isActive ? 'bg-[#52a08a]/10 translate-x-1' : 'hover:bg-[#52a08a]/10 hover:translate-x-1' }}">
            <div
                class="p-2 rounded-lg transition-all duration-200 {{ $isActive ? 'bg-[#52a08a] text-white' : 'bg-[#52a08a]/10 group-hover:bg-[#52a08a] group-hover:text-white' }}">
                <svg class="w-5 h-5 {{ $isActive ? 'text-white' : 'text-[#52a08a] group-hover:text-white' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                </svg>
            </div>
            <div class="flex-1">
                <span
                    class="text-[#23272F] font-medium text-sm transition-colors {{ $isActive ? 'text-[#52a08a]' : 'group-hover:text-[#52a08a]' }}">Dashboard</span>
            </div>
            <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4 text-[#52a08a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

        @php $isActive = request()->routeIs('admin.manage-user.index', 'admin.add-user.index', 'admin.detail-user.index', 'admin.edit-user.index'); @endphp
        <a href="{{ route('admin.manage-user.index') }}"
            class="sidebar-menu-item group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ $isActive ? 'bg-[#52a08a]/10 translate-x-1' : 'hover:bg-[#52a08a]/10 hover:translate-x-1' }}">
            <div
                class="p-2 rounded-lg transition-all duration-200 {{ $isActive ? 'bg-[#52a08a] text-white' : 'bg-[#52a08a]/10 group-hover:bg-[#52a08a] group-hover:text-white' }}">
                <svg class="w-5 h-5 {{ $isActive ? 'text-white' : 'text-[#52a08a] group-hover:text-white' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div class="flex-1">
                <span
                    class="text-[#23272F] font-medium text-sm transition-colors {{ $isActive ? 'text-[#52a08a]' : 'group-hover:text-[#52a08a]' }}">Kelola
                    Pengguna</span>
            </div>
            <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4 text-[#52a08a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

        @php $isActive = request()->routeIs('admin.request-pickup.index', 'admin.detail-pickup.index'); @endphp
        <a href="{{ route('admin.request-pickup.index') }}"
            class="sidebar-menu-item group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ $isActive ? 'bg-[#52a08a]/10 translate-x-1' : 'hover:bg-[#52a08a]/10 hover:translate-x-1' }}">
            <div
                class="p-2 rounded-lg transition-all duration-200 {{ $isActive ? 'bg-[#52a08a] text-white' : 'bg-[#52a08a]/10 group-hover:bg-[#52a08a] group-hover:text-white' }}">
                <svg class="w-5 h-5 {{ $isActive ? 'text-white' : 'text-[#52a08a] group-hover:text-white' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="flex-1">
                <span
                    class="text-[#23272F] font-medium text-sm transition-colors {{ $isActive ? 'text-[#52a08a]' : 'group-hover:text-[#52a08a]' }}">Penjemputan</span>
            </div>
            <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4 text-[#52a08a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>
    </nav>

    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center space-x-3 px-4 py-3 bg-linear-to-r from-[#52a08a] to-[#578E7E] text-white font-medium rounded-lg hover:opacity-95 transition-colors"
                aria-label="Logout">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

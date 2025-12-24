<aside id="sidebar"
    class="fixed left-0 top-0 bottom-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 overflow-y-auto lg:translate-x-0 lg:static border border-gray-300 min-h-screen rounded-xl">
    <div class="p-6 flex justify-center">
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-xl text-center">Profile Dashboard</h1>
        </div>
    </div>

    <nav class="p-4 space-y-2">
        @php $isActive = request()->routeIs('profile.index'); @endphp
        <a href="{{ route('profile.index') }}"
            class="block px-4 py-3 rounded-lg transition-all duration-300 {{ $isActive ? 'bg-[#52a08a] text-white' : 'text-gray-700 hover:bg-[#52a08a]/10 hover:text-[#5A7863] border-b-2 border-transparent hover:border-[#5A7863]' }}">
            <h1 class="font-medium">Profil</h1>
        </a>

        @php $isActive = request()->routeIs('schedule.index'); @endphp
        <a href="#"
            class="block px-4 py-3 rounded-lg transition-all duration-300 {{ $isActive ? 'bg-[#52a08a] text-white' : 'text-gray-700 hover:bg-[#52a08a]/10 hover:text-[#5A7863] border-b-2 border-transparent hover:border-[#5A7863]' }}">
            <h1 class="font-medium">Penjadwalan</h1>
        </a>

        @php $isActive = request()->routeIs('payment.index'); @endphp
        <a href="#"
            class="block px-4 py-3 rounded-lg transition-all duration-300 {{ $isActive ? 'bg-[#52a08a] text-white' : 'text-gray-700 hover:bg-[#52a08a]/10 hover:text-[#5A7863] border-b-2 border-transparent hover:border-[#5A7863]' }}">
            <h1 class="font-medium">Pembayaran</h1>
        </a>
    </nav>
</aside>

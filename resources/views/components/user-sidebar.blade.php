<aside id="sidebar"
    class="fixed left-0 top-0 bottom-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 overflow-y-auto lg:translate-x-0 lg:static border border-gray-300 min-h-screen rounded-xl">
    <div class="p-4 flex flex-col justify-center">
        <h1 class="font-bold text-lg text-center">Profile Dashboard</h1>
        <div class="h-1 bg-linear-to-r from-[#6F8E78] to-[#5A7863] rounded-lg mt-2"></div>
    </div>

    <nav class="p-4 space-y-2">
        @php $isActive = request()->routeIs('profile.index'); @endphp
        <a href="{{ route('profile.index') }}"
            class="block px-4 py-2 rounded-lg transition-colors duration-200 {{ $isActive ? 'bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white' : 'text-gray-700 hover:bg-linear-to-r hover:from-[#6F8E78] hover:to-[#5A7863] hover:text-white' }}">
            <h1 class="font-medium">Profil</h1>
        </a>
        @php $isActive = request()->routeIs('schedule.index'); @endphp
        <a href="{{ route('schedule.index') }}"
            class="block px-4 py-2 rounded-lg transition-colors duration-200 {{ $isActive ? 'bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white' : 'text-gray-700 hover:bg-linear-to-r hover:from-[#6F8E78] hover:to-[#5A7863] hover:text-white' }}">
            <h1 class="font-medium">Penjadwalan</h1>
        </a>
        @php $isActive = request()->routeIs('transaction.index'); @endphp
        <a href="{{ route('transaction.index') }}"
            class="block px-4 py-2 rounded-lg transition-colors duration-200 {{ $isActive ? 'bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white' : 'text-gray-700 hover:bg-linear-to-r hover:from-[#6F8E78] hover:to-[#5A7863] hover:text-white' }}">
            <h1 class="font-medium">Pembayaran</h1>
        </a>
    </nav>
</aside>

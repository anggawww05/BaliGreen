@extends('user.main')

@section('container')
    <div class="container mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Header with Points -->
        <div class="bg-gradient-to-r from-[#5A7863] to-[#52a08a] p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Data Pribadi</h1>
                    <p class="text-white/80">Informasi akun Anda</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4 text-center">
                    <p class="text-white/80 text-sm mb-1">Total Points</p>
                    <p class="text-4xl font-bold text-white">100</p>
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="p-6 space-y-6">
            <!-- Name -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-[#5A7863]/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#5A7863]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500">Nama Lengkap</p>
                    <p class="text-lg font-semibold text-gray-800">John Doe</p>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-[#5A7863]/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#5A7863]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="text-lg font-semibold text-gray-800">john.doe@example.com</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-[#5A7863]/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#5A7863]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500">Nomor Telepon</p>
                    <p class="text-lg font-semibold text-gray-800">08123456789</p>
                </div>
            </div>

            <!-- Address -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-[#5A7863]/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#5A7863]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500">Alamat</p>
                    <p class="text-lg font-semibold text-gray-800">Jl. Contoh No.123, Jakarta</p>
                </div>
            </div>

            <!-- Role -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-[#5A7863]/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#5A7863]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500">Role</p>
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                        User
                    </span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 pt-4">
                <a href="#" class="flex-1 bg-[#5A7863] hover:bg-[#52a08a] text-white font-semibold py-3 px-6 rounded-lg transition text-center">
                    Edit Profil
                </a>
                <a href="#" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition text-center">
                    Ubah Password
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

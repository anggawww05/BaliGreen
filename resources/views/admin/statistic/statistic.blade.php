@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard Statistik</h1>
        <div>
            <a href="{{ route('admin.manage-user.index') }}" class="text-sm text-gray-600 hover:underline">/Kelola
                Pengguna</a>
        </div>
        <h1 class="w-full h-24 border border-gray-300 flex items-center justify-center rounded-xl">
            Selamat datang di halaman dashboard, di mana Anda dapat mengelola dan memantau statistik pengguna dengan mudah.
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
            <div class="bg-white border border-gray-300 rounded-xl p-6 hover:shadow-md transition">
                <p class="text-gray-600 text-sm font-medium mb-2">Pengguna Terdaftar</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</h2>
            </div>
            <div class="bg-white border border-gray-300 rounded-xl p-6 hover:shadow-md transition">
                <p class="text-gray-600 text-sm font-medium mb-2">Pengguna Aktif</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $activeUsers ?? 0 }}</h2>
            </div>
            <div class="bg-white border border-gray-300 rounded-xl p-6 hover:shadow-md transition">
                <p class="text-gray-600 text-sm font-medium mb-2">Pengguna Baru</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $newUsers ?? 0 }}</h2>
            </div>
            <div class="bg-white border border-gray-300 rounded-xl p-6 hover:shadow-md transition">
                <p class="text-gray-600 text-sm font-medium mb-2">Total Aktivitas</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $totalActivities ?? 0 }}</h2>
            </div>
        </div>
    </div>
@endsection

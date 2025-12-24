@extends('user.main')

@section('container')
    <div class="w-full min-h-screen bg-white">
        <div class="max-w-6xl mx-auto ">
            <!-- Header Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-300">
                <div class="bg-linear-to-r from-[#6F8E78] to-[#5A7863] p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold text-white mb-2">Data Pribadi</h1>
                            <p class="text-white/80 text-lg">Informasi lengkap akun Anda</p>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-center">
                            <p class="text-white/80 text-sm mb-1">Total Points</p>
                            <p class="text-5xl font-bold text-white">100</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-300">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b-2 border-[#6F8E78]">Informasi Pribadi
                    </h2>
                    <div class="space-y-5">
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Nama Lengkap</p>
                            <h1 class="text-sm font-bold text-gray-800">Anak Agung Gede Angga Putra Wibawa</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Email</p>
                            <h1 class="text-sm font-bold text-gray-800">angga@gmail.com</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Nomor Telepon</p>
                            <h1 class="text-sm font-bold text-gray-800">08123456789</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Alamat</p>
                            <h1 class="text-sm font-bold text-gray-800">Jalan Hijau Utara</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Role</p>
                            <h1 class="text-sm font-bold text-[#6F8E78]">Warga</h1>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="#"
                            class=" w-full bg-[#6F8E78] text-white font-semibold py-2 px-4 rounded-lg flex items-center justify-center">Edit Profil</a>
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-300">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b-2 border-[#6F8E78]">Statistik Akun</h2>
                    <div class="space-y-5">
                        <div class="bg-linear-to-r from-[#6F8E78]/10 to-[#5A7863]/10 rounded-lg p-4">
                            <p class="text-sm text-gray-600 mb-1">Total Pengajuan Pickup</p>
                            <p class="text-3xl font-bold text-[#6F8E78]">12</p>
                        </div>
                        <div class="bg-linear-to-r from-blue-500/10 to-blue-600/10 rounded-lg p-4">
                            <p class="text-sm text-gray-600 mb-1">Total Transaksi</p>
                            <p class="text-3xl font-bold text-blue-600">8</p>
                        </div>
                        <div class="bg-linear-to-r from-orange-500/10 to-orange-600/10 rounded-lg p-4">
                            <p class="text-sm text-gray-600 mb-1">Sampah Terkumpul</p>
                            <p class="text-3xl font-bold text-orange-600">45 kg</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>
@endsection

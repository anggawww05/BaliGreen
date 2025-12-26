@extends('user.layout.main')

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

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-300">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b-2 border-[#6F8E78]">Informasi Pribadi
                    </h2>
                    <div class="space-y-5">
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Nama Lengkap</p>
                            <h1 class="text-sm font-bold text-gray-800">{{ $user->name }}</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Email</p>
                            <h1 class="text-sm font-bold text-gray-800">{{ $user->email }}</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Nomor Telepon</p>
                            <h1 class="text-sm font-bold text-gray-800">{{ $user->phone }}</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Alamat</p>
                            <h1 class="text-sm font-bold text-gray-800">{{ $user->address }}</h1>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-semibold text-gray-600">Role</p>
                            <h1 class="text-sm font-bold text-[#6F8E78]">{{ $user->role }}</h1>
                        </div>
                    </div>
                    <button type="button"
                        class="open-modal mt-4 w-full bg-[#6F8E78] text-white font-semibold py-2 px-4 rounded-lg flex items-center justify-center">Edit
                        Profil</button>
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
    <div id="editProfileModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">
        <div class="bg-white w-full max-w-md mx-4 rounded-xl shadow-lg overflow-hidden px-6 py-4">
            <div class=" border-b border-gray-300 mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Edit Profil</h3>
            </div>
            <form action="{{ route('edit.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-2">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>

                        <input type="text" id="name" name="name" required value="{{ old('name', $user->name) }}"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            value="{{ old('email', $user->email) }}"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">No Telp</label>
                        <input type="tel" id="phone" name="phone" required
                            value="{{ old('phone', $user->phone) }}"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                        {{-- <textarea id="address" name="address" rows="3" required value="{{ old('address', $user->address) }}"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]"></textarea> --}}
                        <textarea id="address" name="address" rows="3" required
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">{{ old('address', $user->address) }}</textarea>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password<span
                                class="text-xs text-gray-500 font-normal">(Kosongkan jika tidak ingin
                                mengganti)</span></label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600 hover:text-gray-800">
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="py-4 bg-gray-50 flex justify-end gap-3">
                    <button type="submit"
                        class="close-modal px-4 py-2 text-sm rounded-lg bg-blue-500 hover:bg-blue-600 text-white">Simpan</button>
                    <a href="#"
                        class="close-modal px-4 py-2 text-sm rounded-lg bg-blue-500 hover:bg-blue-600 text-white">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('editProfileModal');
            document.querySelectorAll('.open-modal').forEach(btn => {
                btn.addEventListener('click', e => {
                    e.preventDefault();
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            const closeModal = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            };
            modal.querySelectorAll('.close-modal').forEach(btn => btn.addEventListener('click', closeModal));
            modal.addEventListener('click', e => {
                if (e.target === modal) closeModal();
            });
        });
    </script>
@endsection

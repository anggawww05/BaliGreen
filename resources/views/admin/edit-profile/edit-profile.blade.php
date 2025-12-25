@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Data Profile</h1>
        <div>
            <a href="{{ route('admin.manage-user.index') }}" class="text-sm text-gray-600 hover:underline">/Edit Profile</a>
        </div>
        <form action="#" method="POST" class="mt-6 bg-white p-6 rounded-lg shadow">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                    {{-- <input type="text" id="name" name="name" required value="{{ old('name', $user->name) }}"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]"> --}}
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Telp</label>
                    <input type="tel" id="phone" name="phone" required
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="address" name="address" rows="3" required
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]"></textarea>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600 hover:text-gray-800">
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <script>
                    function togglePassword() {
                        const passwordInput = document.getElementById('password');
                        const eyeIcon = document.getElementById('eyeIcon');

                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                        } else {
                            passwordInput.type = 'password';
                        }
                    }
                </script>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <p class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">Admin</p>
                </div>
            </div>
            <div class="mt-6 flex gap-2 justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white rounded-xl hover:from-[#5A7863] hover:to-[#4A6853] transition">Simpan</button>
                <a href="{{ route('admin.manage-user.index') }}"
                    class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
@endsection

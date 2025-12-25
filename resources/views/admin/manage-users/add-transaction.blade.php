@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Tambah Data Pengguna</h1>
        <div>
        <a href="{{ route('admin.manage-user.index') }}" class="text-sm text-gray-600 hover:underline">/Kelola Pengguna</a><a href="{{ route('admin.transaction.index') }}" class="text-sm text-gray-600 hover:underline">/Pembayaran</a><span class="text-sm text-gray-800 font-semibold">/Formulir Tambah Data Pembayaran</span>
        </div>
        <form action="#" method="POST" class="mt-6 bg-white p-6 rounded-lg shadow">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Bulan</label>
                    <input type="text" id="name" name="name" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <input type="email" id="email" name="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nominal</label>
                    <input type="tel" id="phone" name="phone" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F8E78]">
                </div>
            </div>
            <div class="mt-6 flex gap-2 justify-end">
                <button type="submit" class="px-4 py-2 bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white rounded-xl hover:from-[#5A7863] hover:to-[#4A6853] transition">Simpan</button>
                <a href="{{ route('admin.transaction.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
@endsection

@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Informasi Penjemputan Sampah</h1>
        <div>
            <a href="{{ route('admin.request-pickup.index') }}" class="text-sm text-gray-600 hover:underline">/Kelola
                Penjemputan</a><span class="text-sm text-gray-800 font-semibold">/Detail Informasi Penjemputan</span>
        </div>
        <div class="mt-6 bg-white p-6 rounded-xl border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Status Penjemputan</h1>
            <label class="block text-sm font-medium text-gray-900 mb-2">
                Jenis Sampah <span class="text-red-600">*</span>
            </label>
            <select name="items[0][waste_category_id]" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Jenis Sampah --</option>
                <option value="1">Plastik</option>
                <option value="2">Kertas</option>
                <option value="3">Logam</option>
                <option value="4">Kaca</option>
                <option value="5">Organik</option>
            </select>
            <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Update Status
            </button>
        </div>
        <div class="mt-2 bg-white p-6 rounded-xl border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Informasi Pengguna</h1>
            <div class="space-y-4">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-semibold text-gray-600">Nama Lengkap:</p>
                    <h1 class="text-sm font-bold text-gray-800">{{ $pickupRequest->user->name ?? '-' }}</h1>
                </div>
                <div class="flex justify-between items-start">
                    <p class="text-sm font-semibold text-gray-600">Nomor Telepon:</p>
                    <h1 class="text-sm font-bold text-gray-800">08123456789</h1>
                </div>
                <div class="flex justify-between items-start">
                    <p class="text-sm font-semibold text-gray-600">Alamat:</p>
                    <h1 class="text-sm font-bold text-gray-800">Jalan Hijau Utara</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 bg-white p-6 rounded-xl border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Daftar Sampah</h1>
            <div class="p-4 border border-gray-300 rounded-xl">
                <h1 class="text-lg font-bold mb-4">Item Sampah 1:</h1>
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <p class="text-sm font-semibold text-gray-600">Jenis Sampah:</p>
                        <h1 class="text-sm font-bold text-gray-800">Plastik</h1>
                    </div>
                    <div class="flex justify-between items-start">
                        <p class="text-sm font-semibold text-gray-600">Ukuran Kantong:</p>
                        <h1 class="text-sm font-bold text-gray-800">L</h1>
                    </div>
                    <div class="flex justify-between items-start">
                        <p class="text-sm font-semibold text-gray-600">Sampah Berair:</p>
                        <h1 class="text-sm font-bold text-gray-800">Tidak</h1>
                    </div>
                    <div class="flex justify-between items-start">
                        <p class="text-sm font-semibold text-gray-600">Sampah Bau:</p>
                        <h1 class="text-sm font-bold text-gray-800">Iya</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 bg-white p-6 rounded-xl border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Foto Sampah</h1>
            <img src="" alt="">
            <div class="mt-4 flex flex-col items-center">
                <img src="{{ asset('assets/login-cover.png') }}" alt="Sorting Photo"
                    class="w-medium h-48 object-cover rounded-xl">
                <p class="text-sm font-semibold text-gray-600 mt-2">Status Sampah:</p>
                <h1 class="text-sm font-bold text-gray-800">Terpilah</h1>
            </div>
        </div>
        <div class="mt-2 bg-white p-6 rounded-xl border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Catatan</h1>
            <p class="mt-1 text-gray-800 flex text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus
                nemo dignissimos excepturi ab iste qui ut aliquam velit officia in molestias, quibusdam assumenda illum?
                Quidem rerum porro, doloribus dolorem quo provident nisi, rem temporibus cumque deleniti unde, ut voluptate
                perspiciatis quaerat repellat! Ipsum veniam doloribus sequi voluptate adipisci eius perferendis, totam
                dignissimos ullam odio placeat aliquid repellat aperiam officiis. Ex quidem sapiente nisi voluptatem nostrum
                molestias amet a ea ipsum ipsam tempora accusantium tenetur voluptatum, non nesciunt? Eveniet eius voluptas
                officiis quod architecto dolores tempora animi provident ipsa, et expedita quae veritatis est accusantium
                odio sequi laboriosam similique aspernatur temporibus.</p>
        </div>
    </div>
@endsection

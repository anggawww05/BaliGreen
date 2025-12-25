@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Informasi Penjemputan Sampah</h1>
        <div>
            <a href="{{ route('admin.request-pickup.index') }}" class="text-sm text-gray-600 hover:underline">/Kelola
                Penjemputan</a><span class="text-sm text-gray-800 font-semibold">/Detail Informasi Penjemputan</span>
        </div>
        <div class="mt-6 bg-white p-6 rounded-lg border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Informasi Pengguna</h1>
            <div class="space-y-4">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-semibold text-gray-600">Nama Lengkap:</p>
                    <h1 class="text-sm font-bold text-gray-800">Anak Agung Gede Angga Putra Wibawa</h1>
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
        <div class="mt-2 bg-white p-6 rounded-lg border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Item Sampah 1</h1>
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
        <div class="mt-2 bg-white p-6 rounded-lg border-gray-300 border">
            <h1 class="text-lg font-bold mb-4">Catatan</h1>
            <p class="mt-1 text-gray-800 flex text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus nemo dignissimos excepturi ab iste qui ut aliquam velit officia in molestias, quibusdam assumenda illum? Quidem rerum porro, doloribus dolorem quo provident nisi, rem temporibus cumque deleniti unde, ut voluptate perspiciatis quaerat repellat! Ipsum veniam doloribus sequi voluptate adipisci eius perferendis, totam dignissimos ullam odio placeat aliquid repellat aperiam officiis. Ex quidem sapiente nisi voluptatem nostrum molestias amet a ea ipsum ipsam tempora accusantium tenetur voluptatum, non nesciunt? Eveniet eius voluptas officiis quod architecto dolores tempora animi provident ipsa, et expedita quae veritatis est accusantium odio sequi laboriosam similique aspernatur temporibus.</p>
    </div>
@endsection

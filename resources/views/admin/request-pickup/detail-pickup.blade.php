@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Informasi Penjemputan Sampah</h1>
        <div>
            <a href="{{ route('admin.request-pickup.index') }}" class="text-sm text-gray-600 hover:underline">/Kelola
                Penjemputan</a><span class="text-sm text-gray-800 font-semibold">/Detail Informasi Penjemputan</span>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2 bg-white rounded-xl border border-gray-300 p-6 space-y-4">
                <div class="flex gap-6">
                    <div class="flex flex-col gap-4 w-1/2">
                        <div>
                            <p class="text-sm text-gray-500">Nama</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $pickupRequest->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nomor Telepon</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $pickupRequest->user->phone }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Alamat</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $pickupRequest->user->address }}</p>
                        </div>
                    </div>
                    <div class="p-4 w-1/2">
                        <p class="text-sm text-gray-500">Catatan</p>
                        <p
                            class="w-full h-32 text-lg font-semibold text-gray-800 border border-gray-300 rounded-lg p-3 overflow-y-auto">
                            {{ $pickupRequest->notes }}</p>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-xs text-gray-500">Berat Sampah Total</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $pickupRequest->total_weight_kg }} kg</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-xs text-gray-500">Skor Urgensi</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $pickupRequest->current_priority_score }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-xs text-gray-500">Tanggal Pengajuan</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $pickupRequest->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Detail Item Sampah</h2>
                    <div class="overflow-x-auto border border-gray-200 rounded-xl">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Kategori</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Ukuran</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Estimasi Berat</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Basah</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Berbau</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($pickupRequest->items as $item)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->wasteCategory->name ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->size }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->estimated_weight }} kg</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->is_wet ? 'Ya' : 'Tidak' }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->has_smell ? 'Ya' : 'Tidak' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">Tidak ada
                                            data
                                            item.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-300 p-6 space-y-4">
                <h2 class="text-lg font-semibold text-gray-800">Foto Pemilahan</h2>
                @php
                    $photo = $pickupRequest->sorting_photo_path
                        ? asset('storage/' . $pickupRequest->sorting_photo_path)
                        : null;
                @endphp
                @if ($photo)
                    <img src="{{ $photo }}" alt="Foto Sampah"
                        class="w-64 h-64 rounded-lg object-cover border border-gray-200">
                @else
                    <div
                        class="w-64 h-64 rounded-lg border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                        Tidak ada foto.
                    </div>
                @endif
                <div class="pt-2">
                    <p class="text-sm text-gray-600">Status Sampah:</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $pickupRequest->is_sorted_confirmed ? 'Terpilah' : 'Tercampur' }}</p>
                </div>
            </div>

        </div>
        <div class="bg-white rounded-xl border border-gray-300 p-6 mt-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Pilih Role</option>
                @foreach ($statuses as $status => $label)
                    <option value="{{ $status }}">{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Update Status
        </div>
    </div>
@endsection

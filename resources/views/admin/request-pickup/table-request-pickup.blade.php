@extends('admin.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-50 p-6 border border-gray-200 rounded-xl flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Kelola Data Penjemputan Sampah</h1>
        <div>
            <a href="{{ route('admin.request-pickup.index') }}" class="text-sm text-gray-600 hover:underline">/Kelola
                Penjemputan</a>
        </div>
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-4">
            <div class="relative w-full sm:w-1/2">
                <input type="text" placeholder="Cari penjemputan..."
                    class="w-1/2 pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 text-sm">
                <svg class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-300 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">#</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Berat Sampah</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Skor Urgensi</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    @php
                        $dummySchedules = [
                            (object) [
                                'name' => 'John Doe',
                                'weight' => '10 kg',
                                'urgency_score' => '5',
                                'status' => 'Pending',
                            ],
                        ];
                    @endphp

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($dummySchedules as $schedule)
                            <tr class="hover:bg-[#52a08a]/5 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">
                                    {{ $schedule->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-md">
                                    {{ Str::limit($schedule->weight, 80) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $schedule->urgency_score }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-3 py-1 bg-[#52a08a]/10 text-[#52a08a] rounded-full text-xs font-semibold">{{ $schedule->status }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" data-modal-target="verifyModal"
                                            class="open-modal inline-flex items-center px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors">
                                            Verifikasi Pemilahan
                                        </button>
                                        <a href="{{ route('admin.detail-pickup.index') }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors">Detail
                                            Penjemputan</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-lg font-medium mb-2">Belum ada penjadwalan</p>
                                        <p class="text-sm">Mulai buat penjadwalan pertama Anda</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ $dummySchedules->links('components.pagination') }} --}}
            </div>
        </div>
    </div>
    <div id="verifyModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">
        <div class="bg-white w-full max-w-md mx-4 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-300">
                <h3 class="text-lg font-semibold text-gray-800">Verifikasi Pemilahan</h3>
            </div>
            <div class="px-6 py-4 space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Foto Sampah</label>
                <div class="w-full h-48 bg-gray-400 rounded-lg"></div>
                <label for="verification" class="block text-sm font-medium text-gray-700 mt-4">Status Verifikasi</label>
                <select id="verification" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <option value="">Pilih Status</option>
                    <option value="approved">Terpilah</option>
                    <option value="rejected">Tercampur</option>
                </select>
            </div>

            <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3">
                <button type="button"
                    class="close-modal px-4 py-2 text-sm rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">Batal</button>
                <a href="{{ route('admin.edit-user.index') }}"
                    class="px-4 py-2 text-sm rounded-lg bg-blue-500 hover:bg-blue-600 text-white">Ya, Verifikasi</a>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('verifyModal');
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

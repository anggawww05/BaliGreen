@extends('user.layout.main')

@section('container')
    <div class="w-full min-h-screen bg-white border border-gray-300 rounded-xl p-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-4">
            <div class="relative w-full sm:w-1/2">
                <input type="text" placeholder="Cari pengguna..."
                    class="w-1/2 pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 text-sm">
                <svg class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <a href="{{ route('schedule.form') }}" class="w-full sm:w-auto px-6 py-2  bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white font-medium rounded-lg hover:from-[#5A7863] hover:to-[#4A6853] transition">Buat Penjadwalan</a>
        </div>
        <div class="bg-white rounded-xl shadow-lg border border-gray-300 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Berat Sampah</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Note</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Tanggal Pengajuan</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    @php
                        $dummySchedules = [
                            (object) [
                                'weight' => '10kg',
                                'note' => 'Discuss project updates',
                                'date' => '2023-10-01',
                                'status' => 'Scheduled',
                            ],
                            (object) [
                                'weight' => '10kg',
                                'note' => 'Present the new features',
                                'date' => '2023-10-05',
                                'status' => 'Scheduled',
                            ],
                            (object) [
                                'weight' => '10kg',
                                'note' => 'Review the latest pull requests',
                                'date' => '2023-10-10',
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
                                    {{ $schedule->weight }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-md">
                                    {{ Str::limit($schedule->note, 80) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $schedule->date }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-3 py-1 bg-[#52a08a]/10 text-[#52a08a] rounded-full text-xs font-semibold">{{ $schedule->status }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="#"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors">Edit</a>
                                        <form method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors">Hapus</button>
                                        </form>
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
@endsection

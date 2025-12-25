@extends('user.layout.main')

@section('container')
    <div class="w-full min-h-screen bg-white border border-gray-300 rounded-xl p-6">
        <div class="flex justify-between items-center gap-4 mb-6">
            <a href="{{ route('schedule.index') }}"
                class="px-4 py-1 bg-black text-white font-medium rounded-lg hover:bg-gray-800 transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>
            <h1 class="text-xl font-bold">Formulir Pembayaran</h1>
        </div>
        <div class="flex justify-between items-center mb-6 p-4 bg-yellow-50 border border-yellow-300 text-yellow-800 rounded-lg">
            <div class="space-y-2">
                <h1 class="font-semibold text-xl">Pembayaran dengan poin</h1>
                <p class="text-sm">Anda dapat melakukan pembayaran dengan poin apabila memiliki 10 poin atau lebih.</p>
            </div>
            <div class="flex items-center gap-3 bg-linear-to-r from-yellow-400 to-yellow-600 rounded-lg px-4 py-3">
                <div class="text-white">
                    <p class="text-sm font-medium">Poin Saat Ini</p>
                    <p class="text-lg font-bold ">19 Poin</p>
                </div>
            </div>
        </div>
        <div>
            <div class="grid grid-cols-3 gap-6">
                <!-- Left Section -->
                <div class="bg-gray-50 border border-gray-300 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4">Informasi Bank</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Bank</label>
                            <p class="text-base text-gray-900">Bank Mandiri</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Rekening</label>
                            <p class="text-base text-gray-900">1234567890</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="col-span-2">
                    <form action="{{ route('transaction.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="bill" class="block text-sm font-medium text-gray-700 mb-1">Tagihan</label>
                            <input type="text" id="bill" name="bill" value="Januari" readonly
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                            <input type="text" id="amount" name="amount" value="Rp. 25.000,00" readonly
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100">
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="pay_with_points" name="pay_with_points"
                                class="w-4 h-4 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 cursor-pointer">
                            <label for="pay_with_points" class="text-sm font-medium text-gray-700 cursor-pointer">
                                Bayar dengan poin
                            </label>
                        </div>
                        <div id="payment_proof_section">
                            <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-1">Bukti
                                Pembayaran</label>
                            <input type="file" id="payment_proof" name="payment_proof"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full bg-linear-to-r from-[#6F8E78] to-[#5A7863] text-white font-medium py-2 px-4 rounded-lg hover:from-[#5A7863] hover:to-[#4A6853] transition">Submit
                                Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                const payWithPointsCheckbox = document.getElementById('pay_with_points');
                const paymentProofSection = document.getElementById('payment_proof_section');
                const paymentProofInput = document.getElementById('payment_proof');

                payWithPointsCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        paymentProofSection.style.display = 'none';
                        paymentProofInput.removeAttribute('required');
                    } else {
                        paymentProofSection.style.display = 'block';
                        paymentProofInput.setAttribute('required', 'required');
                    }
                });
            </script>
            </div>
        </div>
    </div>
@endsection

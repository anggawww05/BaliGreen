@extends('user.layout.main')

@section('container')
    <div class="w-full min-h-screen bg-white border border-gray-300 rounded-xl p-6">
        <div class="flex justify-between items-center gap-4 mb-6">
            <a href="{{ route('schedule.index') }}" class="px-4 py-1 bg-black text-white font-medium rounded-lg hover:bg-gray-800 transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>
            <h1 class="text-xl font-bold">Edit Formulir Penjadwalan Sampah</h1>
        </div>

        <form method="POST" action="{{ route('schedule.update', $pickupRequest->id) }}" enctype="multipart/form-data" class="w-full">
            @csrf
            @method('PUT')

            <!-- Section: Daftar Sampah -->
            <div class="bg-gray-50 border border-gray-300 rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Sampah yang Akan Dijemput</h2>
                    <button type="button" onclick="addWasteItem()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Kantong Sampah
                    </button>
                </div>

                <!-- Waste Items Container -->
                <div id="waste-items-container" class="space-y-4">
                    <!-- Items will be loaded here -->
                </div>

                @if ($errors->has('items'))
                    <p class="text-red-600 text-sm mt-2">{{ $errors->first('items') }}</p>
                @endif
            </div>

            <!-- Section: Foto & Catatan -->
            <div class="bg-gray-50 border border-gray-300 rounded-lg p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Bukti dan Catatan</h2>

                <!-- Sorting Photo -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Foto Bukti Pemilahan
                        <span class="text-red-600">*</span>
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 10MB</p>
                            </div>
                            <input type="file" id="sorting_photo_path" name="sorting_photo_path" class="hidden" accept="image/*">
                        </label>
                    </div>
                    <div id="photo-preview" class="mt-2">
                        @if ($pickupRequest->sorting_photo_path)
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $pickupRequest->sorting_photo_path) }}" alt="Preview" class="h-32 rounded-lg border border-gray-300">
                                <button type="button" onclick="document.getElementById('sorting_photo_path').value = ''; document.getElementById('photo-preview').innerHTML = ''" class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 hover:bg-red-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                    @if ($errors->has('sorting_photo_path'))
                        <p class="text-red-600 text-sm mt-2">{{ $errors->first('sorting_photo_path') }}</p>
                    @endif
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-900 mb-2">
                        Catatan untuk Petugas (Opsional)
                    </label>
                    <textarea id="notes" name="notes" rows="4" placeholder="Misal: Pagar digembok, ada anjing, dll..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $pickupRequest->notes }}</textarea>
                    @if ($errors->has('notes'))
                        <p class="text-red-600 text-sm mt-2">{{ $errors->first('notes') }}</p>
                    @endif
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('schedule.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium">
                    Perbarui Penjadwalan
                </button>
            </div>
        </form>
    </div>

    <!-- Template for waste item (hidden) -->
    <template id="waste-item-template">
        <div class="waste-item-card bg-white border border-gray-300 rounded-lg p-5">
            <div class="flex justify-between items-start mb-4">
                <h3 class="font-medium text-gray-900">Item <span class="item-number">1</span></h3>
                <button type="button" onclick="removeWasteItem(this)" class="text-red-600 hover:text-red-700 p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Jenis Sampah -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Jenis Sampah <span class="text-red-600">*</span>
                </label>
                <select name="items[0][waste_category_id]" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Jenis Sampah --</option>
                    @foreach ($wasteCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} (Risk Level: {{ $category->risk_level }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Ukuran Kantong -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-900 mb-3">
                    Ukuran Kantong <span class="text-red-600">*</span>
                </label>
                <div class="grid grid-cols-4 gap-3">
                    <label class="relative flex items-center cursor-pointer">
                        <input type="radio" name="items[0][size]" value="S" required class="sr-only peer">
                        <div class="w-full py-2 px-3 text-center border border-gray-300 rounded-lg peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 hover:border-blue-400 transition">
                            <span class="text-sm font-medium">S<br><small class="text-xs">(Kecil)</small></span>
                        </div>
                    </label>
                    <label class="relative flex items-center cursor-pointer">
                        <input type="radio" name="items[0][size]" value="M" required class="sr-only peer">
                        <div class="w-full py-2 px-3 text-center border border-gray-300 rounded-lg peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 hover:border-blue-400 transition">
                            <span class="text-sm font-medium">M<br><small class="text-xs">(Sedang)</small></span>
                        </div>
                    </label>
                    <label class="relative flex items-center cursor-pointer">
                        <input type="radio" name="items[0][size]" value="L" required class="sr-only peer">
                        <div class="w-full py-2 px-3 text-center border border-gray-300 rounded-lg peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 hover:border-blue-400 transition">
                            <span class="text-sm font-medium">L<br><small class="text-xs">(Besar)</small></span>
                        </div>
                    </label>
                    <label class="relative flex items-center cursor-pointer">
                        <input type="radio" name="items[0][size]" value="XL" required class="sr-only peer">
                        <div class="w-full py-2 px-3 text-center border border-gray-300 rounded-lg peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 hover:border-blue-400 transition">
                            <span class="text-sm font-medium">XL<br><small class="text-xs">(Jumbo)</small></span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Apakah Basah & Bau -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="items[0][is_wet]" value="1" class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Sampah Basah/Berair?</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="items[0][has_smell]" value="1" class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Sudah Tercium Bau?</span>
                </label>
            </div>
        </div>
    </template>

    <script>
        let itemCount = 0;

        // Initialize with existing items
        document.addEventListener('DOMContentLoaded', function() {
            const items = @json($pickupRequest->items ?? []);
            console.log('Loaded items:', items);

            if (items.length > 0) {
                items.forEach(item => {
                    console.log('Adding item:', item);
                    addWasteItem(item);
                });
            } else {
                addWasteItem();
            }

            // Photo preview handler
            document.getElementById('sorting_photo_path').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const preview = document.getElementById('photo-preview');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        preview.innerHTML = `
                            <div class="relative inline-block">
                                <img src="${event.target.result}" alt="Preview" class="h-32 rounded-lg border border-gray-300">
                                <button type="button" onclick="document.getElementById('sorting_photo_path').value = ''; document.getElementById('photo-preview').innerHTML = ''" class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 hover:bg-red-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        `;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        function addWasteItem(item = null) {
            const container = document.getElementById('waste-items-container');
            const template = document.getElementById('waste-item-template');
            const clone = template.content.cloneNode(true);

            // Update indices
            const itemCard = clone.querySelector('.waste-item-card');
            clone.querySelector('.item-number').textContent = itemCount + 1;

            // Update all input names to reflect new index
            const inputs = clone.querySelectorAll('input, select');
            inputs.forEach(input => {
                if (input.name) {
                    input.name = input.name.replace(/items\[0\]/g, `items[${itemCount}]`);

                    // Set values if editing
                    if (item) {
                        if (input.type === 'radio' && input.value === item.size) {
                            input.checked = true;
                        } else if (input.type === 'checkbox') {
                            if ((input.name.includes('is_wet') && (item.is_wet === 1 || item.is_wet === true)) ||
                                (input.name.includes('has_smell') && (item.has_smell === 1 || item.has_smell === true))) {
                                input.checked = true;
                            }
                        }
                    }
                }
            });

            // Set select value if editing
            if (item) {
                const select = clone.querySelector('select');
                if (select) {
                    select.value = item.waste_category_id;
                }
            }

            container.appendChild(clone);
            itemCount++;
            updateItemNumbers();
        }

        function removeWasteItem(button) {
            button.closest('.waste-item-card').remove();
            updateItemNumbers();
        }

        function updateItemNumbers() {
            const items = document.querySelectorAll('.waste-item-card');
            items.forEach((item, index) => {
                item.querySelector('.item-number').textContent = index + 1;

                // Update input names
                const inputs = item.querySelectorAll('input, select');
                inputs.forEach(input => {
                    if (input.name) {
                        input.name = input.name.replace(/items\[\d+\]/g, `items[${index}]`);
                    }
                });
            });
        }
    </script>
@endsection

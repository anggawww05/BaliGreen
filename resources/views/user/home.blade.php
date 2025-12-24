@extends('user.main')

@section('container')
    <section id="home"
        class="relative flex items-center justify-center min-h-screen bg-linear-to-br from-[#5A7863] via-[#3d4f47] to-[#23272F] overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('assets/home-cover.png') }}" alt="Digital Marketing Asset"
            class="w-full h-screen object-cover absolute inset-0 opacity-40">

        <!-- Overlay dengan linear -->
        <div class="absolute inset-0 bg-linear-to-b from-black/60 via-black/70 to-black/80"></div>

        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#5A7863]/20 rounded-full blur-3xl -z-5"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#5A7863]/10 rounded-full blur-3xl -z-5"></div>

        <!-- Content -->
        <div class="relative z-10 text-center text-white max-w-3xl px-6 md:px-12">
            <div class="mb-6 inline-block">
                <span class="text-[#5A7863] font-semibold text-lg tracking-widest uppercase">Welcome to</span>
            </div>
            <h1 class="text-6xl md:text-7xl font-bold mb-6 leading-tight">
                <span class="bg-linear-to-r from-[#5A7863] to-white bg-clip-text text-transparent">SAMDES</span>
            </h1>
            <div class="w-20 h-1 bg-linear-to-r from-[#5A7863] to-white rounded-full mx-auto mb-8"></div>
            <p class="text-lg md:text-xl mb-10 leading-relaxed text-gray-200 max-w-2xl mx-auto">
                Platform pengelolaan sampah desa digital yang dirancang untuk membantu desa mengelola limbah secara efisien
                dan berkelanjutan.
            </p>
            <a href="{{ route('login.index') }}"
                class="inline-block bg-[#5A7863] hover:bg-[#466e62] text-white font-semibold py-4 px-10 rounded-full shadow-2xl transition text-lg">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <section id="about" class="py-20 bg-white relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
            <div class="flex gap-16 items-center">
                <!-- Left Content -->
                <div class="flex flex-col gap-8">
                    <div>
                        <span class="text-[#5A7863] font-semibold text-sm tracking-widest uppercase">Tentang Kami</span>
                        <h2 class="text-4xl md:text-5xl font-bold text-[#23272F] mt-2 mb-4">
                            Solusi Pengelolaan Sampah Desa Digital
                        </h2>
                        <div class="w-20 h-1 bg-[#5A7863] rounded"></div>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed text-justify">
                        <span class="font-semibold text-[#5A7863] ">SAMDES</span> adalah platform inovatif yang dirancang
                        khusus untuk membantu desa-desa mengelola limbah secara efisien, terukur, dan berkelanjutan. Kami
                        memahami tantangan yang dihadapi masyarakat desa dalam mengelola sampah, oleh karena itu kami
                        menghadirkan solusi digital yang mudah digunakan.
                    </p>



                    <!-- Right Stats -->
                    <div class="grid grid-cols-2 gap-6">
                        <div
                            class="bg-linear-to-br from-[#5A7863]/10 to-[#5A7863]/5 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-[#5A7863] mb-2">50+</div>
                            <p class="text-gray-700 font-medium">Pengguna Aktif</p>
                        </div>
                        <div
                            class="bg-linear-to-br from-[#5A7863]/10 to-[#5A7863]/5 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-[#5A7863] mb-2">Digital</div>
                            <p class="text-gray-700 font-medium">Pembayaran Bulanan</p>
                        </div>
                        <div
                            class="bg-linear-to-br from-[#5A7863]/10 to-[#5A7863]/5 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-[#5A7863] mb-2">Transparan</div>
                            <p class="text-gray-700 font-medium">Pantau Sampah Real-Time</p>
                        </div>
                        <div
                            class="bg-linear-to-br from-[#5A7863]/10 to-[#5A7863]/5 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl font-bold text-[#5A7863] mb-2">24/7</div>
                            <p class="text-gray-700 font-medium">Pelayanan Penuh</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 w-48 h-48 bg-[#5A7863]/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#5A7863]/10 rounded-full blur-2xl -z-10"></div>
    </section>

    {{-- Layanan Kami --}}
    <section id="tips" class="py-20 bg-[#5A7863] relative">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12 text-white">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Tips & Trik</h2>
                <div class="w-20 h-1 bg-[#5A7863] rounded mx-auto mb-4"></div>
                <p class="text-lg max-w-2xl mx-auto">
                    Berikut adalah beberapa tips dan trik yang dapat membantu desa Anda dalam pengelolaan sampah secara
                    efektif.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Tip 1 -->
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center hover:-translate-y-2 transition-all duration-300 group">
                    <div class="bg-[#5A7863]/10 rounded-full p-5 mb-6">
                        <svg class="w-12 h-12 text-[#5A7863]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 16h14M5 8h14" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-[#23272F]">Pilah Sampah</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Pastikan untuk memisahkan sampah organik dan non-organik untuk memudahkan proses daur ulang.
                    </p>
                </div>
                <!-- Tip 2 -->
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center hover:-translate-y-2 transition-all duration-300 group">
                    <div class="bg-[#5A7863]/10 rounded-full p-5 mb-6">
                        <svg class="w-12 h-12 text-[#5A7863]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm-1 15h2v-2h-2v2zm0-4h2V7h-2v6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-[#23272F]">Edukasi Masyarakat</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Ajak masyarakat untuk memahami pentingnya pengelolaan sampah yang baik melalui seminar atau
                        workshop.
                    </p>
                </div>
                <!-- Tip 3 -->
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center hover:-translate-y-2 transition-all duration-300 group">
                    <div class="bg-[#5A7863]/10 rounded-full p-5 mb-6">
                        <svg class="w-12 h-12 text-[#5A7863]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12h18M3 16h18M3 8h18" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-[#23272F]">Gunakan Aplikasi</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Manfaatkan aplikasi pengelolaan sampah untuk memantau dan mengatur jadwal pengambilan sampah.
                    </p>
                </div>
            </div>
        </div>
        <div class="absolute top-0 left-0 w-32 h-32 bg-[#5A7863]/10 rounded-full blur-2xl -z-10"></div>
        <div class="absolute bottom-0 right-0 w-48 h-48 bg-[#5A7863]/10 rounded-full blur-3xl -z-10"></div>
    </section>
@endsection

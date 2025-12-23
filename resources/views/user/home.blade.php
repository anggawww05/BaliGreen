@extends('user.main')

@section('container')
    {{-- Cover depan --}}
    <section id="cover"
        class="relative flex items-center justify-center min-h-screen bg-linear-to-br from-[#578E7E] to-[#23272F] overflow-hidden">
        <img src="{{ asset('assets/dev-asset.png') }}" alt="Digital Marketing Asset"
            class="rounded-full shadow-2xl max-w-xs md:max-w-md h-auto border-8 border-white/10 transition-transform duration-300 group-hover:scale-105">
    </section>

    {{-- Tentang Kami --}}
    <section id="about" class="py-20 bg-white relative">
        <div class="max-w-6xl mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <img src="{{ asset('assets/dev-asset.png') }}" alt="About Djingga Company"
                    class="w-full max-w-md mx-auto rounded-3xl shadow-2xl border-4 border-[#52a08a]/10">
            </div>
            <div class="flex-1 flex flex-col gap-6">
                <h2 class="text-4xl md:text-5xl font-bold text-[#23272F] mb-4">
                    Tentang Kami
                </h2>
                <div class="w-20 h-1 bg-[#52a08a] rounded mb-4"></div>
                <p class="text-lg text-gray-700 leading-relaxed">
                    <span class="font-semibold text-[#52a08a]">Djingga Company</span> adalah perusahaan IT yang beroperasi
                    di Indonesia, tepatnya di Bali. Kami merupakan spesialis dalam menyediakan solusi teknologi yang
                    disesuaikan untuk berbagai sektor di Indonesia.
                </p>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Dengan tim profesional berpengalaman, kami berkomitmen memberikan solusi berkualitas, inovatif, dan
                    sesuai
                    kebutuhan bisnis anda. Kepuasan klien adalah prioritas utama kami.
                </p>
                <a href="#services"
                    class="inline-block mt-4 bg-[#52a08a] hover:bg-[#466e62] text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-200 text-lg">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        <div class="absolute top-0 right-0 w-48 h-48 bg-[#52a08a]/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#578E7E]/10 rounded-full blur-2xl -z-10"></div>
    </section>

    {{-- Layanan Kami --}}
    <section id="services" class="py-20 bg-linear-to-br from-[#f8fafc] to-[#e6f4f1] relative">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-[#23272F] mb-4">Layanan Kami</h2>
                <div class="w-20 h-1 bg-[#52a08a] rounded mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami menawarkan berbagai layanan teknologi untuk mendukung pertumbuhan bisnis Anda di era digital.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Service 1 -->
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center hover:-translate-y-2 transition-all duration-300 group">
                    <div class="bg-[#52a08a]/10 rounded-full p-5 mb-6">
                        <svg class="w-12 h-12 text-[#52a08a]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.35709 16V5.78571c0-.43393.34822-.78571.77777-.78571H18.5793c.4296 0 .7778.35178.7778.78571V16M5.35709 16h-1c-.55229 0-1 .4477-1 1v1c0 .5523.44771 1 1 1H20.3571c.5523 0 1-.4477 1-1v-1c0-.5523-.4477-1-1-1h-1M5.35709 16H19.3571M9.35709 8l2.62501 2.5L9.35709 13m4.00001 0h2" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-[#23272F]">Web Development</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Perancangan website profesional, responsif, dan sesuai kebutuhan bisnis Anda.
                    </p>
                    {{-- <a href="#" class="text-[#52a08a] font-semibold hover:underline">Selengkapnya</a> --}}
                </div>
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center hover:-translate-y-2 transition-all duration-300 group">
                    <div class="bg-[#52a08a]/10 rounded-full p-5 mb-6">
                        <svg class="w-12 h-12 text-[#52a08a]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4Zm12 12V5H7v11h10Zm-5 1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-[#23272F]">Mobile Development</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Perancangan aplikasi mobile yang user-friendly untuk platform iOS dan Android.
                    </p>
                    {{-- <a href="#" class="text-[#52a08a] font-semibold hover:underline">Selengkapnya</a> --}}
                </div>
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center hover:-translate-y-2 transition-all duration-300 group">
                    <div class="bg-[#52a08a]/10 rounded-full p-5 mb-6">
                        <svg class="w-12 h-12 text-[#52a08a]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-[#23272F]">Network</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Perancangan jaringan komputer yang optimal dan aman untuk mendukung bisnis Anda.
                    </p>
                    {{-- <a href="#" class="text-[#52a08a] font-semibold hover:underline">Selengkapnya</a> --}}
                </div>
                <!-- Service 2 -->

            </div>
        </div>
        <div class="absolute top-0 left-0 w-32 h-32 bg-[#52a08a]/10 rounded-full blur-2xl -z-10"></div>
        <div class="absolute bottom-0 right-0 w-48 h-48 bg-[#578E7E]/10 rounded-full blur-3xl -z-10"></div>
    </section>

    {{-- Our Team --}}
    <section>

    </section>
@endsection

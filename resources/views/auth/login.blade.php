<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
    </head>
    <body class="min-h-screen bg-[#f6f7f5]">
        <div
            class="grid min-h-screen grid-cols-1 lg:grid-cols-5"
        >
            <div class="col-span-1 lg:col-span-3 relative overflow-hidden">
                <div class="absolute inset-0">
                    <img src="{{ asset('assets/login-cover.png') }}" alt="Login cover" class="h-full w-full object-cover" />
                </div>
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="relative z-10 px-10 py-12 text-white lg:px-16 flex h-full flex-col justify-center space-y-6">
                    <div class="space-y-4">
                        <p class="uppercase tracking-[0.35em] text-white/70 text-sm">Halo</p>
                        <h1 class="text-4xl font-semibold leading-tight md:text-5xl">Bergabung bersama kami</h1>
                        <p class="max-w-2xl text-base text-white/90 md:text-lg">
                            Demi menciptakan lingkungan yang bebas sampah, mari bersama-sama kita wujudkan perubahan positif.
                        </p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <p class="text-sm text-white/80">Penjadwalan penjemput sampah</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <p class="text-sm text-white/80">Pantau status penjemputan</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <p class="text-sm text-white/80">Poin loyalitas untuk setiap aksi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1 lg:col-span-2 flex items-center justify-center bg-white px-6 py-12 shadow-2xl lg:px-10">
                <div class="w-full max-w-sm space-y-8">
                    <div class="space-y-2 text-center">
                        <h2 class="text-2xl font-semibold text-gray-900">Buat Akun</h2>
                        <p class="text-sm text-gray-500">Isi data di bawah untuk mulai menggunakan layanan.</p>
                    </div>

                    <form class="space-y-6" action="{{ route('validate.login') }}" method="POST" id="dummy-register-form">
                        @csrf
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                required
                                class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition hover:border-gray-300 focus:border-[#5A7863] focus:bg-white focus:ring-2 focus:ring-[#5A7863]/50"
                                placeholder="nama@email.com"
                            />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700" for="password">Kata Sandi</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition hover:border-gray-300 focus:border-[#5A7863] focus:bg-white focus:ring-2 focus:ring-[#5A7863]/50"
                                placeholder="Minimal 8 karakter"
                            />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button
                            type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-full bg-[#5A7863] px-4 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-[#4a6553] focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-[#5A7863]"
                        >
                            Masuk Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

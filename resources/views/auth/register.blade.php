<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="preconnect"
			href="https://fonts.googleapis.com"
		/>
		<link
			rel="preconnect"
			href="https://fonts.gstatic.com"
			crossorigin
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap"
			rel="stylesheet"
		/>
		@vite('resources/css/app.css')
	</head>
	<body class="min-h-screen bg-[#f6f7f5]">
		<div
			class="grid min-h-screen grid-cols-1 lg:grid-cols-5"
			style="font-family: 'Space Grotesk', 'Segoe UI', system-ui, sans-serif;"
		>
			<div class="col-span-1 lg:col-span-3 relative overflow-hidden">
				<!-- Cover image -->
				<div class="absolute inset-0">
					<img src="{{ asset('assets/login-cover.png') }}" alt="Login cover" class="h-full w-full object-cover" />
				</div>
				<!-- Tint overlay for readability -->
				<div class="absolute inset-0 bg-black/60"></div>

				<div class="relative z-10 px-10 py-12 text-white lg:px-16 flex h-full flex-col justify-center space-y-6">
					<div class="space-y-4">
						<p class="uppercase tracking-[0.35em] text-white/70 text-sm">Welcome</p>
						<h1 class="text-4xl font-semibold leading-tight md:text-5xl">Bergabung bersama kami hari ini</h1>
						<p class="max-w-2xl text-base text-white/90 md:text-lg">
							Buat akun untuk mengakses dashboard, memantau progres, dan menemukan insight terbaru.
						</p>
					</div>
					<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
						<div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
							<p class="text-sm text-white/80">Akses cepat ke fitur utama tanpa antre.</p>
						</div>
						<div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
							<p class="text-sm text-white/80">Data aman dengan enkripsi berlapis.</p>
						</div>
						<div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
							<p class="text-sm text-white/80">Kolaborasi tim yang lebih efektif.</p>
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

					<form class="space-y-6" action="#" method="POST" id="dummy-register-form">
						@csrf

						<div class="space-y-2">
							<label class="block text-sm font-medium text-gray-700" for="name">Nama Lengkap</label>
							<input
								id="name"
								name="name"
								type="text"
								value="{{ old('name', 'Dinda Saputra') }}"
								required
								class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition hover:border-gray-300 focus:border-[#59724f] focus:bg-white focus:ring-2 focus:ring-[#9caf88]/50"
								placeholder="Nama lengkap"
							/>
							@error('name')
								<p class="text-sm text-red-600">{{ $message }}</p>
							@enderror
						</div>

						<div class="space-y-2">
							<label class="block text-sm font-medium text-gray-700" for="email">Email</label>
							<input
								id="email"
								name="email"
								type="email"
								value="{{ old('email', 'dinda@mail.com') }}"
								required
								class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition hover:border-gray-300 focus:border-[#59724f] focus:bg-white focus:ring-2 focus:ring-[#9caf88]/50"
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
								value="password123"
								required
								class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition hover:border-gray-300 focus:border-[#59724f] focus:bg-white focus:ring-2 focus:ring-[#9caf88]/50"
								placeholder="Minimal 8 karakter"
							/>
							@error('password')
								<p class="text-sm text-red-600">{{ $message }}</p>
							@enderror
						</div>

						<div class="space-y-2">
							<label class="block text-sm font-medium text-gray-700" for="password_confirmation">Konfirmasi Kata Sandi</label>
							<input
								id="password_confirmation"
								name="password_confirmation"
								type="password"
								value="password123"
								required
								class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition hover:border-gray-300 focus:border-[#59724f] focus:bg-white focus:ring-2 focus:ring-[#9caf88]/50"
								placeholder="Ulangi kata sandi"
							/>
						</div>

						<button
							type="button"
							class="flex w-full items-center justify-center gap-2 rounded-full bg-[#6f8b5f] px-4 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-[#627a54] focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-[#9caf88]"
						>
							Daftar Sekarang
						</button>
					</form>

					<p class="text-center text-sm text-gray-600">
						Sudah punya akun?
						<a class="font-semibold text-[#6f8b5f] underline decoration-2 underline-offset-4 hover:text-[#59724f]" href="{{ route('login.index') }}">Masuk di sini</a>
					</p>
				</div>
			</div>
		</div>
	</body>

	<script>
		const form = document.getElementById('dummy-register-form');
		if (form) {
			form.addEventListener('submit', (event) => event.preventDefault());
			form.querySelector('button[type="button"]').addEventListener('click', () => {
				const data = {
					name: form.name.value,
					email: form.email.value,
					password: form.password.value,
				};
				alert(`Mode dummy:\nNama: ${data.name}\nEmail: ${data.email}\nPassword: ${data.password}`);
			});
		}
	</script>
</html>


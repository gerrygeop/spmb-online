<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? 'SPMB Sekolah' }}</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
		rel="stylesheet">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<style>
		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
		}
	</style>
</head>

<body class="bg-gray-50 text-slate-800 antialiased">
	<!-- Navbar -->
	<nav class="bg-white/70 border-b border-gray-100 fixed top-0 w-full z-50 shadow backdrop-blur-lg">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between h-20 items-center">
				<div class="flex items-center gap-3">
					<div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
						</svg>
					</div>
					<div>
						<span class="text-xl font-bold text-slate-900 block leading-none">SPMB Sekolah</span>
						<span class="text-xs text-slate-500 font-medium">Penerimaan Peserta Didik Baru</span>
					</div>
				</div>
				<div class="hidden md:flex space-x-8 items-center">
					<a href="{{ url('/') }}"
						class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Beranda</a>
					<a href="#alur" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Alur
						Pendaftaran</a>
					<a href="#jadwal" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Jadwal</a>
					<a href="{{ route('status') }}"
						class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Cek
						Status</a>
				</div>
				<div class="flex items-center gap-3">
					<a href="{{ route('status') }}"
						class="hidden md:inline-flex px-5 py-2.5 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-full transition-colors">
						Cek Status
					</a>
					<a href="{{ route('register') }}"
						class="px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-full shadow-lg shadow-indigo-600/20 transition-all hover:scale-105">
						Daftar Sekarang
					</a>
				</div>
			</div>
		</div>
	</nav>

	<main class="pt-20">
		{{ $slot }}
	</main>

	<footer class="bg-slate-900 text-white pt-16 pb-8 border-t border-slate-800">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
				<div class="col-span-1 md:col-span-1">
					<div class="flex items-center gap-3 mb-6">
						<div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center text-slate-900 font-bold">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
							</svg>
						</div>
						<span class="text-xl font-bold">SPMB Sekolah</span>
					</div>
					<p class="text-slate-400 text-sm leading-relaxed">
						Sistem Penerimaan Peserta Didik Baru (PPDB) Online terpercaya. Wujudkan pendidikan berkualitas
						untuk masa depan yang lebih baik.
					</p>
				</div>
				<div>
					<h3 class="font-bold text-lg mb-4">Tautan Cepat</h3>
					<ul class="space-y-3 text-sm text-slate-400">
						<li><a href="#" class="hover:text-white transition-colors">Beranda</a></li>
						<li><a href="#" class="hover:text-white transition-colors">Syarat Pendaftaran</a></li>
						<li><a href="#" class="hover:text-white transition-colors">Jadwal Seleksi</a></li>
						<li><a href="#" class="hover:text-white transition-colors">Pengumuman</a></li>
					</ul>
				</div>
				<div>
					<h3 class="font-bold text-lg mb-4">Jenjang Pendidikan</h3>
					<ul class="space-y-3 text-sm text-slate-400">
						<li><a href="#" class="hover:text-white transition-colors">Sekolah Dasar (SD)</a></li>
						<li><a href="#" class="hover:text-white transition-colors">Sekolah Menengah Pertama (SMP)</a>
						</li>
						<li><a href="#" class="hover:text-white transition-colors">Sekolah Menengah Atas (SMA)</a></li>
						<li><a href="#" class="hover:text-white transition-colors">Sekolah Menengah Kejuruan (SMK)</a>
						</li>
					</ul>
				</div>
				<div>
					<h3 class="font-bold text-lg mb-4">Hubungi Kami</h3>
					<ul class="space-y-3 text-sm text-slate-400">
						<li class="flex items-start gap-3">
							<svg class="w-5 h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
							</svg>
							<span>Jl. Pendidikan No. 123, Kota Pelajar, Indonesia 12345</span>
						</li>
						<li class="flex items-center gap-3">
							<svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
							</svg>
							<span>(021) 1234-5678</span>
						</li>
						<li class="flex items-center gap-3">
							<svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
							</svg>
							<span>info@spmb-sekolah.sch.id</span>
						</li>
					</ul>
				</div>
			</div>
			<div
				class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
				<p>&copy; {{ date('Y') }} SPMB Sekolah. All rights reserved.</p>
				<div class="flex gap-6 mt-4 md:mt-0">
					<a href="#" class="hover:text-white">Privacy Policy</a>
					<a href="#" class="hover:text-white">Terms of Service</a>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>

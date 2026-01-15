<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? 'Pendaftaran Sekolah' }}</title>
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

<body class="bg-slate-50 text-slate-900 antialiased">
	<div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
			<a href="{{ url('/') }}"
				class="inline-flex items-center justify-center w-12 h-12 bg-indigo-600 rounded-xl text-white mb-4 shadow-lg shadow-indigo-600/20">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
					class="w-7 h-7">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
				</svg>
			</a>
			<h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
				Pendaftaran Online
			</h2>
			<p class="mt-2 text-sm text-slate-600">
				Silakan lengkapi data diri Anda untuk mendaftar.
			</p>
		</div>

		<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-4xl">
			<div class="bg-white py-8 px-4 shadow-xl border border-slate-100 sm:rounded-2xl sm:px-10 relative overflow-hidden">
				<div class="absolute top-0 left-0 w-full h-1 bg-linear-to-r from-indigo-500 via-purple-500 to-pink-500">
				</div>
				{{ $slot }}
			</div>
			<div class="mt-6 text-center">
				<a href="{{ url('/') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">
					&larr; Kembali ke Beranda
				</a>
			</div>
		</div>
	</div>
</body>

</html>

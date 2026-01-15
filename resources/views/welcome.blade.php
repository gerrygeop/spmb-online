<x-layouts.landing>
	<!-- Hero Section -->
	<section class="relative pt-16 pb-24 lg:pt-32 lg:pb-40 overflow-hidden">
		<div
			class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,var(--tw-gradient-stops))] from-indigo-100 via-slate-50 to-slate-50">
		</div>
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
			<div
				class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-sm font-semibold mb-6 border border-yellow-200">
				<span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
				Formulir Pendaftaran Online Dibuka
			</div>
			<h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
				Pendaftaran Peserta Didik Baru
			</h1>
			<p class="text-lg md:text-xl text-slate-600 mb-10 max-w-2xl mx-auto leading-relaxed">
				Isi formulir berikut dengan data yang benar dan lengkap. Pastikan semua dokumen persyaratan telah
				disiapkan untuk masa depan yang lebih cerah.
			</p>
			<div class="flex flex-col sm:flex-row gap-4 justify-center">
				<a href="{{ route('register') }}"
					class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-indigo-600 rounded-full hover:bg-indigo-700 shadow-lg shadow-indigo-600/30 transition-all hover:scale-105">
					Daftar Sekarang
				</a>
				<a href="{{ route('status') }}"
					class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-slate-700 bg-white border border-slate-200 rounded-full hover:bg-slate-50 hover:border-slate-300 shadow-sm transition-all">
					Cek Status Pendaftaran
				</a>
			</div>
		</div>
	</section>

	<!-- Alur Pendaftaran Section -->
	<section id="alur" class="py-20 bg-white relative">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-16">
				<h2 class="text-3xl font-bold text-slate-900 mb-4">Alur Pendaftaran</h2>
				<p class="text-slate-600 max-w-xl mx-auto">Ikuti langkah-langkah mudah berikut untuk melakukan
					pendaftaran secara online.</p>
			</div>

			<div class="relative">
				<!-- Connecting Line (Desktop) -->
				<div class="hidden md:block absolute top-12 left-0 w-full h-1 bg-slate-100 z-0"></div>

				<div class="grid grid-cols-1 md:grid-cols-5 gap-8">
					<!-- Step 1 -->
					<div class="relative z-10 flex flex-col items-center text-center group">
						<div
							class="w-24 h-24 bg-white border-4 border-indigo-50 rounded-full flex items-center justify-center mb-4 shadow-sm group-hover:border-indigo-100 transition-colors">
							<span
								class="w-10 h-10 flex items-center justify-center bg-yellow-400 text-slate-900 font-bold rounded-full text-lg">1</span>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Pilih Jenjang</h3>
						<p class="text-sm text-slate-500 leading-relaxed">Pilih jenjang pendidikan yang sesuai dengan
							calon siswa.</p>
					</div>

					<!-- Step 2 -->
					<div class="relative z-10 flex flex-col items-center text-center group">
						<div
							class="w-24 h-24 bg-white border-4 border-indigo-50 rounded-full flex items-center justify-center mb-4 shadow-sm group-hover:border-indigo-100 transition-colors">
							<span
								class="w-10 h-10 flex items-center justify-center bg-slate-100 text-slate-500 font-bold rounded-full text-lg border border-slate-200">2</span>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Data Pribadi</h3>
						<p class="text-sm text-slate-500 leading-relaxed">Lengkapi identitas diri calon siswa dengan
							benar.</p>
					</div>

					<!-- Step 3 -->
					<div class="relative z-10 flex flex-col items-center text-center group">
						<div
							class="w-24 h-24 bg-white border-4 border-indigo-50 rounded-full flex items-center justify-center mb-4 shadow-sm group-hover:border-indigo-100 transition-colors">
							<span
								class="w-10 h-10 flex items-center justify-center bg-slate-100 text-slate-500 font-bold rounded-full text-lg border border-slate-200">3</span>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Data Orang Tua</h3>
						<p class="text-sm text-slate-500 leading-relaxed">Isi data lengkap orang tua atau wali siswa.
						</p>
					</div>

					<!-- Step 4 -->
					<div class="relative z-10 flex flex-col items-center text-center group">
						<div
							class="w-24 h-24 bg-white border-4 border-indigo-50 rounded-full flex items-center justify-center mb-4 shadow-sm group-hover:border-indigo-100 transition-colors">
							<span
								class="w-10 h-10 flex items-center justify-center bg-slate-100 text-slate-500 font-bold rounded-full text-lg border border-slate-200">4</span>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Upload Dokumen</h3>
						<p class="text-sm text-slate-500 leading-relaxed">Unggah dokumen persyaratan yang diperlukan.
						</p>
					</div>

					<!-- Step 5 -->
					<div class="relative z-10 flex flex-col items-center text-center group">
						<div
							class="w-24 h-24 bg-white border-4 border-indigo-50 rounded-full flex items-center justify-center mb-4 shadow-sm group-hover:border-indigo-100 transition-colors">
							<span
								class="w-10 h-10 flex items-center justify-center bg-slate-100 text-slate-500 font-bold rounded-full text-lg border border-slate-200">5</span>
						</div>
						<h3 class="text-lg font-bold text-slate-900 mb-2">Konfirmasi</h3>
						<p class="text-sm text-slate-500 leading-relaxed">Periksa kembali data dan kirim pendaftaran.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Jenjang Pendidikan Section -->
	<section class="py-20 bg-slate-50">
		<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl font-bold text-slate-900 mb-4">Pilih Jenjang Pendidikan</h2>
				<p class="text-slate-600">Silakan pilih jenjang pendidikan yang ingin didaftarkan.</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<!-- SD -->
				<div
					class="group bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition-all cursor-default">
					<div class="flex items-start gap-4">
						<div
							class="w-14 h-14 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center font-bold text-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
							SD
						</div>
						<div>
							<h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
								Sekolah Dasar</h3>
							<p class="text-sm text-slate-500">Kelas 1 - 6</p>
						</div>
					</div>
				</div>

				<!-- SMP -->
				<div
					class="group bg-white p-6 rounded-2xl border-2 border-yellow-400 shadow-sm relative overflow-hidden cursor-default">
					<div class="absolute top-4 right-4 text-white p-1 bg-yellow-400 rounded-full">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
							<path fill-rule="evenodd"
								d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
								clip-rule="evenodd" />
						</svg>
					</div>
					<div class="flex items-start gap-4">
						<div class="w-14 h-14 bg-yellow-400 text-white rounded-xl flex items-center justify-center font-bold text-xl">
							SMP
						</div>
						<div>
							<h3 class="text-lg font-bold text-slate-900">Sekolah Menengah Pertama</h3>
							<p class="text-sm text-slate-500">Kelas 7 - 9</p>
						</div>
					</div>
				</div>

				<!-- SMA -->
				<div
					class="group bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition-all cursor-default">
					<div class="flex items-start gap-4">
						<div
							class="w-14 h-14 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center font-bold text-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
							SMA
						</div>
						<div>
							<h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
								Sekolah Menengah Atas</h3>
							<p class="text-sm text-slate-500">Kelas 10 - 12</p>
						</div>
					</div>
				</div>

				<!-- SMK -->
				<div
					class="group bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition-all cursor-default">
					<div class="flex items-start gap-4">
						<div
							class="w-14 h-14 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center font-bold text-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
							SMK
						</div>
						<div>
							<h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
								Sekolah Menengah Kejuruan</h3>
							<p class="text-sm text-slate-500">Kelas 10 - 12</p>
						</div>
					</div>
				</div>
			</div>

			<div class="mt-12 text-center">
				<a href="{{ route('register') }}"
					class="inline-flex justify-center items-center px-8 py-3 text-sm font-bold text-white bg-indigo-900 rounded-lg hover:bg-slate-900 transition-all">
					Mulai Pendaftaran
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
						class="w-4 h-4 ml-2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
					</svg>
				</a>
			</div>
		</div>
	</section>
</x-layouts.landing>

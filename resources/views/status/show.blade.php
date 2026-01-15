<x-layouts.landing>
	<div class="bg-slate-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
		<div class="max-w-4xl mx-auto space-y-8">
			<!-- Header Card -->
			<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
				<div
					class="bg-slate-900 px-6 py-8 md:px-10 md:py-10 text-white flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
					<div>
						<h2 class="text-2xl font-bold">Status Pendaftaran</h2>
						<p class="text-slate-400 mt-1">Pantau proses pendaftaran peserta didik baru.</p>
					</div>
					<div class="text-right">
						<div class="text-sm text-slate-400 mb-1">Kode Pendaftaran</div>
						<div class="text-3xl font-mono font-bold tracking-wider text-yellow-400">
							{{ $registration->registration_code }}</div>
					</div>
				</div>

				<!-- Status Timeline/Badges -->
				<div class="p-6 md:p-10 border-b border-slate-100">
					@php
						$statusConfig = [
						    'draft' => ['label' => 'Draft', 'color' => 'bg-slate-100 text-slate-800', 'icon' => 'pencil'],
						    'pending_payment' => [
						        'label' => 'Menunggu Pembayaran',
						        'color' => 'bg-yellow-100 text-yellow-800',
						        'icon' => 'clock',
						    ],
						    'payment_verified' => [
						        'label' => 'Pembayaran Terverifikasi',
						        'color' => 'bg-blue-100 text-blue-800',
						        'icon' => 'check-circle',
						    ],
						    'verification_pending' => [
						        'label' => 'Verifikasi Admin',
						        'color' => 'bg-blue-100 text-blue-800',
						        'icon' => 'search',
						    ],
						    'need_revision' => [
						        'label' => 'Perlu Perbaikan',
						        'color' => 'bg-orange-100 text-orange-800',
						        'icon' => 'exclamation',
						    ],
						    'approved' => ['label' => 'Diterima', 'color' => 'bg-green-100 text-green-800', 'icon' => 'badge-check'],
						    'rejected' => ['label' => 'Ditolak', 'color' => 'bg-red-100 text-red-800', 'icon' => 'x-circle'],
						];
						$currentStatus = $statusConfig[$registration->status] ?? $statusConfig['draft'];
					@endphp

					<div class="flex flex-col md:flex-row items-center justify-between gap-6">
						<div class="flex items-center gap-4">
							<div
								class="w-12 h-12 rounded-full flex items-center justify-center {{ str_replace('text-', 'bg-', str_replace('bg-', 'text-', $currentStatus['color'])) }}">
								<!-- Icon Placeholder based on logic or static -->
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
									stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</div>
							<div>
								<div class="text-sm text-slate-500 font-medium">Status Saat Ini</div>
								<div class="text-xl font-bold {{ explode(' ', $currentStatus['color'])[1] }}">
									{{ $currentStatus['label'] }}
								</div>
							</div>
						</div>

						@if ($registration->status === 'pending_payment')
							<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 max-w-md w-full">
								<p class="text-sm text-yellow-800 font-medium mb-1">Tagihan Pembayaran</p>
								<p class="text-lg font-bold text-yellow-900">Rp
									{{ number_format($registration->total_amount, 0, ',', '.') }}</p>
								<p class="text-xs text-yellow-700 mt-2">Silakan lakukan pembayaran agar pendaftaran dapat
									diproses.</p>
							</div>
						@endif
					</div>

					@if ($registration->status === 'need_revision')
						<div class="mt-6 bg-orange-50 border border-orange-200 rounded-lg p-4">
							<h4 class="font-bold text-orange-900 flex items-center gap-2">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd"
										d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
										clip-rule="evenodd" />
								</svg>
								Catatan Perbaikan
							</h4>
							<p class="mt-2 text-sm text-orange-800">{{ $registration->notes }}</p>
							<div class="mt-4">
								<a href="{{ route('registration.edit', ['code' => $registration->registration_code]) }}"
									class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-orange-600 rounded-full hover:bg-orange-700 transition-colors shadow-sm">
									Edit Formulir &rarr;
								</a>
							</div>
						</div>
					@endif
				</div>
			</div>

			<!-- Detail Information -->
			<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
				<!-- Student Info -->
				<div class="md:col-span-2 space-y-8">
					<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
						<div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
							<h3 class="font-bold text-slate-900">Data Calon Siswa</h3>
						</div>
						<div class="p-6 space-y-6">
							<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
								<div>
									<label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Nama
										Lengkap</label>
									<div class="text-base font-semibold text-slate-900">
										{{ $registration->studentProfile->full_name }}</div>
								</div>
								<div>
									<label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Jenjang</label>
									<div class="text-base font-semibold text-slate-900">
										{{ strtoupper($registration->school_level) }}</div>
								</div>
								<div>
									<label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Tempat,
										Tanggal Lahir</label>
									<div class="text-base font-medium text-slate-900">
										{{ $registration->studentProfile->place_of_birth }},
										{{ \Carbon\Carbon::parse($registration->studentProfile->date_of_birth)->isoFormat('D MMMM Y') }}
									</div>
								</div>
								<div>
									<label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Jenis
										Kelamin</label>
									<div class="text-base font-medium text-slate-900">
										{{ $registration->studentProfile->gender }}</div>
								</div>
							</div>

							<div class="pt-6 border-t border-slate-100">
								<label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Alamat
									Domisili</label>
								<div class="text-base font-medium text-slate-900">
									{{ $registration->studentProfile->address }}</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Quick Actions / Contact -->
				<div class="space-y-6">
					<div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
						<h3 class="font-bold text-slate-900 mb-4">Informasi Kontak</h3>
						<ul class="space-y-4">
							<li class="flex items-start gap-3">
								<svg class="w-5 h-5 text-indigo-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
								</svg>
								<div class="text-sm font-medium text-slate-700 wrap-break-word">
									{{ $registration->studentProfile->email }}</div>
							</li>
							<li class="flex items-start gap-3">
								<svg class="w-5 h-5 text-indigo-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
								</svg>
								<div class="text-sm font-medium text-slate-700">
									{{ $registration->studentProfile->phone_number }}</div>
							</li>
						</ul>
					</div>

					<a href="{{ route('status') }}"
						class="block w-full py-3 px-4 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl text-center hover:bg-slate-50 hover:border-slate-300 transition-all shadow-sm">
						&larr; Cek Kode Lain
					</a>
				</div>
			</div>
		</div>
	</div>
</x-layouts.landing>

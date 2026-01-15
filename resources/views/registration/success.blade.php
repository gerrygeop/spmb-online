<x-layouts.registration>
	<div class="text-center">
		<svg class="mx-auto h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
		</svg>
		<h3 class="mt-2 text-xl font-medium text-gray-900">Pendaftaran Berhasil!</h3>
		<p class="mt-1 text-gray-500">Kode Pendaftaran Anda:</p>
		<p class="text-2xl font-bold text-indigo-600 my-4">{{ $code }}</p>
		<p class="text-sm text-gray-500 max-w-sm mx-auto">
			Silakan simpan kode ini untuk mengecek status pendaftaran Anda.
			Selanjutnya, silakan lakukan pembayaran biaya pendaftaran.
		</p>

		<div class="mt-8">
			<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
				<div class="flex">
					<div class="shrink-0">
						<!-- Heroicon name: mini/exclamation-triangle -->
						<svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
							<path fill-rule="evenodd"
								d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
								clip-rule="evenodd" />
						</svg>
					</div>
					<div class="ml-3">
						<p class="text-sm text-yellow-700">
							Fitur pembayaran Midtrans belum diaktifkan. <br>
							Status saat ini: <strong>Menunggu Pembayaran</strong>
						</p>
					</div>
				</div>
			</div>

			<a href="{{ route('register') }}"
				class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
				Kembali ke Halaman Utama
			</a>
		</div>
	</div>
</x-layouts.registration>

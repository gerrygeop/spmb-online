<div>
	<!-- Stepper -->
	<div class="mb-8 border-b border-gray-200 pb-4">
		<nav aria-label="Progress">
			<ol role="list" class="flex items-center">
				@for ($i = 1; $i <= $totalSteps; $i++)
					@if ($i != 1)
						<li class="relative pr-8 sm:pr-20">
							<div class="absolute inset-0 flex items-center" aria-hidden="true">
								<div class="h-0.5 w-full bg-gray-200"></div>
							</div>
						</li>
					@endif
					<li class="relative pr-8 sm:pr-20">
						<div class="absolute inset-0 flex items-center" aria-hidden="true">
							<div class="h-0.5 w-full {{ $i < $currentStep ? 'bg-indigo-600' : 'bg-gray-200' }}"></div>
						</div>
						<a href="#"
							class="relative flex h-8 w-8 items-center justify-center rounded-full {{ $i <= $currentStep ? 'bg-indigo-600 hover:bg-indigo-900' : 'bg-white border-2 border-gray-300 hover:border-gray-400' }}">
							@if ($i < $currentStep)
								<svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd"
										d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
										clip-rule="evenodd" />
								</svg>
							@elseif ($i == $currentStep)
								<span class="h-2.5 w-2.5 rounded-full bg-white" aria-hidden="true"></span>
							@else
								<span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300" aria-hidden="true"></span>
							@endif
							<span class="sr-only">Step {{ $i }}</span>
						</a>
					</li>
				@endfor
			</ol>
		</nav>
		<div class="mt-4 text-center">
			<h3 class="text-lg font-medium leading-6 text-gray-900">
				@if ($currentStep == 1)
					Pilih Jenjang Sekolah
				@elseif($currentStep == 2)
					Data Calon Siswa
				@elseif($currentStep == 3)
					Data Orang Tua / Wali
				@elseif($currentStep == 4)
					Upload Berkas
				@elseif($currentStep == 5)
					Konfirmasi
				@endif
			</h3>
		</div>
	</div>

	@if ($errors->any())
		<div class="rounded-md bg-red-50 p-4 mb-6">
			<div class="flex">
				<div class="shrink-0">
					<svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
						<path fill-rule="evenodd"
							d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
							clip-rule="evenodd" />
					</svg>
				</div>
				<div class="ml-3">
					<h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada inputan Anda:</h3>
					<div class="mt-2 text-sm text-red-700">
						<ul role="list" class="list-disc pl-5 space-y-1">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	@endif

	<form wire:submit.prevent="submit">
		<!-- Step 1: School Level -->
		@if ($currentStep == 1)
			<div class="space-y-6">
				<div>
					<label class="text-base font-semibold text-gray-900">Pilih Jenjang Pendidikan</label>
					<p class="text-sm text-gray-500">Silakan pilih jenjang pendidikan yang akan didaftar.</p>
					<fieldset class="mt-4">
						<legend class="sr-only">Jenjang Sekolah</legend>
						<div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
							<div class="flex items-center">
								<input id="sd" name="school_level" type="radio" value="sd" wire:model="school_level"
									class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
								<label for="sd" class="ml-3 block text-sm font-medium leading-6 text-gray-900">SD</label>
							</div>
							<div class="flex items-center">
								<input id="smp" name="school_level" type="radio" value="smp" wire:model="school_level"
									class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
								<label for="smp" class="ml-3 block text-sm font-medium leading-6 text-gray-900">SMP</label>
							</div>
							<div class="flex items-center">
								<input id="sma" name="school_level" type="radio" value="sma" wire:model="school_level"
									class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
								<label for="sma" class="ml-3 block text-sm font-medium leading-6 text-gray-900">SMA</label>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		@endif

		<!-- Step 2: Student Data -->
		@if ($currentStep == 2)
			<div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
				<div class="sm:col-span-4">
					<label for="full_name" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
					<div class="mt-2">
						<input type="text" wire:model="full_name" id="full_name"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div class="sm:col-span-3">
					<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
					<div class="mt-2">
						<input type="email" wire:model="email" id="email"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div class="sm:col-span-3">
					<label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Nomor HP /
						WhatsApp</label>
					<div class="mt-2">
						<input type="text" wire:model="phone_number" id="phone_number"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div class="sm:col-span-3">
					<label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
					<div class="mt-2">
						<select id="gender" wire:model="gender"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
							<option value="">Pilih...</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>

				<div class="sm:col-span-3">
					<label for="date_of_birth" class="block text-sm font-medium leading-6 text-gray-900">Tanggal
						Lahir</label>
					<div class="mt-2">
						<input type="date" wire:model="date_of_birth" id="date_of_birth"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div class="sm:col-span-3">
					<label for="place_of_birth" class="block text-sm font-medium leading-6 text-gray-900">Tempat
						Lahir</label>
					<div class="mt-2">
						<input type="text" wire:model="place_of_birth" id="place_of_birth"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>
				<div class="sm:col-span-3">
					<label for="nisn" class="block text-sm font-medium leading-6 text-gray-900">NISN (Opsional)</label>
					<div class="mt-2">
						<input type="text" wire:model="nisn" id="nisn"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div class="col-span-full">
					<label for="address" class="block text-sm font-medium leading-6 text-gray-900">Alamat Lengkap</label>
					<div class="mt-2">
						<textarea id="address" wire:model="address" rows="3"
						 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
					</div>
				</div>

				<div class="col-span-full">
					<label for="previous_school" class="block text-sm font-medium leading-6 text-gray-900">Asal
						Sekolah</label>
					<div class="mt-2">
						<input type="text" wire:model="previous_school" id="previous_school"
							class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>
			</div>
		@endif

		<!-- Step 3: Parent Data -->
		@if ($currentStep == 3)
			<div class="space-y-8">
				<!-- Father -->
				<div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
					<div class="col-span-full border-b border-gray-900/10 pb-2">
						<h2 class="text-base font-semibold leading-7 text-gray-900">Data Ayah</h2>
					</div>
					<div class="sm:col-span-2">
						<label for="father_name" class="block text-sm font-medium leading-6 text-gray-900">Nama Ayah</label>
						<div class="mt-2">
							<input type="text" wire:model="father_name" id="father_name"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="sm:col-span-2">
						<label for="father_phone" class="block text-sm font-medium leading-6 text-gray-900">No. HP
							Ayah</label>
						<div class="mt-2">
							<input type="text" wire:model="father_phone" id="father_phone"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="sm:col-span-2">
						<label for="father_occupation" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan
							Ayah</label>
						<div class="mt-2">
							<input type="text" wire:model="father_occupation" id="father_occupation"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
				</div>

				<!-- Mother -->
				<div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
					<div class="col-span-full border-b border-gray-900/10 pb-2">
						<h2 class="text-base font-semibold leading-7 text-gray-900">Data Ibu</h2>
					</div>
					<div class="sm:col-span-2">
						<label for="mother_name" class="block text-sm font-medium leading-6 text-gray-900">Nama Ibu</label>
						<div class="mt-2">
							<input type="text" wire:model="mother_name" id="mother_name"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="sm:col-span-2">
						<label for="mother_phone" class="block text-sm font-medium leading-6 text-gray-900">No. HP
							Ibu</label>
						<div class="mt-2">
							<input type="text" wire:model="mother_phone" id="mother_phone"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="sm:col-span-2">
						<label for="mother_occupation" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan
							Ibu</label>
						<div class="mt-2">
							<input type="text" wire:model="mother_occupation" id="mother_occupation"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
				</div>

				<!-- Guardian (Optional) -->
				<div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
					<div class="col-span-full border-b border-gray-900/10 pb-2">
						<h2 class="text-base font-semibold leading-7 text-gray-900">Data Wali (Opsional)</h2>
					</div>
					<div class="sm:col-span-2">
						<label for="guardian_name" class="block text-sm font-medium leading-6 text-gray-900">Nama
							Wali</label>
						<div class="mt-2">
							<input type="text" wire:model="guardian_name" id="guardian_name"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="sm:col-span-2">
						<label for="guardian_phone" class="block text-sm font-medium leading-6 text-gray-900">No. HP
							Wali</label>
						<div class="mt-2">
							<input type="text" wire:model="guardian_phone" id="guardian_phone"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="sm:col-span-2">
						<label for="guardian_occupation" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan
							Wali</label>
						<div class="mt-2">
							<input type="text" wire:model="guardian_occupation" id="guardian_occupation"
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
					</div>
				</div>
			</div>
		@endif

		<!-- Step 4: Documents -->
		@if ($currentStep == 4)
			<div class="space-y-6">
				<div class="col-span-full">
					<label for="document_kartu_keluarga" class="block text-sm font-medium leading-6 text-gray-900">Kartu
						Keluarga (PDF/Image, Max 2MB)</label>
					<div class="mt-2">
						<input type="file" wire:model="document_kartu_keluarga" id="document_kartu_keluarga"
							class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
					</div>
					<div wire:loading wire:target="document_kartu_keluarga">Uploading...</div>
				</div>
				<div class="col-span-full">
					<label for="document_akte_kelahiran" class="block text-sm font-medium leading-6 text-gray-900">Akte
						Kelahiran (PDF/Image, Max 2MB)</label>
					<div class="mt-2">
						<input type="file" wire:model="document_akte_kelahiran" id="document_akte_kelahiran"
							class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
					</div>
					<div wire:loading wire:target="document_akte_kelahiran">Uploading...</div>
				</div>
				<div class="col-span-full">
					<label for="document_ijazah" class="block text-sm font-medium leading-6 text-gray-900">Ijazah / SKL
						(Opsional) (PDF/Image, Max 2MB)</label>
					<div class="mt-2">
						<input type="file" wire:model="document_ijazah" id="document_ijazah"
							class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
					</div>
					<div wire:loading wire:target="document_ijazah">Uploading...</div>
				</div>
			</div>
		@endif

		<!-- Step 5: Confirmation -->
		@if ($currentStep == 5)
			<div class="space-y-6">
				<p class="text-sm text-gray-500">Mohon periksa kembali data yang telah Anda masukkan sebelum mengirim
					pendaftaran.</p>

				<div class="bg-gray-50 p-4 rounded-md space-y-2">
					<p><strong>Jenjang:</strong> {{ strtoupper($school_level) }}</p>
					<p><strong>Nama:</strong> {{ $full_name }}</p>
					<p><strong>Email:</strong> {{ $email }}</p>
					<p><strong>No. HP:</strong> {{ $phone_number }}</p>
					<p><strong>Orang Tua:</strong> {{ $father_name }} & {{ $mother_name }}</p>
				</div>

				<div class="flex items-center">
					<input id="confirm" type="checkbox" required
						class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
					<label for="confirm" class="ml-2 block text-sm text-gray-900">Saya menyatakan bahwa data yang saya
						masukkan adalah benar.</label>
				</div>
			</div>
		@endif

		<!-- Navigation Buttons -->
		<div class="mt-8 flex justify-between">
			@if ($currentStep > 1)
				<button type="button" wire:click="previousStep"
					class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
					Kembali
				</button>
			@else
				<div></div>
			@endif

			@if ($currentStep < $totalSteps)
				<button type="button" wire:click="nextStep"
					class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
					Selanjutnya
				</button>
			@else
				<button type="submit"
					class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-green-600">
					Kirim Pendaftaran
				</button>
			@endif
		</div>
	</form>
</div>

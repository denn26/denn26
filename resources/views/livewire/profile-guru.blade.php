<div class="sm:px-6 lg:px-8">
    @include('navigation-menu')

    @if ($message = Session::get('success'))
        <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ $message }}
        </div>
    @endif

    <div class="mb-4 overflow-hidden rounded-lg shadow-md">
        <form wire:submit.prevent="update">
            <div class="shadow sm:rounded-md">
                <div class="px-4 py-4 space-y-6 bg-white sm:p-6">
                    <div class="font-semibold">Ubah Data Guru</div>

                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                            <input type="text" wire:model='nip' id="nip"
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nip') border-red-500 @enderror"
                                value="{{ old('nip') }}" disabled>
                            @error('nip')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" wire:model='nama' id="nama"
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status
                                Kepegawaian</label>
                            <select id="status" wire:model='status'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                                <option>Pilih Status</option>
                                <option value="pns">PNS</option>
                                <option value="honorer">Honorer</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="tglLahir" class="block text-sm font-medium text-gray-700">Tanggal
                                Lahir</label>
                            <input type="date" wire:model='tglLahir' id="tglLahir"
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tglLahir') border-red-500 @enderror"
                                value="{{ old('tglLahir') }}">
                            @error('tglLahir')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                Kelamin</label>
                            <select id="status" wire:model='jenisKelamin'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                            @error('jenisKelamin')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                            <select id="status" wire:model='agama'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                                <option>Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="protestan">Protestan</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                            @error('agama')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="pendidikan"
                                class="block mb-2 text-sm font-medium text-gray-900">Pendidikan</label>
                            <select id="status" wire:model='pendidikan'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                                <option>Pilih Pendidikan</option>
                                <option value="sd">SD</option>
                                <option value="smp">SMP</option>
                                <option value="sma">SMA</option>
                                <option value="d1">D1</option>
                                <option value="d2">D2</option>
                                <option value="d3">D3</option>
                                <option value="d4/s1">D4/S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                            @error('pendidikan')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700"> Cover photo </label>
                        <div
                            class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md @error('foto') border-red-500 @enderror">
                            <div class="space-y-1 text-center">
                                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" wire:model="foto" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                        @error('foto')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

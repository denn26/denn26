<div
    class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center py-6 overflow-auto bg-gray-400 bg-opacity-60 md:h-full md:inset-0">
    <div class="relative w-full h-full px-4 sm:max-w-lg">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow ">
            <form>
                <div class="shadow sm:rounded-md">
                    <div class="px-4 py-4 space-y-6 bg-white sm:p-6">
                        <div class="font-semibold">Tambah Data Siswa</div>

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                                <input type="text" wire:model='nisn' id="nisn"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nisn') border-red-500 @enderror"
                                    value="{{ old('nisn') }}">
                                @error('nisn')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" wire:model='nama' id="nama"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="tglLahir" class="block text-sm font-medium text-gray-700">Tanggal
                                    Lahir</label>
                                <input type="date" wire:model='tglLahir' id="tglLahir"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tglLahir') border-red-500 @enderror"
                                    value="{{ old('tglLahir') }}">
                                @error('tglLahir')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
                                <select id="kelas" wire:model='kelas'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                                    <option>Pilih Kelas</option>
                                    @foreach ($kelas = App\Models\Kelas::all() as $k)
                                        <option value="{{ $k->id }}">Kelas {{ $k->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
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
                                <select id="status" wire:model="agama"
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
                                <label for="alamat" class="block text-sm font-medium text-gray-700"> Alamat </label>
                                <div class="mt-1">
                                    <textarea wire:model="alamat" id="alamat" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                                </div>
                                @error('alamat')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="namaAyah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                <input type="text" wire:model='namaAyah' id="namaAyah"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('namaAyah') border-red-500 @enderror"
                                    value="{{ old('namaAyah') }}">
                                @error('namaAyah')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="namaIbu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                <input type="text" wire:model='namaIbu' id="namaIbu"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('namaIbu') border-red-500 @enderror"
                                    value="{{ old('namaIbu') }}">
                                @error('namaIbu')
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
                                            <input id="file-upload" wire:model="foto" type="file"
                                                class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                                </div>
                            </div>
                            @error('foto')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button type="button" wire:click="createSiswaModalClose()"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium border border-transparent rounded-md shadow-sm text-slate-900 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancel
                            </button>

                            <button type="button" wire:click.prevent="store()"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

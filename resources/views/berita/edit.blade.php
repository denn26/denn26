<div
    class="fixed left-0 right-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto bg-gray-400 bg-opacity-60 top-4 h-modal md:h-full md:inset-0">
    <div class="relative w-full h-full max-w-md px-4 md:h-auto ">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow ">
            <form wire:submit.prevent="update({{ $beritaId }})">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-3 space-y-6 bg-white sm:p-6">
                        <div class="font-semibold">Ubah Data Berita</div>

                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="judul" class="block text-sm font-medium text-gray-700">Judul
                                    Berita</label>
                                <input type="text" wire:model='judul' id="judul"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('judul') border-red-500 @enderror"
                                    value="{{ old('judul') ?? $judul }}">
                                @error('judul')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <div class="mt-1">
                                <textarea id="deskripsi" wire:model="deskripsi" rows="6"
                                    class="@error('deskripsi') border-red-500 @enderror w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('deskripsi') ?? $deskripsi }}</textarea>
                                @error('deskripsi')
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
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            @error('foto')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="button" wire:click="closeUpdateModalPopover()"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium border border-transparent rounded-md shadow-sm text-slate-900 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>

                        <button
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

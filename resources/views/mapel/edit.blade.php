<div
    class="fixed left-0 right-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto bg-gray-400 bg-opacity-60 top-4 h-modal md:h-full md:inset-0">
    <div class="relative w-full h-full max-w-md px-4 md:h-auto ">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow ">
            <form wire:submit.prevent="update({{ $mapelId }})">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-3 space-y-6 bg-white sm:p-6">
                        <div class="font-semibold">Ubah Data Mata Pelajaran</div>

                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="judul" class="block text-sm font-medium text-gray-700">Nama Mapel</label>
                                <input type="text" wire:model='nama' id="nama"
                                       class="w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror"
                                       value="{{ old('judul') ?? $nama }}">
                                @error('nama')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="button" wire:click="updateMapelModalClose()"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium border border-transparent rounded-md shadow-sm text-slate-900 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>

                        <button
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

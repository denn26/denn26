<div class="sm:px-6 lg:px-8">
    @include('navigation-menu')

    @if (Auth::user()->roles_id == '2')
        <div class="p-4 mb-4 overflow-hidden bg-white rounded-lg shadow-md">
            <form wire:submit.prevent="store">
                <div class="mb-6">
                    <label for="keterangan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Keterangan</label>
                    <textarea wire:model="keterangan" id="keterangan" rows="2"
                        class="border @error('keterangan') border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukan keterangan...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                            </span>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="user_avatar">Upload
                        file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" id="file" type="file" wire:model='file'>
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file">Masukan File Nilai. (Sesuaikan
                        nama
                        file sesuai mata pelajaran)</div>
                    @error('file')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                            {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    @endif
    <div class="p-4 mb-4 overflow-hidden bg-white rounded-lg shadow-md">
        <h3 class="mb-3">File Nilai</h3>

        <div>
            <ul class="max-w-md text-sm font-medium bg-white border border-gray-200 rounded-lg">
                @forelse($nilai as $n)
                    <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg flex items-center">
                       <div>
                        <h4 class="text-lg">{{ $n->keterangan }}</h4>
                        Download File: <a href="{{ Storage::url('pdf/' . $n->file) }}"
                            class="text-blue-500 underline">{{ $n->file }}</a>
                        <p class="text-xs">Uploaded {{ $n->created_at->format('H:i') }}</p>
                       </div>
                        <button type="button" wire:click="openDeleteModalPopover({{ $n->id }})">
                            x
                        </button>
                    </li>
                @empty
                    <p class="p-3">Tidak Ada Data</p>
                @endforelse
            </ul>
        </div>
    </div>
    @if ($deleteModalOpen)
        @include('components.delete-modal')
    @endif
</div>
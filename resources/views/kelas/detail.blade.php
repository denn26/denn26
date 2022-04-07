<div
    class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center overflow-y-auto bg-gray-400 bg-opacity-60 h-modal md:h-full md:inset-0">
    <div class="relative h-full max-w-4xl px-4 md:h-auto ">
        <!-- Modal content -->
        <div class="p-3 bg-white rounded-lg shadow">
            <div class="m-4 overflow-auto rounded-lg shadow-md max-h-80">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                <input wire:model="selectAll" type="checkbox">
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                NISN
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                Nama
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                Jenis Kelamin
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                Nama Ayah
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                Nama Ibu
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $k)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <input wire:model="selected" value="{{ $k->nisn }}" type="checkbox">
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{ $k->nisn }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div> {{ $k->nama }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div>{{ $k->jenis_kelamin }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div>{{ $k->nama_ayah }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div>{{ $k->nama_ibu }}</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-2 text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="grid grid-cols-3 gap-6 mx-4">
                <div class="col-span-6 sm:col-span-3">
                    <select id="kelas" wire:model='pilihKelas'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                        <option>Pilih Kelas</option>
                        @foreach ($semuaKelas as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <button type="button" wire:click="detailModalClose"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium border border-transparent rounded-md shadow-sm text-slate-900 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>

                <button type="button" wire:click.prevent="move"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

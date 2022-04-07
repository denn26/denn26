<div class="sm:px-6 lg:px-8">
    @include('navigation-menu')

    @if ($message = Session::get('success'))
        <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
             role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ $message }}
        </div>
    @endif

    <div class="flex mb-6 space-x-4">
        <button type="button" wire:click="create()"
                class="text-white bg-blue-500 shadow-md hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>

        <input type="search" wire:model.debounce.300ms="search"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
               placeholder="Cari...">

        <select wire:model="perPage"
                class="bg-gray-50 border w-48 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            <option>5</option>
            <option>20</option>
            <option>40</option>
            <option>80</option>
            <option>100</option>
        </select>
    </div>

    <div class="mb-4 overflow-hidden rounded-lg shadow-md">
        <table class="min-w-full">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                    ID
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                    Nama Mapel
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($mapel as $b)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $b->id }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        <div>{{ $b->nama }}</div>
                    </td>
                    <td class="flex px-6 py-4 space-x-4 text-sm font-medium text-right whitespace-nowrap">
                        <button wire:click="edit({{ $b->id }})"
                                class="text-blue-600 hover:underline">Edit</button>
                        <button wire:click="openDeleteModalPopover({{ $b->id }})"
                                class="text-red-600 hover:underline">Hapus</button>
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
    {{ $mapel->links() }}

    @if ($createMapelModal)
        @include('mapel.create')
    @endif

    @if ($updateMapelModal)
        @include('mapel.edit')
    @endif

    @if ($deleteModalOpen)
        @include('components.delete-modal')
    @endif

</div>

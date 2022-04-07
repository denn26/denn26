<div class="flex flex-col items-center justify-around mt-3 space-y-6 md:space-y-0 md:space-x-6 md:flex-row">
    <div
        class="flex flex-col items-center justify-center w-full px-12 py-3 space-y-6 bg-white border border-gray-200 rounded-lg shadow-md md:w-1/4">
        <div class="flex items-center justify-center w-10 h-10 p-1 bg-gray-800 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="flex flex-col space-y-1 text-center">
            <h3 class="text-4xl font-extrabold">{{ $guru }}</h3>
            <p>Jumlah Guru</p>
        </div>
    </div>
    <div
        class="flex flex-col items-center justify-center w-full px-12 py-3 space-y-6 bg-white border border-gray-200 rounded-lg shadow-md md:w-1/4">
        <div class="flex items-center justify-center w-10 h-10 p-1 bg-gray-800 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
        </div>
        <div class="flex flex-col space-y-1 text-center">
            <h3 class="text-4xl font-extrabold">{{ $siswa }}</h3>
            <p>Jumlah Siswa</p>
        </div>
    </div>
    <div
        class="flex flex-col items-center justify-center w-full px-12 py-3 space-y-6 bg-white border border-gray-200 rounded-lg shadow-md md:w-1/4">
        <div class="flex items-center justify-center w-10 h-10 p-1 bg-gray-800 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
            </svg>
        </div>
        <div class="flex flex-col space-y-1 text-center">
            <h3 class="text-4xl font-extrabold">{{ $kelas }}</h3>
            <p>Jumlah Kelas</p>
        </div>
    </div>
    <div
        class="flex flex-col items-center justify-center w-full px-12 py-3 space-y-6 bg-white border border-gray-200 rounded-lg shadow-md md:w-1/4">
        <div class="flex items-center justify-center w-10 h-10 p-1 bg-gray-800 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
            </svg>
        </div>
        <div class="flex flex-col space-y-1 text-center">
            <h3 class="text-4xl font-extrabold">{{ $mapel }}</h3>
            <p>Jumlah Mapel</p>
        </div>
    </div>
</div>

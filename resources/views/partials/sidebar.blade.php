<aside class="w-64" aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-auto shadow-xl bg-gray-50 text-slate-900 rounded-box">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg
                        class="{{ request()->is('dashboard') ? 'h-6 w-6 ' : 'h-5 w-5' }} text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 {{ request()->is('dashboard') ? 'font-bold' : '' }}">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('berita') }}"
                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="{{ request()->is('berita') ? 'h-6 w-6 ' : 'h-5 w-5' }} text-gray-500 transition duration-75 group-hover:text-gray-900"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                              clip-rule="evenodd"/>
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
                    </svg>
                    <span class="ml-3 {{ request()->is('berita') ? 'font-bold': '' }}">Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kelas') }}"
                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="{{ request()->is('kelas') ? 'h-6 w-6 ' : 'h-5 w-5' }} w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"/>
                    </svg>
                    <span class="ml-3 {{ request()->is('kelas') ? 'font-bold': '' }}">Kelas</span>
                </a>
            </li>
            <li>
                <a href="#"
                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                    </svg>
                    <span class="ml-3">Mata Pelajaran</span>
                </a>
            </li>
            <li>
                <a href="#"
                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-3">Guru</span>
                </a>
            </li>
            <li>
                <a href="#"
                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    <span class="ml-3">Siswa</span>
                </a>
            </li>

        </ul>
    </div>
</aside>

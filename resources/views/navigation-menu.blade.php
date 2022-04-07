<nav class="px-3 mb-6 shadow-xl navbar text-slate-900 rounded-box">
    <div class="flex items-center flex-1">
        <a class="text-xl normal-case btn btn-ghost">{{ $header }}</a>
    </div>
    <div class="flex-non">
        <div class="dropdown dropdown-end">
          <div class='flex items-center space-x-4'>

            <div class="font-bold cursor-pointer">{{ Auth::user()->username }}</div>

            <label tabindex="0" class="flex items-center justify-center btn btn-ghost btn-circle avatar">
                
                <div class="w-16 rounded-full">
                    <img src="{{ Auth::user()->getProfilePhotoUrlAttribute() }}">
                </div>
            </label>
          </div>
            <ul tabindex="0"
                class="p-2 mt-3 bg-white shadow menu menu-compact dropdown-content rounded-box w-52 hover:bg-gray-100">
                <!-- Authentication -->
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </ul>
        </div>
    </div>
</nav>

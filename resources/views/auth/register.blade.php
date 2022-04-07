<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Username') }}" />
                <x-jet-input class="block w-full mt-1" type="text" name="username" :value="old('username')"
                    autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Roles') }}" />
                <select name="roles_id" class="block w-full mt-1 border-gray-300 rounded-md select select-bordered">
                    <option value="1">Admin</option>
                    <option value="2">Guru</option>
                    <option value="3">Siswa</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block w-full mt-1" type="password" name="password_confirmation" required
                    autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

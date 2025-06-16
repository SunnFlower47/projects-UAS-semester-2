<section class="p-6 bg-purple-50 rounded-lg w-full shadow-md border border-purple-200">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-purple-800">
            {{ __('Perbarui Password') }}
        </h2>
        <p class="text-sm text-purple-700">
            {{ __('Gunakan password yang panjang dan acak untuk menjaga akunmu tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6" novalidate>
        @csrf
        @method('put')

        {{-- Password Saat Ini --}}
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-purple-800">
                {{ __('Password Saat Ini') }}
            </label>
            <input
                type="password"
                name="current_password"
                id="update_password_current_password"
                autocomplete="current-password"
                class="mt-1 block w-full rounded-md bg-white text-purple-900 border border-purple-300 focus:border-purple-400 focus:ring focus:ring-purple-300 focus:ring-opacity-50 @if($errors->updatePassword->has('current_password')) border-red-500 @endif"
            >
            @if ($errors->updatePassword->has('current_password'))
                <p class="text-red-500 text-sm mt-1">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </div>

        {{-- Password Baru --}}
        <div>
            <label for="update_password_password" class="block text-sm font-medium text-purple-800">
                {{ __('Password Baru') }}
            </label>
            <input
                type="password"
                name="password"
                id="update_password_password"
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md bg-white text-purple-900 border border-purple-300 focus:border-purple-400 focus:ring focus:ring-purple-300 focus:ring-opacity-50 @if($errors->updatePassword->has('password')) border-red-500 @endif"
            >
            @if ($errors->updatePassword->has('password'))
                <p class="text-red-500 text-sm mt-1">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-purple-800">
                {{ __('Konfirmasi Password') }}
            </label>
            <input
                type="password"
                name="password_confirmation"
                id="update_password_password_confirmation"
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md bg-white text-purple-900 border border-purple-300 focus:border-purple-400 focus:ring focus:ring-purple-300 focus:ring-opacity-50 @if($errors->updatePassword->has('password_confirmation')) border-red-500 @endif"
            >
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="text-red-500 text-sm mt-1">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="bg-purple-400 hover:bg-purple-500 text-white font-semibold px-4 py-2 rounded shadow transition"
            >
                {{ __('Simpan') }}
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-emerald-600 text-sm">
                    {{ __('Password berhasil diperbarui.') }}
                </span>
            @endif
        </div>
    </form>
</section>

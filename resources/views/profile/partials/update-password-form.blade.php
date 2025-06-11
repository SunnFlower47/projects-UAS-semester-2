<section class="p-6 bg-gray-900 rounded-lg max-w-xl ml-10">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-white">
            {{ __('Update Password') }}
        </h2>
        <p class="text-sm text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-white">
                {{ __('Current Password') }}
            </label>
            <input
                type="password"
                name="current_password"
                id="update_password_current_password"
                autocomplete="current-password"
                class="mt-1 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-cyan-500 focus:ring focus:ring-cyan-500 focus:ring-opacity-50 @if($errors->updatePassword->has('current_password')) border-red-500 @endif"
            >
            @if ($errors->updatePassword->has('current_password'))
                <p class="text-red-500 text-sm mt-1">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </div>

        {{-- New Password --}}
        <div>
            <label for="update_password_password" class="block text-sm font-medium text-white">
                {{ __('New Password') }}
            </label>
            <input
                type="password"
                name="password"
                id="update_password_password"
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-cyan-500 focus:ring focus:ring-cyan-500 focus:ring-opacity-50 @if($errors->updatePassword->has('password')) border-red-500 @endif"
            >
            @if ($errors->updatePassword->has('password'))
                <p class="text-red-500 text-sm mt-1">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-white">
                {{ __('Confirm Password') }}
            </label>
            <input
                type="password"
                name="password_confirmation"
                id="update_password_password_confirmation"
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-cyan-500 focus:ring focus:ring-cyan-500 focus:ring-opacity-50 @if($errors->updatePassword->has('password_confirmation')) border-red-500 @endif"
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
                class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold px-4 py-2 rounded shadow transition"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-green-400 text-sm">
                    {{ __('Saved.') }}
                </span>
            @endif
        </div>
    </form>
</section>

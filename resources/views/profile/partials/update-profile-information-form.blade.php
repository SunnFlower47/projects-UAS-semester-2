
<section class="p-6 bg-gray-900 rounded-lg max-w-xl ml-10">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-white">{{ __('Profile Information') }}</h2>
        <p class="text-sm text-gray-300">{{ __("Update your account's profile and email.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')
        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-white">{{ __('Name') }}</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-gray-700 focus:border-cyan-500 focus:ring focus:ring-cyan-500 focus:ring-opacity-50 @error('name') border-red-500 @enderror"
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-white">{{ __('Email') }}</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-gray-700 focus:border-cyan-500 focus:ring focus:ring-cyan-500 focus:ring-opacity-50 @error('email') border-red-500 @enderror"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-yellow-300 text-sm">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="underline text-cyan-400 hover:text-cyan-200 ml-1">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-green-400 mt-1">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        {{-- Foto Profil --}}
        <div>
            <label for="photo" class="block text-sm font-medium text-white">{{ __('Profile Photo') }}</label>
            <input
                type="file" id="photo" name="photo" accept="image/*"
                class="mt-1 block w-full text-white bg-gray-800 border border-gray-700 rounded-md file:bg-cyan-600 file:text-white file:px-4 file:py-2 file:rounded file:cursor-pointer"
            >
            @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

            @if ($user->photo)
                <div class="mt-4 flex flex-col items-start gap-2">
                    <img id="preview-photo" src="{{ asset('storage/' . $user->photo) }}"
                         alt="Profile Photo" class="rounded-md max-h-36 border border-gray-600 shadow">
                    <button type="button" id="btn-delete-photo"
                            class="text-sm text-red-400 hover:text-red-600 underline">
                        {{ __('Delete Profile Photo') }}
                    </button>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                {{ __('Save Changes') }}
            </button>
        </div>
    </form>
</section>






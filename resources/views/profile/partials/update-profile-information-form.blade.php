<section class="p-6 bg-pink-50 rounded-lg w-full border border-pink-200 shadow-md">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-pink-800">{{ __('Informasi Profil') }}</h2>
        <p class="text-sm text-pink-700">{{ __("Perbarui nama, email, dan foto profil akunmu.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-pink-800">{{ __('Nama') }}</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="mt-1 block w-full rounded-md bg-white text-pink-900 border border-pink-300 focus:border-pink-400 focus:ring focus:ring-pink-300 focus:ring-opacity-50 @error('name') border-red-500 @enderror"
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-pink-800">{{ __('Email') }}</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="mt-1 block w-full rounded-md bg-white text-pink-900 border border-pink-300 focus:border-pink-400 focus:ring focus:ring-pink-300 focus:ring-opacity-50 @error('email') border-red-500 @enderror"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-yellow-600 text-sm">
                    {{ __('Email kamu belum terverifikasi.') }}
                    <button form="send-verification" class="underline text-pink-600 hover:text-pink-400 ml-1">
                        {{ __('Kirim ulang email verifikasi.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-green-600 mt-1">
                            {{ __('Link verifikasi baru telah dikirim ke email kamu.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Foto Profil --}}
        <div>
            <label for="photo" class="block text-sm font-medium text-pink-800">{{ __('Foto Profil') }}</label>
            <input
                type="file"
                id="photo"
                name="photo"
                accept="image/*"
                class="mt-1 block w-full text-pink-900 bg-white border border-pink-300 rounded-md file:bg-pink-400 file:text-white file:px-4 file:py-2 file:rounded file:cursor-pointer"
            >
            @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

            @if ($user->photo)
                <div class="mt-4 flex flex-col items-start gap-2">
                    <img id="preview-photo" src="{{ asset("storage/{$user->photo}") }}"
                         alt="Profile Photo" class="rounded-md max-h-36 border border-pink-300 shadow">
                    <button type="button" id="btn-delete-photo"
                            class="text-sm text-red-500 hover:text-red-700 underline">
                        {{ __('Hapus Foto Profil') }}
                    </button>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-4 py-2 rounded shadow transition">
                {{ __('Simpan Perubahan') }}
            </button>
        </div>
    </form>
</section>

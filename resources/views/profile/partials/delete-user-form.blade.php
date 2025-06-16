<section class="p-6 bg-red-50 rounded-lg w-full shadow-md border border-red-200">
    <header class="mb-4">
        <h2 class="text-xl font-semibold text-red-800">
            {{ __('Hapus Akun') }}
        </h2>
        <p class="text-sm text-red-700">
            {{ __('Setelah akun kamu dihapus, semua data akan hilang secara permanen. Silakan unduh data yang ingin disimpan terlebih dahulu.') }}
        </p>
    </header>

    <!-- Trigger Button -->
    <div x-data="{ showModal: false }">
        <button
            @click="showModal = true"
            class="bg-red-300 hover:bg-red-400 text-red-900 font-semibold px-4 py-2 rounded shadow transition"
        >
            {{ __('Hapus Akun') }}
        </button>

        <!-- Modal -->
        <div
            x-show="showModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
            style="display: none;"
        >
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.away="showModal = false">
                <h3 class="text-lg font-semibold text-red-800 mb-2">
                    {{ __('Yakin ingin menghapus akun?') }}
                </h3>
                <p class="text-sm text-red-700 mb-4">
                    {{ __('Setelah akun dihapus, semua data akan hilang permanen. Masukkan password untuk konfirmasi.') }}
                </p>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="mb-4">
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="{{ __('Password') }}"
                            required
                            class="w-full border border-red-300 rounded px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring focus:ring-red-300 @error('password', 'userDeletion') border-red-500 @enderror"
                        >
                        @error('password', 'userDeletion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showModal = false" class="text-red-500 hover:text-red-700 text-sm font-medium">
                            {{ __('Batal') }}
                        </button>
                        <button type="submit" class="bg-red-400 hover:bg-red-500 text-white text-sm font-semibold px-4 py-2 rounded">
                            {{ __('Hapus Akun') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

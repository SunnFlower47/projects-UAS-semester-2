<section class="p-6 bg-gray-900 rounded-lg max-w-xl ml-10">

    <header class="mb-4">
        <h2 class="text-xl font-semibold text-white">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-sm text-gray-300">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Trigger Button -->
    <div x-data="{ showModal: false }">
        <button
            @click="showModal = true"
            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded shadow transition"
        >
            {{ __('Delete Account') }}
        </button>

        <!-- Modal -->
        <div
            x-show="showModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            style="display: none;"
        >
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.away="showModal = false">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    {{ __('Are you sure you want to delete your account?') }}
                </h3>
                <p class="text-sm text-gray-700 mb-4">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
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
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring focus:ring-red-300 @error('password', 'userDeletion') border-red-500 @enderror"
                        >
                        @error('password', 'userDeletion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showModal = false" class="text-gray-600 hover:text-gray-800 text-sm font-medium">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

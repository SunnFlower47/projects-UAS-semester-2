<nav class="sticky top-0 z-50 bg-black/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <span class="text-2xl font-bold">
                    <a
                        href="{{ route('perpustakaan.index') }}"
                        class="no-underline hover:no-underline">
                        <span class="text-cyan-400">Sun</span>
                        <span class="text-yellow-200">Library</span>
                    </a>
                </span>
            </div>

            <!-- Mobile Nav (kanan, hanya tampil di mobile) -->
            <div class="flex items-center space-x-3 md:hidden">
                <!-- Mobile Search -->
                <button id="mobileSearchBtn" class="text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 10.65a6 6 0 11-12 0 6 6 0 0112 0z"/>
                    </svg>
                </button>
                <!-- Mobile Profile Button -->
                <button id="mobileProfileBtn" class="focus:outline-none">
                    @php $user = Auth::user(); $isLoggedIn = $user !== null; $hasPhoto = $isLoggedIn
                    && $user->photo && file_exists(public_path('storage/' . $user->photo));
                    $avatarUrl = $hasPhoto ? asset('storage/' . $user->photo) :
                    'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Guest') .
                    '&background=random'; $userName = $isLoggedIn ? $user->name : 'Guest'; $userRole
                    = $isLoggedIn ? ($user->role ?? 'Member') : 'Visitor'; @endphp

                    <div class="flex items-center px-4 py-3  space-x-3">
                        <img
                            src="{{ $avatarUrl }}"
                            alt="{{ $userName }}"
                            class="w-10 h-10 rounded-full object-cover border border-gray-300"></div>

                    </button>
                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="text-white text-2xl z-50">☰</button>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6 text-sm font-medium relative">
                    <a
                        href="{{ route('perpustakaan.index') }}"
                        class="hover:text-cyan-400 transition-colors">Beranda</a>
                    <a href="all.html" class="hover:text-cyan-400 transition-colors">Daftar Buku</a>

                    <div class="relative">
                        <button
                            id="kategoriBtn"
                            class="hover:text-cyan-400 focus:outline-none flex items-center gap-1 transition-colors">
                            Kategori
                            <svg
                                class="w-4 h-4 transition-transform duration-300"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div
                            id="kategoriDropdown"
                            class="hidden absolute left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg z-50">
                            <a href="#" class="block px-4 py-2 hover:bg-gray-700 text-sm">Novel</a>
                            <!-- belum diisi -->
                            <a href="#" class="block px-4 py-2 hover:bg-gray-700 text-sm">Sejarah</a>
                            <!-- belum diisi -->
                        </div>
                    </div>

                    <div class="relative">
                        <button
                            id="peminjamanBtn"
                            class="hover:text-cyan-400 focus:outline-none flex items-center gap-1 transition-colors">
                            Peminjaman
                            <svg
                                class="w-4 h-4 transition-transform duration-300"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div
                            id="peminjamanDropdown"
                            class="hidden absolute left-0 mt-2 w-48 bg-gray-800 text-white rounded-lg shadow-lg z-50">
                            <a href="src/peminjaman.html" class="block px-4 py-2 hover:bg-gray-700 text-sm">Histori Peminjaman</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-700 text-sm">Pengembalian Buku</a>
                            <!-- belum diisi -->
                        </div>
                    </div>

                    <a href="#" class="hover:text-cyan-400 transition-colors">Tentang Kami</a>
                    <!-- belum diisi -->
                    <a href="#" class="hover:text-cyan-400 transition-colors">Contact Us</a>
                    <!-- belum diisi -->
                </div>

                <!-- Desktop Profile -->
                <div class="hidden md:flex items-center gap-4">
                    <form action="{{ route('books.search') }}" method="GET" class="relative">
                        <input
                            type="text"
                            name="search"
                            placeholder="Cari buku..."
                            class="w-48 px-4 py-2 rounded-full bg-gray-800 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-400 pr-10">
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-4.35-4.35M16.65 10.65a6 6 0 11-12 0 6 6 0 0112 0z"/>
                                </svg>
                            </button>
                        </form>

                        <div class="relative">
                            <button
                                id="profileButton"
                                class="flex items-center space-x-2 focus:outline-none">
                                @php $user = Auth::user(); $isLoggedIn = $user !== null; $hasPhoto = $isLoggedIn
                                && $user->photo && file_exists(public_path('storage/' . $user->photo));
                                $avatarUrl = $hasPhoto ? asset('storage/' . $user->photo) :
                                'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Guest') .
                                '&background=random'; $userName = $isLoggedIn ? $user->name : 'Guest'; $userRole
                                = $isLoggedIn ? ($user->role ?? 'Member') : 'Visitor'; @endphp
                                <div class="flex items-center px-4 py-3  space-x-3">
                                    <img
                                        src="{{ $user ? $avatarUrl : 'https://ui-avatars.com/api/?name=Guest&background=random' }}"
                                        alt="{{ $user->name ?? 'Guest' }}"
                                        class="w-10 h-10 rounded-full object-cover border border-gray-300"></div>

                                </button>

                                <div
                                    id="profileDropdown"
                                    class="hidden absolute right-0 top-12 bg-white text-black rounded-md shadow-lg w-48 z-50">
                                    <div class="px-4 py-3 ">
                                        @if ($user)
                                        <p class="font-semibold">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->role ?? 'Member' }}</p>
                                        @else
                                        <p class="font-semibold">Guest</p>
                                        <p class="text-xs text-gray-500">Visitor</p>
                                        @endif
                                    </div>
                                    <div class="py-1">
                                        <a
                                            href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 text-sm">Profile</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm text-red-600 font-medium">
                                                Sign out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Search -->
                    <div id="mobileSearchForm" class="hidden px-4 mt-4">
                        <form action="{{ route('books.search') }}" method="GET" class="relative">
                            <input
                                type="text"
                                name="search"
                                placeholder="Cari buku..."
                                class="w-full px-4 py-2 rounded-full bg-gray-800 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-400 pr-10">
                                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <svg
                                        class="w-5 h-5 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-4.35-4.35M16.65 10.65a6 6 0 11-12 0 6 6 0 0112 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Mobile Menu -->
                        <div
                            id="mobileMenu"
                            class="hidden md:hidden fixed top-0 left-0 w-full h-screen bg-gray-900 px-4 pt-20 space-y-2 text-white z-40">
                            <div id="mobileMenuContent">
                                <a href="src/content.html" class="block py-2 text-lg">Beranda</a>
                                <a href="#" class="block py-2 text-lg">Daftar Buku</a>
                                <!-- belum diisi -->
                                <a href="#" class="block py-2 text-lg">Kategori</a>
                                <!-- belum diisi -->
                                <a href="#" class="block py-2 text-lg">Tentang Kami</a>
                                <!-- belum diisi -->
                                <a href="#" class="block py-2 text-lg">Histori Peminjaman</a>
                                <!-- belum diisi -->
                                <a href="#" class="block py-2 text-lg">Pengembalian Buku</a>
                                <!-- belum diisi -->
                            </div>
                        </div>

                        <!-- Mobile Profile Dropdown -->
                        <div
                            id="mobileProfileDropdown"
                            class="hidden md:hidden absolute top-16 right-4 w-64 bg-white text-black rounded-md shadow-lg z-50">
                            <div class="bg-white rounded-lg overflow-hidden">
                                <div class="flex items-center px-4 py-3  space-x-3">
                                    @php $mobileUser = Auth::user(); $mobileHasPhoto = $mobileUser &&
                                    $mobileUser->photo && file_exists(public_path('storage/' . $mobileUser->photo));
                                    $mobileAvatarUrl = $mobileHasPhoto ? asset('storage/' . $mobileUser->photo) :
                                    asset('images/default-avatar.png');
                                    @endphp
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $mobileUser && isset($mobileUser->name) ? $mobileUser->name : 'Guest' }}</p>
                                            <p class="text-xs text-gray-500">{{ $mobileUser && isset($mobileUser->role) ? $mobileUser->role : 'Member' }}</p>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <a
                                            href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">Profile</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 font-medium hover:bg-gray-100 transition">
                                                Sign out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggle = (btnId, dropdownId) => {
        const btn = document.getElementById(btnId);
        const dropdown = document.getElementById(dropdownId);
        if (btn && dropdown) {
            btn.addEventListener("click", function (e) {
                e.stopPropagation();
                dropdown
                    .classList
                    .toggle("hidden");
            });
        }
    };

    toggle("kategoriBtn", "kategoriDropdown");
    toggle("peminjamanBtn", "peminjamanDropdown");
    toggle("profileButton", "profileDropdown");
    toggle("mobileProfileBtn", "mobileProfileDropdown");
    toggle("mobileSearchBtn", "mobileSearchForm");

    document
        .getElementById("mobileMenuBtn")
        .addEventListener("click", () => {
            document
                .getElementById("mobileMenu")
                .classList
                .toggle("hidden");
        });
});
</script>

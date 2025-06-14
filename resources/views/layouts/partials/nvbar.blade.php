<nav class="sticky top-0 z-50 bg-pink-100/70 backdrop-blur-md shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
        <span class="text-2xl font-bold text-purple-600 hover:text-purple-400 transition-colors">
            <a href="{{ route('perpustakaan.index') }}" class="no-underline hover:no-underline">
                <p class="logo">ReadZone</p>
            </a>
        </span>
    </div>

            <!-- Mobile Nav (kanan, hanya tampil di mobile) -->
           <div class="flex items-center space-x-3 md:hidden">
        <!-- Mobile Search -->
        <button id="mobileSearchBtn" class="text-purple-600 hover:text-purple-400 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-4.35-4.35M16.65 10.65a6 6 0 11-12 0 6 6 0 0112 0z"/>
            </svg>
        </button>

        <!-- Mobile Profile Button -->
        @php
        $user = Auth::user();
        $isLoggedIn = $user !== null;
        $hasPhoto = $isLoggedIn && $user->photo && file_exists(public_path("storage/{$user->photo}"));
        $avatarUrl = $hasPhoto ? asset("storage/{$user->photo}") : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Guest') . '&background=random';
        $userName = $user->name ?? 'Guest';
        $userRole = $user->role ?? 'Visitor';
        @endphp

        <button id="mobileProfileBtn" class="focus:outline-none" type="button">
            <div class="flex items-center px-2 py-2 space-x-2">
                <img
                    src="{{ $avatarUrl }}"
                    alt="{{ $userName }}"
                    class="w-10 h-10 rounded-full object-cover border-2 border-purple-300 shadow-md hover:shadow-lg transition"/>
            </div>
        </button>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" class="text-purple-600 hover:text-purple-400 text-2xl z-50 transition">☰</button>
    </div>


<!-- Desktop Menu -->
<div class="hidden md:flex items-center space-x-6 text-sm font-medium relative text-purple-600">
    <a href="{{ route('perpustakaan.index') }}" class="hover:text-purple-400 transition-colors">Beranda</a>
    <a href="{{ route('perpustakaan.books.daftar_buku') }}" class="hover:text-purple-400 transition-colors">Daftar Buku</a>

    <!-- Kategori Dropdown -->
    <div class="relative">
        <button id="kategoriBtn" class="hover:text-purple-400 focus:outline-none flex items-center gap-1 transition-colors">
            Kategori
            <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="kategoriDropdown"
            class="hidden absolute left-0 mt-2 w-40 bg-purple-100 text-purple-800 rounded-lg shadow-md z-50 ring-1 ring-purple-200">
            @foreach($kategoris as $kategori)
            <a
                href="{{ route('kategori.filter', ['nama' => $kategori->nama]) }}"
                class="block px-4 py-2 text-indigo-800 hover:bg-pink-100"
            >
                {{ $kategori->nama }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Peminjaman Dropdown -->
    <div class="relative">
        <button id="peminjamanBtn" class="hover:text-purple-400 focus:outline-none flex items-center gap-1 transition-colors">
            Peminjaman
            <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="peminjamanDropdown"
             class="hidden absolute left-0 mt-2 w-48 bg-purple-100 text-purple-800 rounded-lg shadow-md z-50 ring-1 ring-purple-200">
            <a href="{{ route('perpustakaan.pinjaman.histori-pinjaman') }}"
               class="block px-4 py-2 hover:bg-purple-200 text-sm">Histori Peminjaman</a>
            <a href="#" class="block px-4 py-2 hover:bg-purple-200 text-sm">Pengembalian Buku</a>
        </div>
    </div>

    <a href="#" class="hover:text-purple-400 transition-colors">Tentang Kami</a>
    <a href="#" class="hover:text-purple-400 transition-colors">Contact Us</a>
</div>



            <!-- Desktop Profile -->
            <div class="hidden md:flex items-center gap-4">
                <!-- Desktop Search -->
<form action="{{ route('books.search') }}" method="GET" class="hidden md:flex items-center ml-6 relative">
    <input
        type="text"
        name="search"
        placeholder="Cari buku..."
        class="w-56 px-4 py-2 rounded-full bg-purple-100 text-sm placeholder-purple-400 text-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-300 pr-10 shadow-inner transition">
    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
        <svg
            class="w-5 h-5 text-purple-500"
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
    @php
    $user = Auth::user();
    $isLoggedIn = $user !== null;
    $hasPhoto = $isLoggedIn && $user->photo && file_exists(public_path('storage/' . $user->photo));
    $avatarUrl = $hasPhoto ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Guest') . '&background=random';
    $userName = $isLoggedIn ? $user->name : 'Guest';
    $userRole = $isLoggedIn ? ($user->role ?? 'Member') : 'Visitor';
    @endphp

    <button
        id="profileButton"
        class="flex items-center space-x-2 focus:outline-none"
        type="button">
        <div class="flex items-center px-4 py-3 space-x-3">
            <img
                src="{{ $avatarUrl }}"
                alt="{{ $userName }}"
                class="w-10 h-10 rounded-full object-cover border border-purple-300"/>
        </div>
    </button>

    <div
        id="profileDropdown"
        class="hidden absolute right-0 top-12 bg-purple-100 text-purple-800 rounded-md shadow-lg w-48 z-50">

        <div class="px-4 py-3 bg-purple-200 rounded-t-md">
            @if ($user)
            <p class="font-semibold text-purple-900">{{ $user->name }}</p>
            <p class="text-xs text-purple-600">{{ $user->role ?? 'Member' }}</p>
            @else
            <p class="font-semibold text-purple-900">Guest</p>
            <p class="text-xs text-purple-600">Visitor</p>
            @endif
        </div>

        <div class="py-1">
            <a
                href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-sm text-purple-700 hover:bg-purple-200 transition">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-red-600 font-medium hover:bg-purple-100 transition">
                    Sign out
                </button>
            </form>
        </div>
    </div>
</div>
</div>

            <!-- Mobile Search Form -->

            <!-- Mobile Menu -->
           <div
            id="mobileMenu"
            class="hidden md:hidden fixed top-0 left-0 w-full h-screen bg-pink-100 px-4 pt-20 space-y-2 text-indigo-800 z-40">

            <div id="mobileMenuContent">
                <a href="src/content.html" class="block py-2 text-lg hover:text-pink-600">Beranda</a>
                <a href="#" class="block py-2 text-lg hover:text-pink-600">Daftar Buku</a>
                <div id="dropdownWrapper" class="relative">
            <button id="dropdownToggle" class="w-full text-left py-2 text-lg hover:text-pink-600 flex justify-between items-center">
                Kategori
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

        <div id="dropdownMenu" class="absolute left-0 mt-1 w-44 rounded-xl bg-white border border-pink-200 shadow-md z-50 transition-all duration-300 ease-in-out transform opacity-0 invisible scale-95">
            @foreach($kategoris as $kategori)
            <a
                href="{{ route('kategori.filter', ['nama' => $kategori->nama]) }}"
                class="block px-4 py-2 text-indigo-800 hover:bg-pink-100"
            >
                {{ $kategori->nama }}
            </a>
            @endforeach
        </div>
            </div>
                <a href="#" class="block py-2 text-lg hover:text-pink-600">Tentang Kami</a>
                <a href="{{ route('perpustakaan.pinjaman.histori-pinjaman') }}" class="block py-2 text-lg hover:text-pink-600">Histori Peminjaman</a>
                <a href="#" class="block py-2 text-lg hover:text-pink-600">Pengembalian Buku</a>
            </div>
        </div>


            <!-- Mobile Profile Dropdown -->
           <div
    id="mobileProfileDropdown"
    class="hidden md:hidden absolute top-16 right-4 w-64 bg-purple-100 text-purple-800 rounded-md shadow-lg z-50">
    <div class="rounded-lg overflow-hidden">
        <div class="flex items-center px-4 py-3 space-x-3 bg-purple-200">
            @php
            $mobileUser = Auth::user();
            $mobileHasPhoto = $mobileUser && $mobileUser->photo;
            $mobileAvatarUrl = $mobileHasPhoto ? asset("storage/{$mobileUser->photo}") : asset('images/default-avatar.png');
            @endphp
            <img src="{{ $mobileAvatarUrl }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover">
            <div>
                <p class="font-semibold text-purple-900">{{ $mobileUser && isset($mobileUser->name) ? $mobileUser->name : 'Guest' }}</p>
                <p class="text-xs text-purple-600">{{ $mobileUser && isset($mobileUser->role) ? $mobileUser->role : 'Member' }}</p>
            </div>
        </div>
        <div class="py-1">
            <a
                href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-sm text-purple-700 hover:bg-purple-200 transition">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-red-600 font-medium hover:bg-purple-100 transition">
                    Sign out
                </button>
            </form>
        </div>
    </div>
</div>

    </nav>
    <div id="mobileSearchForm" class="hidden px-4 mt-3 animate__animated animate__fadeInDown">
    <form action="{{ route('books.search') }}" method="GET" class="relative bg-purple-100 p-3 rounded-xl shadow-md">
        <input
            type="text"
            name="search"
            placeholder="Cari buku..."
            class="w-full px-4 py-2 rounded-full bg-purple-50 text-sm placeholder-purple-400 text-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-300 pr-10 shadow-inner transition">
        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2">
            <svg
                class="w-5 h-5 text-purple-500"
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggle = (btnId, dropdownId, others = []) => {
        const btn = document.getElementById(btnId);
        const dropdown = document.getElementById(dropdownId);

        if (btn && dropdown) {
            btn.addEventListener("click", function (e) {
                e.stopPropagation();

                // Sembunyikan dropdown lainnya
                others.forEach(otherId => {
                    const otherEl = document.getElementById(otherId);
                    if (otherEl && !otherEl.classList.contains("hidden")) {
                        otherEl.classList.add("hidden");
                    }
                });

                dropdown.classList.toggle("hidden");
            });
        }
    };

    // === DESKTOP DROPDOWN ===
    toggle("kategoriBtn", "kategoriDropdown", ["peminjamanDropdown", "profileDropdown"]);
    toggle("peminjamanBtn", "peminjamanDropdown", ["kategoriDropdown", "profileDropdown"]);
    toggle("profileButton", "profileDropdown", ["kategoriDropdown", "peminjamanDropdown"]);

    // === MOBILE DROPDOWN ===
    toggle("mobileProfileBtn", "mobileProfileDropdown", ["mobileSearchForm", "mobileMenu"]);
    toggle("mobileSearchBtn", "mobileSearchForm", ["mobileProfileDropdown", "mobileMenu"]);

    // === MOBILE MENU TOGGLE ===
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener("click", function (e) {
            e.stopPropagation();

            // Tutup yang lain
            ["mobileProfileDropdown", "mobileSearchForm"].forEach(id => {
                const el = document.getElementById(id);
                if (el && !el.classList.contains("hidden")) {
                    el.classList.add("hidden");
                }
            });

            // Toggle menu + ubah icon
            mobileMenu.classList.toggle("hidden");
            mobileMenuBtn.innerHTML = mobileMenu.classList.contains("hidden") ? "☰" : "✕";
        });
    }

    // === TUTUP SEMUA DROPDOWN SAAT KLIK DI LUAR ===
    document.addEventListener("click", function () {
        const dropdowns = [
            "kategoriDropdown",
            "peminjamanDropdown",
            "profileDropdown",
            "mobileProfileDropdown",
            "mobileSearchForm",
            "mobileMenu"
        ];

        dropdowns.forEach(id => {
            const el = document.getElementById(id);
            if (el && !el.classList.contains("hidden")) {
                el.classList.add("hidden");
            }
        });
    });

    // === CEGAH PENUTUPAN DROPDOWN SAAT KLIK DI DALAM ===
    [
        "kategoriDropdown",
        "peminjamanDropdown",
        "profileDropdown",
        "mobileProfileDropdown",
        "mobileSearchForm",
        "mobileMenu"
    ].forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener("click", function (e) {
                e.stopPropagation();
            });
        }
    });
});

const toggleBtn = document.getElementById('dropdownToggle');
  const menu = document.getElementById('dropdownMenu');

  toggleBtn.addEventListener('click', function (e) {
    e.stopPropagation(); // cegah bubbling klik ke document
    menu.classList.toggle('opacity-0');
    menu.classList.toggle('invisible');
    menu.classList.toggle('scale-95');
  });

  document.addEventListener('click', function (e) {
    // Tutup hanya kalau menu sedang terbuka
    if (!menu.classList.contains('invisible')) {
      menu.classList.add('opacity-0', 'invisible', 'scale-95');
    }
  });
</script>


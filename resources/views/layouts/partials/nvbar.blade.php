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
            <div class="flex items-center space-x-3 lg:hidden">
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

                <div class="relative">
                    <button id="mobileProfileBtn" class="focus:outline-none" type="button">
                        <div class="flex items-center px-2 py-2 space-x-2">
                            <img
                                src="{{ $avatarUrl }}"
                                alt="{{ $userName }}"
                                class="w-10 h-10 rounded-full object-cover border-2 border-purple-300 shadow-md hover:shadow-lg transition"/>
                        </div>
                    </button>

                    <div
                        id="mobileProfileDropdown"
                        class="hidden absolute right-0 top-12 w-64 bg-purple-100 text-purple-800 rounded-md shadow-lg z-50 border border-purple-300">
                        <div class="rounded-lg overflow-hidden">
                            <div class="flex items-center px-4 py-3 space-x-3 bg-purple-200">
                                <img src="{{ $avatarUrl }}" alt="{{ $userName }}" class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <p class="font-semibold text-purple-900">{{ $userName }}</p>
                                    <p class="text-xs text-purple-600">{{ $userRole }}</p>
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
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="text-purple-600 hover:text-purple-400 text-2xl z-50 transition">☰</button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-6 text-sm font-medium text-purple-600">
            <!-- Link Biasa -->
            <a href="{{ route('perpustakaan.index') }}" class="relative hover:text-purple-400 transition duration-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-[2px] after:bg-purple-400 hover:after:w-full after:transition-all after:duration-300">
                Beranda
            </a>

            <a href="{{ route('perpustakaan.books.daftar_buku') }}" class="relative hover:text-purple-400 transition duration-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-[2px] after:bg-purple-400 hover:after:w-full after:transition-all after:duration-300">
                Daftar Buku
            </a>

            <!-- Dropdown Kategori -->
            <div class="relative group">
                <button class="flex items-center gap-1 relative hover:text-purple-400 transition duration-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-[2px] after:bg-purple-400 group-hover:after:w-full after:transition-all after:duration-300">
                Kategori
                <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-purple-100 text-purple-800 rounded-lg shadow-md z-50 ring-1 ring-purple-200 opacity-0 scale-95 group-hover:scale-100 group-hover:opacity-100 transition-all duration-200 origin-top">
                @foreach($kategoris->take(6) as $kategori)
                    <a href="{{ route('perpustakaan.books.daftar_buku', ['kategori' => $kategori->id]) }}"
                    class="block px-4 py-2 hover:bg-purple-200 hover:text-purple-600 transition">
                    {{ $kategori->nama }}
                    </a>
                @endforeach
                <div class="border-t border-purple-300 my-1"></div>
                <a href="{{ route('perpustakaan.books.daftar_buku') }}"
                    class="block px-4 py-2 font-medium hover:bg-purple-200 hover:text-purple-600 transition">
                    + Lihat Semua
                </a>
                </div>
            </div>

            <!-- Dropdown Peminjaman -->
            <div class="relative group">
                <button class="flex items-center gap-1 relative hover:text-purple-400 transition duration-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-[2px] after:bg-purple-400 group-hover:after:w-full after:transition-all after:duration-300">
                Peminjaman
                <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-purple-100 text-purple-800 rounded-lg shadow-md z-50 ring-1 ring-purple-200 opacity-0 scale-95 group-hover:scale-100 group-hover:opacity-100 transition-all duration-200 origin-top">
                <a href="{{ route('perpustakaan.pinjaman.riwayat-pinjaman') }}"
                    class="block px-4 py-2 hover:bg-purple-200 text-sm transition">Riwayat Peminjaman</a>
                <a href="#" class="block px-4 py-2 hover:bg-purple-200 text-sm transition">Pengembalian Buku</a>
                </div>
            </div>

            <!-- Link Biasa -->
            <a href="{{ route('perpustakaan.aboutus') }}" class="relative hover:text-purple-400 transition duration-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-[2px] after:bg-purple-400 hover:after:w-full after:transition-all after:duration-300">
                About Us
            </a>

            <a href="#contactus" class="relative hover:text-purple-400 transition duration-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-[2px] after:bg-purple-400 hover:after:w-full after:transition-all after:duration-300">
                Contact Us
            </a>
            </div>


            <!-- Desktop Profile -->
            <div class="hidden lg:flex items-center gap-4">
                <!-- Desktop Search -->
                <form action="{{ route('books.search') }}" method="GET" class="hidden lg:flex items-center ml-6 relative">
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
        </div>
    </div>

    {{-- Mobile Menu --}}
<div
  id="mobileMenu"
  class="hidden lg:hidden fixed top-0 left-0 w-full h-screen bg-pink-100 px-4 pt-20 space-y-2 text-indigo-800 z-40 transition-all duration-300 ease-in-out">

  <div id="mobileMenuContent">
    <a href="{{ route('perpustakaan.index') }}" class="block py-2 text-lg hover:text-pink-600 transition">Beranda</a>
    <a href="{{ route('perpustakaan.books.daftar_buku') }}" class="block py-2 text-lg hover:text-pink-600 transition">Daftar Buku</a>

    <!-- Dropdown Kategori -->
    <div id="dropdownWrapper" class="relative">
      <button id="dropdownToggle" class="w-full text-left py-2 text-lg hover:text-pink-600 flex justify-between items-center">
        Kategori
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-pink-600 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="dropdownMenu"
           class="origin-top-left absolute left-0 mt-1 w-44 rounded-xl bg-white border border-pink-200 shadow-md z-50
                  opacity-0 scale-95 invisible transition-all duration-300 ease-in-out">
        @foreach($kategoris as $kategori)
          <a href="{{ route('perpustakaan.books.daftar_buku', ['kategori' => $kategori->id]) }}"
             class="block px-4 py-2 text-indigo-800 hover:bg-pink-100 hover:text-pink-600 transition">
            {{ $kategori->nama }}
          </a>
        @endforeach
        <div class="border-t border-purple-300 my-1"></div>
        <a href="{{ route('perpustakaan.books.daftar_buku') }}"
           class="block px-4 py-2 text-indigo-800 hover:bg-pink-100 hover:text-pink-600 transition">
          + Lihat Semua
        </a>
      </div>
    </div>

    <a href="{{ route('perpustakaan.pinjaman.riwayat-pinjaman') }}" class="block py-2 text-lg hover:text-pink-600 transition">Riwayat Peminjaman</a>
    <a href="#" class="block py-2 text-lg hover:text-pink-600 transition">Pengembalian Buku</a>
    <a href="{{ route('perpustakaan.aboutus') }}" class="block py-2 text-lg hover:text-pink-600 transition">About Us</a>
    <a href="#contactus" class="block py-2 text-lg hover:text-pink-600 transition">Contact Us</a>
  </div>
</div>


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
</nav>

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

                // Reset tombol menu jika menu mobile ditutup
                if (id === "mobileMenu") {
                    mobileMenuBtn.innerHTML = "☰";
                }
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

    // === TOGGLE DROPDOWN KATEGORI MOBILE ===
    const toggleBtn = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    if (toggleBtn && menu) {
        toggleBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('opacity-0');
            menu.classList.toggle('invisible');
            menu.classList.toggle('scale-95');
        });
    }

    // Tutup mobile menu saat link diklik
    if (mobileMenu) {
        const menuLinks = mobileMenu.querySelectorAll('a');
        if (menuLinks) {
            menuLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (!mobileMenu.classList.contains("hidden")) {
                        mobileMenu.classList.add("hidden");
                        mobileMenuBtn.innerHTML = "☰"; // reset icon jadi burger
                    }
                });
            });
        }
    }
});
</script>

<nav class="sticky top-0 z-50 bg-pink-100/70 backdrop-blur-md shadow-md">
  <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between relative">

    <!-- Logo -->
    <a href="{{ route('perpustakaan.index') }}" class="text-2xl font-bold text-purple-600 hover:text-purple-400 transition-colors">
      ReadZone
    </a>

    <!-- Desktop Menu -->
    <div class="hidden md:flex items-center gap-8 text-sm font-medium">
  <a href="{{ route('perpustakaan.index') }}"
     class="relative group text-purple-700 transition-colors duration-300">
    Beranda
    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-pink-500 transition-all duration-300 group-hover:w-full"></span>
  </a>

  <a href="{{ route('perpustakaan.aboutus') }}"
     class="relative group text-purple-700 transition-colors duration-300">
    About Us
    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-pink-500 transition-all duration-300 group-hover:w-full"></span>
  </a>

  <a href="#contactus"
     class="relative group text-purple-700 transition-colors duration-300">
    Contact Us
    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-pink-500 transition-all duration-300 group-hover:w-full"></span>
  </a>
</div>


    <!-- Desktop Auth -->
    <div class="hidden md:flex items-center gap-4">
      @guest
        <a href="{{ route('login') }}"
        class="bg-gradient-to-r from-cyan-200 to-cyan-300 hover:from-cyan-300 hover:to-cyan-400
                text-black font-semibold py-1.5 px-6 rounded-full shadow-sm transition duration-300 ease-in-out">
        Login
        </a>

        <a href="{{ route('register') }}"
        class="bg-gradient-to-r from-pink-300 to-pink-400 hover:from-pink-400 hover:to-pink-500
                text-white font-semibold py-1.5 px-6 rounded-full shadow-md transition duration-300 ease-in-out">
        Register
        </a>
      @endguest

      @auth
        @php
          $user = Auth::user();
          $hasPhoto = $user->photo && file_exists(public_path('storage/' . $user->photo));
          $avatarUrl = $hasPhoto
              ? asset('storage/' . $user->photo)
              : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random';
        @endphp

        <div class="relative">
          <button id="profileBtn" class="flex items-center space-x-2 focus:outline-none">
            <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full object-cover border border-purple-300">
          </button>

          <div id="profileDropdown" class="hidden absolute right-0 top-12 bg-purple-100 text-purple-800 rounded-md shadow-lg w-48 z-50 transition-all duration-200">
            <div class="px-4 py-3 bg-purple-200 rounded-t-md">
              <p class="font-semibold text-purple-900">{{ $user->name }}</p>
              <p class="text-xs text-purple-600">{{ $user->role ?? 'Member' }}</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-purple-200">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 font-medium hover:bg-purple-100">Sign out</button>
            </form>
          </div>
        </div>
      @endauth
    </div>

    <!-- Mobile Burger & Avatar -->
    <div class="md:hidden flex items-center gap-3 relative">
      @auth
        <button id="profileBtnMobile" class="focus:outline-none">
          <img src="{{ $avatarUrl }}" alt="avatar" class="w-9 h-9 rounded-full object-cover border border-purple-300" />
        </button>

        <div id="profileDropdownMobile" class="hidden absolute right-0 top-12 bg-purple-100 text-purple-800 rounded-md shadow-lg w-48 z-50 transition-all duration-200">
          <div class="px-4 py-3 bg-purple-200 rounded-t-md">
            <p class="font-semibold text-purple-900">{{ $user->name }}</p>
            <p class="text-xs text-purple-600">{{ $user->role ?? 'Member' }}</p>
          </div>
          <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-purple-200">Profile</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 font-medium hover:bg-purple-100">Sign out</button>
          </form>
        </div>
      @endauth

      <button id="mobileMenuBtn" class="text-2xl text-purple-600 hover:text-purple-400 focus:outline-none">☰</button>
    </div>
  </div>
@guest
  <div class="md:hidden flex items-center gap-1 absolute right-3 top-3">
    <a href="{{ route('login') }}"
      class="bg-cyan-200 hover:bg-cyan-300 text-black font-medium text-xs px-3 py-[5px] rounded-full shadow-sm transition">
      Login
    </a>
    <a href="{{ route('register') }}"
      class="bg-pink-400 hover:bg-pink-500 text-white font-medium text-xs px-3 py-[5px] rounded-full shadow-md transition">
      Register
    </a>
  </div>
@endguest
  <!-- Mobile Menu -->
 <div id="navLinks" class="hidden md:hidden bg-gradient-to-b from-pink-100 via-pink-50 to-purple-100 px-4 py-4 space-y-3 text-sm font-medium shadow-md rounded-b-xl">
  <a href="#" class="block text-purple-700 hover:text-pink-500 transition-colors">Home</a>
  <a href="{{ route('perpustakaan.aboutus') }}" class="block text-purple-700 hover:text-pink-500 transition-colors">About Us</a>
  <a href="#contactus" class="block text-purple-700 hover:text-pink-500 transition-colors">Contact Us</a>
</div>

</nav>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Desktop Dropdown
    const profileBtn = document.getElementById("profileBtn");
    const profileDropdown = document.getElementById("profileDropdown");

    if (profileBtn && profileDropdown) {
      profileBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        profileDropdown.classList.toggle("hidden");
      });
      document.addEventListener("click", () => profileDropdown.classList.add("hidden"));
      profileDropdown.addEventListener("click", e => e.stopPropagation());
    }

    // Mobile Dropdown
    const profileBtnMobile = document.getElementById("profileBtnMobile");
    const profileDropdownMobile = document.getElementById("profileDropdownMobile");

    if (profileBtnMobile && profileDropdownMobile) {
      profileBtnMobile.addEventListener("click", function (e) {
        e.stopPropagation();
        profileDropdownMobile.classList.toggle("hidden");
      });
      document.addEventListener("click", () => profileDropdownMobile.classList.add("hidden"));
      profileDropdownMobile.addEventListener("click", e => e.stopPropagation());
    }

    // Mobile Menu
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const navLinks = document.getElementById("navLinks");

    if (mobileMenuBtn && navLinks) {
      mobileMenuBtn.addEventListener("click", function () {
        navLinks.classList.toggle("hidden");
      });
    }
  });
</script>

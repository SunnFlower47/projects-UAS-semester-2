<footer class="bg-[#fdf6ff]/80 backdrop-blur-sm text-gray-700 py-10 px-6 md:px-16 shadow-inner border-t border-purple-100 mt-20">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Kolom Logo -->
    <div>
      <h2 class="text-2xl font-bold mb-3 text-purple-500">ReadZone</h2>
      <p class="text-sm text-gray-600">Membuka jendela dunia melalui buku-buku berkualitas. Membaca adalah petualangan tak terbatas.</p>
      <div class="flex space-x-3 mt-4 text-xl text-purple-300">
        <a href="#"><i class="fab fa-facebook-f hover:text-purple-500 transition"></i></a>
        <a href="#"><i class="fab fa-twitter hover:text-purple-500 transition"></i></a>
        <a href="https://www.instagram.com/ridwannnn_____/"><i class="fab fa-instagram hover:text-purple-500 transition"></i></a>
        <a href="#"><i class="fab fa-youtube hover:text-purple-500 transition"></i></a>
      </div>
    </div>

    <!-- Tautan Cepat -->
    <div>
      <h3 class="text-lg font-semibold mb-3 text-cyan-500">Tautan Cepat</h3>
      <ul class="space-y-2 text-sm text-gray-600">
        <li><a href="{{ route('perpustakaan.index') }}" class="hover:text-purple-500 transition">Beranda</a></li>
        <li><a href="{{ route('perpustakaan.aboutus') }}" class="hover:text-purple-500 transition">About Us</a></li>
        <li><a href="#contactus" class="hover:text-purple-500 transition">Contact Us</a></li>
        <li><a href="{{ route('perpustakaan.books.daftar_buku') }}" class="hover:text-purple-500 transition">Koleksi Buku</a></li>
        <li><a href="{{ route('perpustakaan.pinjaman.riwayat-pinjaman') }}" class="hover:text-purple-500 transition">Riwayat Peminjaman</a></li>
      </ul>
    </div>

    <!-- Kategori -->
    <div>
      <h3 class="text-lg font-semibold mb-3 text-cyan-500">Kategori Buku</h3>
      <ul class="space-y-2 text-sm text-gray-600">
        @foreach($kategoris->take(6) as $kategori)
        <li><a href="{{ route('perpustakaan.books.daftar_buku', ['kategori' => $kategori->id]) }}" class="hover:text-purple-500 font-medium transition">{{ $kategori->nama }}</a></li>
        @endforeach
        <li><a href="{{ route('perpustakaan.books.daftar_buku') }}" class="hover:text-purple-500 font-medium transition">+ Lihat Semua</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div  id="contactus">
      <h3 class="text-lg font-semibold mb-3 text-cyan-500">Kontak Kami</h3>
      <ul class="space-y-2 text-sm text-gray-600">
        <li><i class="fas fa-map-marker-alt mr-2 text-purple-400"></i> Purwakarta, Indonesia</li>
        <li><i class="fas fa-phone mr-2 text-purple-400"></i> +62 851-5769-8801</li>
        <li><i class="fas fa-envelope mr-2 text-purple-400"></i>sunflower.ra74@gmail.com</li>
      </ul>
    </div>
  </div>

  <div class="mt-10 pt-4 text-center text-sm text-gray-500 border-t border-purple-100">
    &copy; 2023 ReadZone. Semua Hak Dilindungi.
  </div>
</footer>

@extends('layouts.guest')

@section('title', 'About Us')

@section('content')
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<section class="py-16 bg-transparent" id="tentang-kami">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Judul Halaman -->
        <h2 class="text-4xl font-bold text-center text-[#A78BFA] mb-16">
            Tentang Kami
            <span class="block h-1 w-24 mx-auto mt-2 rounded-full bg-gradient-to-r from-blue-200 via-pink-200 to-purple-200"></span>
        </h2>

        <!-- Deskripsi Umum -->
        <div class="bg-white/50 backdrop-blur-md p-8 rounded-2xl shadow-md border border-purple-100 max-w-6xl mx-auto text-gray-700 text-sm md:text-base leading-relaxed space-y-6 text-center">
            <p>
                Website ini merupakan hasil proyek UAS kami, mahasiswa <span class="font-medium text-[#A78BFA]">Teknik Informatika STT Wastukancana</span>, yang bertujuan untuk menciptakan sebuah sistem informasi perpustakaan modern berbasis web.
            </p>
            <p>
                Aplikasi ini dirancang untuk memudahkan mahasiswa dan pengguna lainnya dalam mencari, memesan, dan memantau ketersediaan buku di perpustakaan. Dengan tampilan yang user-friendly dan fitur-fitur yang efisien, pengguna dapat melakukan <span class="text-pink-500 font-medium">booking buku secara online</span> dan mengambilnya langsung di perpustakaan fisik dengan menunjukkan bukti peminjaman digital.
            </p>
            <p>
                Sistem ini juga mencakup pengelolaan data <span class="text-blue-500 font-medium">rak buku, stok ketersediaan, kategori, hingga penulis</span>. Kami percaya bahwa akses informasi yang cepat dan mudah akan mendukung literasi kampus serta memberikan pengalaman digital yang lebih baik.
            </p>
            <p>
                Kami bangga bisa mengembangkan proyek ini secara kolaboratif dalam tim, sekaligus menerapkan berbagai ilmu yang kami pelajari selama kuliah — mulai dari <span class="text-purple-500 font-medium">desain antarmuka, basis data, sampai implementasi backend dan frontend</span> berbasis Laravel dan Tailwind CSS.
            </p>
            <div class="pt-6 border-t border-purple-200">
                <p class="text-sm text-soft-purple italic">
                    “Membaca bukan hanya sekadar kegiatan, tapi cara membuka dunia — dan kami ingin membuatnya lebih mudah diakses untuk semua.”
                </p>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="max-w-6xl mx-auto mt-10 space-y-10">

            <!-- Visi -->
            <section class="bg-purple-100 rounded-2xl p-6 md:p-8 shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-purple-800 text-center">Visi Kami</h2>
                <p class="text-base leading-relaxed text-gray-700 text-center">
                    Kami memiliki visi untuk menjadi pelopor dalam transformasi digital perpustakaan kampus. Sistem ini diharapkan mampu menjadi jembatan antara kebutuhan informasi dan akses yang mudah bagi seluruh civitas akademika.
                </p>
                <p class="text-base leading-relaxed text-gray-700 text-center mt-4">
                    Dengan pendekatan yang inovatif dan berorientasi pada kenyamanan pengguna, kami yakin visi ini akan mendorong tumbuhnya budaya literasi yang relevan dengan zaman — cepat, ringkas, dan adaptif terhadap kebutuhan generasi digital.
                </p>
            </section>

            <!-- Misi -->
            <section class="bg-pink-100 rounded-2xl p-6 md:p-8 shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-pink-800 text-center">Misi Kami</h2>
                <ul class="list-disc list-inside text-base space-y-3 text-gray-700">
                    <li>Mengembangkan platform perpustakaan digital yang intuitif, mudah digunakan, dan responsif di berbagai perangkat.</li>
                    <li>Mengelola data koleksi buku, penulis, kategori, serta lokasi rak dengan sistem yang terstruktur dan efisien.</li>
                    <li>Memfasilitasi proses peminjaman buku secara online dengan integrasi fitur bukti peminjaman berbasis digital.</li>
                    <li>Memberikan dashboard administrasi bagi pustakawan untuk monitoring stok, aktivitas pengguna, serta laporan peminjaman.</li>
                    <li>Menjadi media pembelajaran nyata bagi mahasiswa teknik informatika dalam mengimplementasikan ilmu pemrograman, desain UI/UX, dan manajemen proyek secara langsung.</li>
                    <li>Mendukung budaya akademik kampus yang inklusif dan berbasis teknologi informasi.</li>
                </ul>
            </section>

        </div>
    </div>
</section>
@endsection

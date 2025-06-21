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
                Sistem informasi perpustakaan ini dirancang sebagai platform digital modern yang mempermudah proses pencarian, peminjaman, dan pengelolaan koleksi buku secara efisien.
            </p>
            <p>
                Dengan antarmuka yang ramah pengguna dan fitur-fitur praktis, pengunjung dapat melakukan <span class="text-pink-500 font-medium">booking buku secara online</span> dan memantau ketersediaannya secara real-time.
            </p>
            <p>
                Fitur pengelolaan data seperti <span class="text-blue-500 font-medium">kategori buku, penulis, rak penyimpanan, dan stok</span> disusun agar mendukung efisiensi kerja pustakawan dan meningkatkan pengalaman pengguna.
            </p>
            <p>
                Platform ini juga dikembangkan dengan pendekatan modern menggunakan <span class="text-purple-500 font-medium">Laravel dan Tailwind CSS</span> untuk memberikan performa dan tampilan yang optimal di berbagai perangkat.
            </p>
            <div class="pt-6 border-t border-purple-200">
                <p class="text-sm text-soft-purple italic">
                    “Membaca bukan sekadar hobi, tapi perjalanan menuju cakrawala pengetahuan yang lebih luas — dan akses digital adalah jembatanya.”
                </p>
            </div>
        </div>


<!-- Visi & Misi -->
<div class="max-w-6xl mx-auto mt-10 space-y-10">

    <!-- Visi -->
    <section class="bg-purple-100 rounded-2xl p-6 md:p-8 shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-purple-800 text-center">Visi</h2>
        <p class="text-base leading-relaxed text-gray-700 text-center">
            Mewujudkan platform perpustakaan digital yang modern, mudah diakses, dan mampu memberikan pengalaman peminjaman buku yang efisien dan menyenangkan bagi pengguna.
        </p>
    </section>

    <!-- Misi -->
    <section class="bg-pink-100 rounded-2xl p-6 md:p-8 shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-pink-800 text-center">Misi</h2>
        <ul class="list-disc list-inside text-base space-y-3 text-gray-700">
            <li>Menghadirkan antarmuka yang ramah pengguna dan responsif di berbagai perangkat.</li>
            <li>Mengelola data buku, kategori, rak, dan penulis secara efisien dan terstruktur.</li>
            <li>Menyediakan sistem peminjaman buku secara online yang mudah digunakan.</li>
            <li>Memberikan fitur administrasi untuk memantau stok buku, aktivitas peminjaman dan pengelolaan buku.</li>
            <li>Mendukung transformasi digital dalam pengelolaan koleksi perpustakaan.</li>
        </ul>
    </section>

</div>

    </div>
</section>
@endsection

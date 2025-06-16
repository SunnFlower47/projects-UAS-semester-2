// postcss.config.js
module.exports = {
  plugins: [
    require('autoprefixer')(), // pakai require biar aman di semua environment
    // Tambahkan plugin lain di sini, misalnya:
    require('tailwindcss')(),
    process.env.NODE_ENV === 'production' ? require('cssnano')() : null
  ].filter(Boolean), // Buat hapus nilai null saat tidak production
};

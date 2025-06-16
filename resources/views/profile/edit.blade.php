@extends('layouts.perpus')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-10">
    <h2 class="text-3xl font-bold text-pink-500">Profil Kamu</h2>

    {{-- Profile Information Card --}}
    <div class="bg-pink-50 rounded-lg shadow-md border border-pink-200">
        <div class="bg-pink-200 px-6 py-4 rounded-t-lg">
            <h5 class="text-pink-900 text-lg font-semibold">Update Informasi Profil</h5>
            <p class="text-sm text-pink-800">Perbarui informasi akun dan email kamu.</p>
        </div>
        <div class="p-6 bg-white rounded-b-lg">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- Password Update Card --}}
    <div class="bg-purple-50 rounded-lg shadow-md border border-teal-200">
        <div class="bg-purple-200 px-6 py-4 rounded-t-lg">
            <h5 class="text-teal-900 text-lg font-semibold">Ubah Password</h5>
            <p class="text-sm text-teal-800">Gunakan password yang kuat dan unik untuk keamanan akunmu.</p>
        </div>
        <div class="p-6 bg-white rounded-b-lg">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- Delete Account Card --}}
    <div class="bg-red-50 rounded-lg shadow-md border border-red-300">
        <div class="bg-red-200 px-6 py-4 rounded-t-lg">
            <h5 class="text-red-900 text-lg font-semibold">Hapus Akun</h5>
            <p class="text-sm text-red-800">Tindakan ini permanen dan tidak bisa dibatalkan.</p>
        </div>
        <div class="p-6 bg-white rounded-b-lg">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const deleteBtn = document.getElementById('btn-delete-photo');

    if (deleteBtn) {
        deleteBtn.addEventListener('click', () => {
            Swal.fire({
                title: 'Yakin ingin menghapus foto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('profile.photo.delete') }}';
                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    }

    @if(session('photo_deleted'))
        Swal.fire({
            title: 'Berhasil',
            text: 'Foto profil berhasil dihapus.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if(session('status') === 'profile-updated')
        Swal.fire({
            title: 'Profil Tersimpan!',
            text: 'Perubahan profil kamu sudah berhasil disimpan.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (session('status') === 'password-updated')
        Swal.fire({
            icon: 'success',
            title: 'Password Diperbarui!',
            text: 'Password kamu berhasil diubah.',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
});
</script>
@if ($errors->getBag('updatePassword')->any() && request()->is('profile'))
    @push('scripts')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal memperbarui password',
            html: `{!! implode('<br>', $errors->getBag('updatePassword')->all()) !!}`,
            showConfirmButton: true
        });
    </script>
    @endpush
@endif
@endpush

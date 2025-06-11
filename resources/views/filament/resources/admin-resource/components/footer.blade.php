<footer class="w-full px-4 py-6 border-t bg-white dark:bg-gray-900 text-center text-sm text-gray-600 dark:text-gray-400">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-between gap-2">
        <div>
            © {{ date('Y') }} <strong class="font-semibold text-gray-700 dark:text-white">SunLibrary</strong>. All rights reserved.
        </div>
        <div class="flex items-center gap-4">
            <a href="{{route('perpustakaan.index')}}" class="hover:underline text-blue-600 dark:text-blue-400" target="_blank">Main Website</a>
            <a href="mailto:support@sunlibrary.com" class="hover:underline text-blue-600 dark:text-blue-400">Support</a>
        </div>
    </div>
</footer>

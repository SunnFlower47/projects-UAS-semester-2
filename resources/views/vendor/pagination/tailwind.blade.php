@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
    @if ($paginator->onFirstPage())
        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-pink-800 bg-pink-100 border border-pink-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.previous') !!}
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-pink-900 bg-pink-100 border border-pink-300 leading-5 rounded-md hover:bg-pink-200 hover:text-pink-800 transition">
            {!! __('pagination.previous') !!}
        </a>
    @endif

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-blue-900 bg-blue-100 border border-blue-300 leading-5 rounded-md hover:bg-blue-200 hover:text-blue-800 transition">
            {!! __('pagination.next') !!}
        </a>
    @else
        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-blue-800 bg-blue-100 border border-blue-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.next') !!}
        </span>
    @endif
</div>


        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-sky-900 leading-5">
    {!! __('Menampilkan') !!}
    @if ($paginator->firstItem())
        <span class="font-semibold text-indigo-800">{{ $paginator->firstItem() }}</span>
        {!! __('sampai') !!}
        <span class="font-semibold text-indigo-800">{{ $paginator->lastItem() }}</span>
    @else
        {{ $paginator->count() }}
    @endif
    {!! __('dari total') !!}
    <span class="font-semibold text-indigo-800">{{ $paginator->total() }}</span>
    {!! __('data') !!}
</p>

            </div>

         <div>
    <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">

        {{-- Tombol Prev --}}
        @if ($paginator->onFirstPage())
            <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-indigo-400 bg-indigo-100 border border-indigo-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-indigo-800 bg-indigo-100 border border-indigo-300 rounded-l-md hover:bg-indigo-200 transition ease-in-out duration-150"
                aria-label="{{ __('pagination.previous') }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span aria-disabled="true">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-indigo-600 bg-indigo-50 border border-indigo-300 cursor-default leading-5">{{ $element }}</span>
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-bold text-white bg-indigo-500 border border-indigo-500 cursor-default leading-5">{{ $page }}</span>
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-indigo-800 bg-indigo-100 border border-indigo-300 hover:bg-indigo-200 transition"
                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-indigo-800 bg-indigo-100 border border-indigo-300 rounded-r-md hover:bg-indigo-200 transition"
                aria-label="{{ __('pagination.next') }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        @else
            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-indigo-400 bg-indigo-100 border border-indigo-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            </span>
        @endif

    </span>
</div>

        </div>
    </nav>
@endif

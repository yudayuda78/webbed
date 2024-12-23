@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-start overflow-auto md:justify-center">
        <div class="flex flex-1 justify-center">
            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span
                            class="relative inline-flex cursor-default items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500"
                            aria-hidden="true">
                            <i class="ri-arrow-left-s-line font-bold"></i>
                        </span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-500"
                        aria-label="{{ __('pagination.previous') }}">
                        <i class="ri-arrow-left-s-line font-bold"></i>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @php
                    $start = max($paginator->currentPage() - 2, 1);
                    $end = min($paginator->currentPage() + 2, $paginator->lastPage());

                    if ($end - $start < 4) {
                        if ($paginator->currentPage() <= 3) {
                            $end = min(5, $paginator->lastPage());
                        } else {
                            $start = max($paginator->lastPage() - 4, 1);
                        }
                    }
                @endphp

                @if ($start > 1)
                    <li
                        class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-700 md:px-3">
                        <a href="{{ $paginator->url(1) }}">1</a>
                    </li>
                    @if ($start > 2)
                        <li
                            class="relative -ml-px inline-flex cursor-default items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-700 md:px-3">
                            ...</li>
                    @endif
                @endif

                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                            <span
                                class="relative -ml-px inline-flex cursor-default items-center border border-ticykit-bg-blue bg-ticykit-bg-blue px-2 py-2 text-sm font-medium leading-5 text-white md:px-3">{{ $page }}</span>
                        </span>
                    @else
                        <a href="{{ $paginator->url($page) }}"
                            class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700 md:px-3"
                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endfor

                @if ($end < $paginator->lastPage())
                    @if ($end < $paginator->lastPage() - 1)
                        <li
                            class="relative -ml-px inline-flex cursor-default items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-700 md:px-3">
                            ...</li>
                    @endif
                    <li
                        class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-700 md:px-3">
                        <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-500"
                        aria-label="{{ __('pagination.next') }}">
                        <i class="ri-arrow-right-s-line font-bold"></i>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span
                            class="relative -ml-px inline-flex cursor-default items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500"
                            aria-hidden="true">
                            <i class="ri-arrow-right-s-line font-bold"></i>
                        </span>
                    </span>
                @endif
            </span>
        </div>
    </nav>
@endif

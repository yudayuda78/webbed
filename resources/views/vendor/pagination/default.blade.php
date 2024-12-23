@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation"
        class="border-secondary-200 dark:border-secondary-600 flex select-none items-center justify-between py-4">
        <div class="flex flex-col sm:flex-1 sm:items-center sm:justify-between lg:flex-row">
            <div>
                <span class="relative z-0 mt-2 inline-flex shadow-sm lg:mt-0">
                    {{-- Previous Page Link Disable --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span style="line-height: 250%;"
                                class="dark:border-secondary-600 dark:bg-secondary-700 relative inline-flex items-center rounded-l border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-400 dark:text-gray-400"
                                aria-hidden="true">
                                <i class="ri-arrow-left-s-line"></i>
                            </span>
                        </span>
                    @else
                        {{-- Previous Page Link Enable --}}
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="focus:border-primary-300 focus:ring-primary-300 dark:focus:ring-primary-500 dark:border-secondary-600 dark:bg-secondary-700 relative inline-flex items-center rounded-l border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 transition hover:text-gray-400 focus:z-10 focus:outline-none focus:ring focus:ring-opacity-30 dark:text-gray-300 dark:focus:ring-opacity-30"
                            aria-label="{{ __('pagination.previous') }}">
                            <i class="ri-arrow-left-s-line"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="dark:bg-secondary-700 dark:border-secondary-600 relative -ml-px inline-flex cursor-default items-center border border-gray-300 bg-white px-2 py-4 text-sm font-medium leading-5 text-gray-400 dark:text-gray-200">{{ $element }}
                                </span>
                            </span>
                        @endif

                        {{-- Array Of Links Disable --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="" aria-current="page">
                                        <span style="line-height: 250%;"
                                            class="dark:border-secondary-600 dark:bg-secondary-700 relative -ml-px inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-400 dark:text-gray-400">{{ $page }}
                                        </span>
                                    </span>
                                @else
                                    {{-- Array Of Links Enable --}}
                                    <a style="line-height: 250%;" href="{{ $url }}"
                                        class="focus:border-primary-300 focus:ring-primary-300 dark:focus:ring-primary-500 dark:border-secondary-600 dark:bg-secondary-700 relative -ml-px inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 transition hover:text-gray-400 focus:z-10 focus:outline-none focus:ring focus:ring-opacity-30 dark:text-gray-200 dark:hover:text-gray-300 dark:focus:ring-opacity-30"
                                        aria-label="{{ __('pagination.goto_page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link Enable --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="focus:border-primary-300 focus:ring-primary-300 dark:focus:ring-primary-500 dark:border-secondary-600 dark:bg-secondary-700 relative -ml-px inline-flex items-center rounded-r border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 transition hover:text-gray-400 focus:z-10 focus:outline-none focus:ring focus:ring-opacity-30 dark:text-gray-200 dark:focus:ring-opacity-30"
                            aria-label="{{ __('pagination.next') }}">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    @else
                        {{-- Next Page Link Disable --}}
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="dark:border-secondary-600 dark:bg-secondary-700 relative -ml-px inline-flex items-center rounded-r border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-400 dark:text-gray-400"
                                aria-hidden="true">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif

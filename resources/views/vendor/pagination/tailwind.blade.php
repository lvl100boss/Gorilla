@if ($paginator->hasPages())
    <!-- Check if there are pages to paginate -->
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <!-- Mobile view pagination controls -->
        <div class="flex justify-between flex-1 sm:hidden">
            <!-- Previous page link for mobile -->
            @if ($paginator->onFirstPage())
                <!-- When on the first page, disable the previous button -->
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-light-dark border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 ">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <!-- When not on the first page, enable the previous button -->
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-light-dark border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 ">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            <!-- Next page link for mobile -->
            @if ($paginator->hasMorePages())
                <!-- When there are more pages, enable the next button -->
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-300 bg-light-dark border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 ">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <!-- When there are no more pages, disable the next button -->
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <!-- Desktop view pagination controls -->
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <!-- Displaying the current page information -->
                <p class="text-sm text-white leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <!-- Pagination elements (page numbers and navigation) -->
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    <!-- Previous Page Link -->
                    @if ($paginator->onFirstPage())
                        <!-- When on the first page, disable the previous link -->
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-300 bg-light-dark  rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 " aria-hidden="true">
                                <!-- Previous page arrow icon -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <!-- When not on the first page, enable the previous link -->
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-300 bg-light-dark  rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 " aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    <!-- Pagination Elements (Page numbers) -->
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <!-- Display "..." for non-contiguous page numbers -->
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-300 bg-light-dark  rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 ">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <!-- Highlight the current page -->
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium font-semibold text-accent bg-medium-dark leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 ">{{ $page }}</span>
                                    </span>
                                @else
                                    <!-- Links to other pages -->
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-300 bg-light-dark  leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 " aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($paginator->hasMorePages())
                        <!-- When there are more pages, enable the next link -->
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-300 bg-light-dark  rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 " aria-label="{{ __('pagination.next') }}">
                            <!-- Next page arrow icon -->
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <!-- When there are no more pages, disable the next link -->
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-300 bg-light-dark  rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none active:bg-lightest-dark active:text-gray-500 transition ease-in-out duration-150 " aria-hidden="true">
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

@php
    $pageIndex = 1;
    $hasNextPage = $currentPage !== $totalPages;
    $hasPrevPage = $currentPage > 1;
@endphp

<ul class="inline-flex items-center -space-x-px mt-4">

    <li>
        <a @if ($hasPrevPage) href="?page={{ $currentPage - 1 }}" @endif class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 bg-gray-800 border-gray-700 text-gray-400 @if ($hasPrevPage) hover:bg-gray-700 hover:text-white @endif">
            <span class="sr-only">Previous</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </li>

    @while ($pageIndex <= $totalPages)

        <li>
            <a href="?page={{$pageIndex}}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">{{ $pageIndex }}</a>
        </li>

        @php
            $pageIndex++;
        @endphp

    @endwhile

    <li>
        <a @if ($hasNextPage) href="?page={{ $currentPage + 1 }}" @endif class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 bg-gray-800 border-gray-700 text-gray-400 @if ($hasNextPage) hover:bg-gray-700 hover:text-white @endif">
            <span class="sr-only">Next</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </li>

</ul>

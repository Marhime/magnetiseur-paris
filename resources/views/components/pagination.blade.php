@props(['items'])

<nav class="flex items-center justify-between p-4" aria-label="Table navigation">
    @if ($items->lastPage() > 1)
        <div>
            <p class="text-sm text-gray-700">
                Affichage de
                <span class="font-medium">{{ $items->firstItem() }}</span>
                à
                <span class="font-medium">{{ $items->lastItem() }}</span>
                sur
                <span class="font-medium">{{ $items->total() }}</span>
                résultats
            </p>
        </div>
    @else
        <div>
            <p class="text-sm text-gray-700">
                Affichage de
                <span class="font-semibold">{{ $items->total() }}</span>
                résultats
            </p>
        </div>
    @endif
    @if ($items->lastPage() > 1)
        <ul class="inline-flex items-center -space-x-px">
            <li>
                <a href="{{ $items->previousPageUrl() }}"
                    class="block px-3 py-2 ml-0 leading-tight
                text-gray-500 bg-white border border-gray-300 rounded-l-lg
                hover:bg-gray-100 hover:text-gray-700-700">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1
                         1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>

            {{-- first page --}}
            @if ($items->currentPage() > 3)
                <li>
                    <a href="{{ $items->url(1) }}"
                        class="px-3 py-2 leading-tight text-gray-700 border
                    border-gray-300 hover:bg-gray-100 hover:text-gray-700 bg-white">{{ 1 }}</a>
                </li>
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-700 border border-gray-300 bg-white">...</span>
                </li>
            @endif

            @foreach (range(1, $items->lastPage()) as $i)
                @if ($i >= $items->currentPage() - 2 && $i <= $items->currentPage() + 2)
                    <li>
                        <a href="{{ $items->url($i) }}"
                            class="{{ $items->currentPage() == $i ? 'bg-gray-200' : 'bg-white' }}
                        px-3 py-2 leading-tight text-gray-700 border border-gray-300 hover:bg-gray-100
                        hover:text-gray-700">{{ $i }}</a>
                    </li>
                @endif
            @endforeach

            {{-- last page --}}
            @if ($items->currentPage() < $items->lastPage() - 2)
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-700 border border-gray-300 bg-white">...</span>
                </li>
                <li>
                    <a href="{{ $items->url($items->lastPage()) }}"
                        class="px-3 py-2 leading-tight text-gray-700 border
                    border-gray-300 bg-white hover:bg-gray-100 hover:text-gray-700">
                        {{ $items->lastPage() }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ $items->nextPageUrl() }}"
                    class="block px-3 py-2 leading-tight text-gray-500 bg-white border
                border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700-700">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4
                        4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        </ul>
    @endif
</nav>

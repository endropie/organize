<div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
    <div class="flex justify-between flex-1 sm:hidden">
      <a
        @if($navigation['previous'])
        href="{{Request::url()}}?page={{$navigation['previous']}}"
        @else
        style="background-color: #ccc; cursor: auto; pointer-events: none;"
        @endif
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500">
        Previous
      </a>
      <a
        @if($navigation['next'])
        href="{{Request::url()}}?page={{$navigation['next']}}"
        @else
        style="background-color: #ccc; cursor: auto; pointer-events: none;"
        @endif
        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500">
        Next
      </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium">{{$paginator->firstItem()}}</span>
          to
          <span class="font-medium">{{ $paginator->lastItem() }}</span>
          of
          <span class="font-medium">{{ $paginator->total() }}</span>
          results
        </p>
      </div>
      <div>
        <nav class="relative z-0 inline-flex -space-x-px shadow-sm" aria-label="Pagination">
            <a
                @if($navigation['first'])
                href="{{Request::url()}}?page={{$navigation['first']}}"
                @else
                style="background-color: #ccc; cursor: auto; pointer-events: none;"
                @endif
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">

                <span class="sr-only">First</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z" clipRule="evenodd" />
                </svg>
            </a>
            <a
                @if($navigation['previous'])
                href="{{Request::url()}}?page={{$navigation['previous']}}"
                @else
                style="background-color: #ccc; cursor: auto; pointer-events: none;"
                @endif
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">

                <span class="sr-only">Previous</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>

            {{-- <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">1</a> --}}

            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300">
                {{$paginator->currentPage()}}
            </span>
            <a
                @if($navigation['next'])
                href="{{Request::url()}}?page={{$navigation['next']}}"
                @else
                style="background-color: #ccc; cursor: auto; pointer-events: none;"
                @endif
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                <span class="sr-only">Next</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            <a
                @if($navigation['last'])
                href="{{Request::url()}}?page={{$navigation['last']}}"
                @else
                style="background-color: #ccc; cursor: auto; pointer-events: none;"
                @endif
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                <span class="sr-only">Last</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clipRule="evenodd" />
                    <path fillRule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clipRule="evenodd" />
                </svg>
            </a>
        </nav>
      </div>
    </div>
</div>

@props(['label', 'sortField'])

<th class="p-3">
    <a href="{{ route(request()->route()->getName(), array_merge(request()->query(), ['sort' => $sortField, 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center">
        {{ $label }}
        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            @if(request('sort') === $sortField)
                @if(request('direction') === 'asc')
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
                @else
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                @endif
            @else
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 15l4 4 4-4m0-6-4-4-4 4"/>
            @endif
        </svg>
    </a>
</th>

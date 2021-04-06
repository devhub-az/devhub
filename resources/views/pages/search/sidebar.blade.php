<div class="flex flex-col rounded bg-white border divide-y">
    <div class="p-2">
        <a href="{{ route('search.articles', ['search' => $query]) }}"
           class="flex items-center space-x-2">
            <i class="iconify" data-icon="tabler:mist"></i>
            <p>
                {{ __('devhub.articles') }}
            </p>
        </a>
    </div>
    <div class="p-2">
        <a href="{{ route('search.authors', ['search' => $query]) }}"
           class="flex items-center space-x-2">
            <i class="iconify" data-icon="tabler:users"></i>
            <p>
                {{ __('devhub.authors') }}
            </p>
        </a>
    </div>
</div>

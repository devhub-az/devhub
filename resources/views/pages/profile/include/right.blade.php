<div class="border p-4 rounded mb-2 bg-white dark:bg-dpaper dark:border-gray-700">
    <div class="flex justify-between text-center">
        <div class="mx-auto">
            <p class="dark:text-gray-300">
                {{ \Numeric::number_format_short($author->attributes->rating) }}
            </p>
            <p class="dark:text-gray-400">
                Рейтинг
            </p>
        </div>
        <div class="mx-auto">
            <p class="dark:text-gray-300" title="{{ $author->attributes->karma }}">
                {{ \Numeric::number_format_short($author->attributes->karma) }}
            </p>
            <p class="dark:text-gray-400">
                Карма
            </p>
        </div>

    </div>

</div>
<div class="border p-4 rounded mb-2 bg-white dark:bg-dpaper dark:border-gray-700">
    <p class="font-medium mb-3 dark:text-gray-300">Подписчики</p>
    <div class="flex flex-row-reverse justify-end mr-2">
        @if (count($author->relationships->followers->data) > 0)
            @foreach($author->relationships->followers->data as $follower)
                <img
                    src="{{ $follower->attributes->avatar }}"
                    alt="User profili"
                    class="border-2 border-white rounded-full h-10 w-10 -mr-2">
            @endforeach
        @else
            <p class="dark:text-gray-400">Никто не отслеживает</p>
        @endif
    </div>
</div>

@push('scripts')

@endpush


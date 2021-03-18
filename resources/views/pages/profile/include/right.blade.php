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
    <p class="font-medium mb-3 dark:text-gray-300">
        Подписчики <span class="font-light">{{ count($author->relationships->followers->data) }}</span>
    </p>
    <div class="grid grid-cols-[repeat(auto-fill,2rem)] justify-between gap-2">
        @if (count($author->relationships->followers->data) > 0)
            @foreach($author->relationships->followers->data as $follower)
                <a href="{{ route('user_info', $follower->attributes->username) }}" title="{{ $follower->attributes->name }}">
                    <img
                        src="{{ $follower->attributes->avatar }}"
                        alt="User profili"
                        class="border dark:bg-gray-500 shadow-sm dark:border-gray-700 object-cover rounded h-8 w-8">
                </a>
            @endforeach
        @else
            <p class="dark:text-gray-400">Никто не отслеживает</p>
        @endif
    </div>
</div>

@push('scripts')

@endpush


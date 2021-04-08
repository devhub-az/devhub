<div class="sticky top-2">
    <div class="border p-4 rounded mb-2 bg-white dark:bg-dpaper dark:border-gray-700">
        <div class="flex justify-between text-center">
            <div class="mx-auto">
                <p class="dark:text-gray-300">
                    {{ \Numeric::number_format_short($author->attributes->rating) }}
                </p>
                <div class="flex items-center space-x-1">
                    <span class="iconify text-green-600 text-sm dark:text-green-500" data-icon="tabler:trending-up"
                          data-inline="false"></span>
                    <p class="dark:text-gray-400">
                        {{ __('devhub.rating') }}
                    </p>
                </div>
            </div>
            <div class="mx-auto">
                <p class="dark:text-gray-300" title="{{ $author->attributes->karma }}">
                    {{ \Numeric::number_format_short($author->attributes->karma) }}
                </p>
                <div class="flex items-center space-x-1">
                    <span class="iconify text-sm text-yellow-500 dark:text-yellow-100"
                          data-icon="tabler:bolt"
                          data-inline="false"></span>
                    <p class="dark:text-gray-400">
                        {{ __('devhub.karma') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="border p-4 rounded mb-2 bg-white dark:bg-dpaper dark:border-gray-700">
        <p class="font-medium mb-3 dark:text-gray-300">
            {{ __('devhub.followers') }}
            @if(count($author->relationships->followers->data) !== 0)
                <span class="text-black text-xs bg-gray-200 dark:bg-gray-600 rounded-lg py-0.5 px-1.5">
                    {{ count($author->relationships->followers->data) }}
                </span>
            @endif
        </p>
        @if (count($author->relationships->followers->data) > 0)
            <div class="grid grid-cols-[repeat(auto-fill,2rem)] justify-between space-x-2">
                @foreach($author->relationships->followers->data as $follower)
                    <a href="{{ route('user_info', $follower->attributes->username) }}"
                       title="{{ $follower->attributes->name }}">
                        <img
                            src="{{ $follower->attributes->avatar }}"
                            alt="User profili"
                            class="border dark:bg-gray-500 shadow-sm dark:border-gray-700 object-cover rounded h-8 w-8">
                    </a>
                @endforeach
            </div>
        @else
            <p class="dark:text-gray-400">Никто не отслеживает</p>
        @endif
    </div>
</div>
@push('scripts')

@endpush


<div class="bg-white overflow-hidden mb-2 dark:bg-dpaper border dark:border-gray-700">
    <div class="flex space-x-4 px-4">
        <a id="trans-none" href="{{ route('user_info', $author->attributes->username) }}"
           class="text-xs py-2 border-solid transition-colors duration-200 {{ Route::currentRouteName() === 'user_info' ? 'border-b-2 bottom-0 border-cerulean-100 text-cerulean-100' : 'text-gray-500 border-gray-300 hover:opacity-75 dark:text-gray-300' }}">
            <p class="text-sm xs:text-xs font-medium">
                Информация
            </p>
        </a>
        <a id="trans-none" href="{{ route('user_articles', $author->attributes->username) }}"
           class="text-xs py-2 hover:border-b-2 hover:border-cerulean-100 {{ Route::currentRouteName() === 'user_articles' ? 'border-b-2 bottom-0 border-cerulean-100 text-cerulean-100' : 'text-gray-500 dark:text-gray-300' }}">
            <p class="text-sm xs:text-xs">
                {{ \Numeric::number_format_short($author->attributes->articles_count) }}
                Публикации
            </p>
        </a>
    </div>
</div>

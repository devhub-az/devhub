<div class="bg-white overflow-hidden mb-2 dark:bg-dpaper border dark:border-gray-700">
    <div class="flex space-x-4 px-4">
        <a id="trans-none" href="{{ route('user_info', $author->attributes->username) }}"
           class="text-xs py-2 border-solid transition-colors duration-200 {{ Route::currentRouteName() === 'user_info' ? 'border-b-2 bottom-0 border-cerulean-100 text-cerulean-100' : 'text-gray-500 border-gray-300 hover:opacity-75 dark:text-gray-300' }}">
            <div class="flex items-center space-x-1 text-sm xs:text-xs font-medium">
                <span class="iconify" data-icon="feather:info" data-inline="false"></span>
                <p>Информация</p>
            </div>
        </a>
        <a id="trans-none" href="{{ route('user_articles', $author->attributes->username) }}"
           class="text-xs py-2 hover:border-b-2 hover:border-cerulean-100 {{ Route::currentRouteName() === 'user_articles' ? 'border-b-2 bottom-0 border-cerulean-100 text-cerulean-100' : 'text-gray-500 dark:text-gray-300' }}">
            <div class="flex items-center space-x-1 text-sm xs:text-xs font-medium">
                <span class="iconify" data-icon="mdi:newspaper-variant-multiple-outline"
                      data-inline="false"></span>
                <p>Публикации</p>
                <span class="text-black text-xs bg-gray-200 dark:bg-gray-600 rounded-lg py-0.5 px-1.5">
                    {{ \Numeric::number_format_short($author->attributes->articles_count) }}
                </span>
            </div>
        </a>
    </div>
</div>

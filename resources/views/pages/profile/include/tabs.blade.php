<div class="bg-white mb-4 overflow-hidden mb-2 dark:bg-dpaper border dark:border-gray-700">
    <div class="flex">
        <a href="{{ route('user_info', $author->attributes->username) }}"
           class="text-xs py-2 mx-6 border-solid transition-colors duration-200 {{ strpos(Route::currentRouteName(), 'user_info') === 0 ? 'border-b-2 bottom-0 border-cerulean-500 text-cerulean-300' : 'text-gray-500 border-gray-300 hover:opacity-75 dark:text-gray-300' }}">
            <p class="text-sm xs:text-xs">
                Məlumat
            </p>
        </a>
        <a href="{{ route('user_posts', $author->attributes->username) }}"
           class="text-xs py-2 mx-6 border-solid transition-colors duration-200 {{ strpos(Route::currentRouteName(), 'user_posts') === 0 ? 'border-b-2 bottom-0 border-blue-light text-cerulean-300' : 'text-gray-500 border-gray-300 hover:opacity-75 dark:text-gray-300' }}">
            <p class="text-sm xs:text-xs">
                {{ \Numeric::number_format_short($author->attributes->articles_count) }}
                Paylaşma
            </p>
        </a>
    </div>
</div>

{{--<nav class="page__tabs">--}}
{{--    <ul class="tab tabs_item">--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_info', $author->attributes->username) }}"--}}
{{--               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_info') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-information-outline"></i> MƏLUMAT--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_posts', $author->attributes->username) }}"--}}
{{--               class="tabs__link  {{ strpos(Route::currentRouteName(), 'user_posts') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-text-box-multiple"></i>--}}
{{--                {{ \Numeric::number_format_short($author->attributes->articles_count) }}--}}
{{--                PAYLAŞMA--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_followers', $author->attributes->username) }}"--}}
{{--               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_followers') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-account-group"></i>--}}
{{--                {{ \Numeric::number_format_short($author->attributes->user_followers_count) }}--}}
{{--                Izləyənlər--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_followings', $author->attributes->username) }}"--}}
{{--               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_followings') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-target-account"></i>--}}
{{--                {{ \Numeric::number_format_short($author->attributes->user_followings_count) }}--}}
{{--                Izlənən--}}
{{--            </a>--}}
{{--        </li>--}}
        {{--        <li class="tabs__item">--}}
        {{--            <a href="#" class="tabs__link">--}}
        {{--                <i class="mdi mdi-trophy-award"></i>--}}
        {{--                {{ \Numeric::number_format_short(3) }}--}}
        {{--                Mükafat--}}
        {{--            </a>--}}
        {{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

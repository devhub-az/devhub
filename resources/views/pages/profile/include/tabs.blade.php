<div class="bg-white mb-4 overflow-hidden mb-2 dark:bg-dpaper">
    <div class="grid grid-cols-auto-fit">
        <a href="{{ route('user_info', $user->attributes->username) }}"
           class="text-center text-xs w-full py-2 px-0 border-b-2 border-solid mx-auto transition-colors duration-200 {{ strpos(Route::currentRouteName(), 'user_info') === 0 ? 'bottom-0 border-blue-light text-blue-light' : 'text-gray-500 border-gray-300 hover:opacity-75' }}">
            <p class="text-sm xs:text-xs font-light dark:text-gray-300">
                MƏLUMAT
            </p>
        </a>
        <a href="{{ route('user_posts', $user->attributes->username) }}"
           class="text-center text-xs w-full py-2 px-0 border-b-2 border-solid  mx-auto transition-colors duration-200 {{ strpos(Route::currentRouteName(), 'user_posts') === 0 ? 'bottom-0 border-blue-light text-blue-light' : 'text-gray-500 border-gray-300 hover:opacity-75' }}">
            <p class="text-sm xs:text-xs font-light dark:text-gray-300">
                {{ \Numeric::number_format_short($user->attributes->articles_count) }}
                PAYLAŞMA
            </p>
        </a>
    </div>
</div>

{{--<nav class="page__tabs">--}}
{{--    <ul class="tab tabs_item">--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_info', $user->attributes->username) }}"--}}
{{--               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_info') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-information-outline"></i> MƏLUMAT--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_posts', $user->attributes->username) }}"--}}
{{--               class="tabs__link  {{ strpos(Route::currentRouteName(), 'user_posts') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-text-box-multiple"></i>--}}
{{--                {{ \Numeric::number_format_short($user->attributes->articles_count) }}--}}
{{--                PAYLAŞMA--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_followers', $user->attributes->username) }}"--}}
{{--               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_followers') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-account-group"></i>--}}
{{--                {{ \Numeric::number_format_short($user->attributes->user_followers_count) }}--}}
{{--                Izləyənlər--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="tabs__item">--}}
{{--            <a href="{{ route('user_followings', $user->attributes->username) }}"--}}
{{--               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_followings') === 0 ? 'tabs__link_active' : '' }}">--}}
{{--                <i class="mdi mdi-target-account"></i>--}}
{{--                {{ \Numeric::number_format_short($user->attributes->user_followings_count) }}--}}
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

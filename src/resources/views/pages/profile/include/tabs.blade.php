<nav class="page__tabs">
    <ul class="tab tabs_item">
        <li class="tabs__item">
            <a href="{{ route('user_info', $user->username) }}"
               class="tabs__link {{ strpos(Route::currentRouteName(), 'user_info') === 0 ? 'tabs__link_active' : '' }}">
                <i class="mdi mdi-information-outline"></i> MƏLUMAT
            </a>
        </li>
        <li class="tabs__item">
            <a href="{{ route('user_posts', $user->username) }}"
               class="tabs__link  {{ strpos(Route::currentRouteName(), 'user_posts') === 0 ? 'tabs__link_active' : '' }}">
                <i class="mdi mdi-text-box-multiple"></i>
                {{ \Numeric::number_format_short($user->posts->count()) }}
                PAYLAŞMA
            </a>
        </li>
        <li class="tabs__item">
            <a href="#" class="tabs__link">
                <i class="mdi mdi-account-group"></i>
                {{ \Numeric::number_format_short($user->followers()->count()) }}
                Izləyənlər
            </a>
        </li>
        <li class="tabs__item">
            <a href="#" class="tabs__link">
                <i class="mdi mdi-target-account"></i>
                {{ \Numeric::number_format_short($user->followings()->count()) }}
                Izlənən
            </a>
        </li>
{{--        <li class="tabs__item">--}}
{{--            <a href="#" class="tabs__link">--}}
{{--                <i class="mdi mdi-trophy-award"></i>--}}
{{--                {{ \Numeric::number_format_short(3) }}--}}
{{--                Mükafat--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>

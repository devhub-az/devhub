<div class="border shadow mb-2">
    <div class="relative bg-cover bg-center p p-5">
        <div class="absolute shadow-sm right-5 border flex py-2 px-5 rounded-md">
            <div class="border-r pr-4">
                <div class="text-center text-xl font-medium"
                     title="{{ $user->attributes->karma }}">
                    {{ \Numeric::number_format_short($user->attributes->karma) }}
                </div>
                <div class="text-sm text-shadow">Karma</div>
            </div>
            <div class="ml-4">
                <div class="text-center text-xl font-medium"
                     title="{{ $user->attributes->rating }}">{{ \Numeric::number_format_short($user->attributes->rating) }}</div>
                <div class="text-sm text-shadow">Reytinq</div>
            </div>
        </div>
        <div class="flex">
            <img alt="Profile image"
                 src="{{ $user->attributes->avatar  }}"
                 class="w-32 rounded">
            <div class="ml-2">
                <p class="text-2xl text-shadow">{{ $user->attributes->name ?? '' }} {{ $user->attributes->surname ?? '' }} {{ '@' . $user->attributes->username }}</p>
                <div class="profile__description text-shadow">{{ $user->attributes->about }}</div>
                <div class="mt-9">
                    {{--TODO:fix buttons--}}
                    <a href="{{ route('create_article') }}"
                       class="border border-gray-400 bg-transparent font-semibold uppercase text-xs rounded px-4 py-2 text-gray-600 hover:opacity-90 xs:hidden">
                        Profili yenilə
                    </a>
                    <a href="{{ route('create_article') }}"
                       class="border border-blue font-semibold uppercase text-xs rounded ml-2 px-4 py-2 text-gray-100 bg-blue hover:opacity-90 xs:hidden">
                        <i class="mdi mdi-email"></i>
                        Yazmaq
                    </a>
                </div>
            </div>
        </div>
        <div class="profile__info">

            {{-- TODO:remove comments--}}
            {{--            <div class="profile__user-button">--}}
            {{--                @if (Auth::check())--}}
            {{--                    @if(Auth::user()->id !== $user->id)--}}
            {{--                        <user-follow-button--}}
            {{--                            id="{{ $user->id }}" :user="{{ $user }}" @auth :auth_check="true"--}}
            {{--                            :follow_check="'{{ $user->attributes->isFollowedBy(Auth::user()) }}'" @endauth--}}
            {{--                        ></user-follow-button>--}}
            {{--                    @else--}}
            {{--                        <button class="btn btn-primary">Profili yenilə</button>--}}
            {{--                    @endif--}}
            {{--                @else--}}
            {{--                    <user-follow-button--}}
            {{--                        id="{{ $user->id }}" :user="{{ $user }}" @auth :auth_check="true"--}}
            {{--                        :follow_check="'{{ $user->attributes->isFollowedBy(Auth::user()) }}'" @endauth--}}
            {{--                    ></user-follow-button>--}}
            {{--                    <button class="btn btn-outline"><i class="mdi mdi-email"></i> Yazmag</button>--}}
            {{--                @endif--}}
            {{--                <i class="btn btn-outline mdi mdi-dots-vertical"></i>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>

{{--    <div class="profile__header">--}}
{{--    </div>--}}
{{--    <div class="profile__user">--}}
{{--        <div class="avatar avatar_large image-lazy">--}}
{{--            <img alt="Profile image"--}}
{{--                 src="{{ $user->attributes->avatar !== 'user.jpg' ? asset('/upload/user_'. $user->attributes->id . '/logo/' . $user->attributes->avatar) : asset('/upload/default/logo/default.png') }}"--}}
{{--                 class="image-loaded">--}}
{{--        </div>--}}
{{--        <div class="profile__info-name">--}}
{{--            <div class="profile__nick">--}}
{{--                <h2 class="profile__user-about-content">{{ $user->attributes->about }}</h2>--}}
{{--                <h1 class="additionalName">{{ '@' . $user->attributes->username }} {{ $user->attributes->name ? ' | ' . $user->attributes->name . ' ' . $user->attributes->surname : ''}}</h1>--}}
{{--            </div>--}}
{{--            <div class="profile__rating">--}}
{{--                <div>--}}
{{--                    <div class="stacked-counter-karm__value"--}}
{{--                         title="{{ $user->attributes->karma }}">{{ \Numeric::number_format_short($user->attributes->karma) }}</div>--}}
{{--                    <div class="stacked-counter__label">Karma</div>--}}
{{--                </div>--}}
{{--                <div class="line"></div>--}}
{{--                <div>--}}
{{--                    <div class="stacked-counter-rait__value"--}}
{{--                         title="{{ $user->attributes->rating }}">{{ \Numeric::number_format_short($user->attributes->rating) }}</div>--}}
{{--                    <div class="stacked-counter__label">Reytinq</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="profile__user-button">--}}
{{--            @if (Auth::check())--}}
{{--                @if(Auth::user()->id !== $user->attributes->id)--}}
{{--                    <user-follow-button--}}
{{--                            id="{{ $user->attributes->id }}" :user="{{ $user }}" @auth :auth_check="true"--}}
{{--                            :follow_check="'{{ $user->attributes->isFollowedBy(Auth::user()) }}'" @endauth--}}
{{--                    ></user-follow-button>--}}
{{--                @else--}}
{{--                    <button class="btn btn-primary">Profili yenilə</button>--}}
{{--                @endif--}}
{{--            @else--}}
{{--                <user-follow-button--}}
{{--                        id="{{ $user->attributes->id }}" :user="{{ $user }}" @auth :auth_check="true"--}}
{{--                        :follow_check="'{{ $user->attributes->isFollowedBy(Auth::user()) }}'" @endauth--}}
{{--                ></user-follow-button>--}}
{{--                <button class="btn btn-outline"><i class="mdi mdi-email"></i> Yazmag</button>--}}
{{--            @endif--}}
{{--            <i class="btn btn-outline mdi mdi-dots-vertical"></i>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

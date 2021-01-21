<div class="border dark:border-gray-700 xs:border-none xs:shadow-none mb-2 bg-white dark:bg-dpaper ">
    <div class="relative bg-cover bg-center p p-5">
        <div class="flex justify-between">
            <div class="flex">
                <img class="rounded xs:h-16 xs:w-16 w-24 h-24" src="https://specials-images.forbesimg.com/imageserve/5d35eacaf1176b0008974b54/960x0.jpg?cropX1=790&cropX2=5350&cropY1=784&cropY2=3349" alt="Profile image">
                <div class="w-9/12 ml-2">
                    <div class="text-2xl text-shadow dark:text-gray-300 xs:text-base flex items-center block">
                        <p>{{ $user->attributes->name ?? '' }}
                        {{ $user->attributes->surname ?? '' }}
                            {{ '@' . $user->attributes->username }}</p>
                    </div>

                    @if ( $user->attributes->description)
                        <p class="text-sm text-shadow dark:text-gray-300 xs:text-xs mt-2">{{  $user->attributes->description }}</p>
                    @endif

                </div>
            </div>


            <div class="flex py-2">
                <div class="">
                    <div class="text-center text-xl xs:text-sm font-medium dark:text-gray-300"
                        title="{{ $user->attributes->karma }}">
                        {{ \Numeric::number_format_short($user->attributes->karma) }}
                    </div>
                    <div class="text-sm text-shadow xs:text-xs font-light dark:text-gray-300">Karma</div>
                </div>
                <div class="ml-4">
                    <div class="text-center text-xl xs:text-sm font-medium dark:text-gray-300"
                        title="{{ $user->attributes->rating }}">{{ \Numeric::number_format_short($user->attributes->rating) }}</div>
                    <div class="text-sm text-shadow xs:text-xs font-light dark:text-gray-300">Reytinq</div>
                </div>
            </div>

        </div>
        <div class="flex gap-2 mt-4 xs:justify-between">
            <button class="btn-outline">Izləmək</button>
            <button class="btn">Yazmag</button>
        </div>
        <div class="flex xs:justify-between w-full mt-4 xs:overflow-y-auto">
            <div class="text-sm pr-8">
                <div class="dark:text-gray-300">500</div>
                <div class="text-xs font-light dark:text-gray-300">Rate</div>
            </div>
            <div class="border-l border-gray-300 hidden xs:block"></div>
            <div class="text-sm px-8">
                <div class="dark:text-gray-300">1200</div>
                <div class="text-xs font-light dark:text-gray-300">Posts</div>
            </div>
            <div class="border-l border-gray-300 hidden xs:block"></div>
            <div class="text-sm px-8">
                <div class="dark:text-gray-300">234</div>
                <div class="text-xs font-light dark:text-gray-300">Friends</div>
            </div>
            <div class="border-l border-gray-300 hidden xs:block"></div>
            <div class="text-sm pl-8">
                <div class="dark:text-gray-300">120</div>
                <div class="text-xs font-light dark:text-gray-300">Followers</div>
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

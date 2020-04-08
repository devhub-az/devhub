<div class="profile__info">
    <div class="profile__header">
        <div class="background">
            <div class="background__placeholder"></div>
        </div>
    </div>
    <div class="profile__user">
        <div class="avatar avatar_large image-lazy">
            <img alt="admin"
                 src="{{ asset('upload/user_'. $user->id .'/logo/' . $user->avatar) }}"
                 class="image-loaded">
        </div>
        <div class="profile__info-name">
            <div class="profile__nick">
                <h2 class="profile__user-about-content">{{ $user->about }}</h2>
                <h1 class="additionalName">{{ '@' . $user->username }} {{ $user->name ? ' | ' . $user->name . ' ' . $user->surname : ''}}</h1>
            </div>
            <div class="profile__rating">
                <div>
                    <div class="stacked-counter-karm__value"
                         title="{{ $user->karma }}">{{ \Numeric::number_format_short($user->karma) }}</div>
                    <div class="stacked-counter__label">Karma</div>
                </div>
                <div class="line"></div>
                <div>
                    <div class="stacked-counter-rait__value"
                         title="{{ $user->rating }}">{{ \Numeric::number_format_short($user->rating) }}</div>
                    <div class="stacked-counter__label">Reytinq</div>
                </div>
            </div>
        </div>
        <div class="profile__user-button">
            @if (Auth::check())
                @if(Auth::user()->id !== $user->id)
                    <user-follow-button
                            id="{{ $user->id }}" :user="{{ $user }}" @auth :auth_check="true"
                            :follow_check="'{{ $user->isFollowedBy(Auth::user()) }}'" @endauth
                    ></user-follow-button>
                @else
                    <button class="btn btn-primary">Profili yenilə</button>
                @endif
            @else
                <user-follow-button
                        id="{{ $user->id }}" :user="{{ $user }}" @auth :auth_check="true"
                        :follow_check="'{{ $user->isFollowedBy(Auth::user()) }}'" @endauth
                ></user-follow-button>
            @endif
                {{--               <button class="btn btn-outline"><i class="mdi mdi-email"></i> Mesaj</button>--}}
                <i class="btn btn-outline mdi mdi-dots-vertical"></i>
        </div>
    </div>
</div>

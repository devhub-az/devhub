<div class="profile__info">
    <div class="profile__header">
        <div class="background">
            <div class="background__placeholder"></div>
        </div>
    </div>
    <div class="profile__user">
        <div class="avatar avatar_large image-lazy">
            <img alt="admin"
                 src="{{ asset('images/profile/' . $user->avatar) }}"
                 class="image-loaded">
        </div>
        <div class="profile__info-name">
            <div class="profile__nick">
                <h2 class="profile__user-about-content">{{ $user->about }}</h2>
                <h1 class="additionalName">{{ '@' . $user->username }} {{ $user->name ? ' | ' . $user->name . ' ' . $user->surname : ''}}</h1>
            </div>
            <div class="profile__rating">
                <div>
                    <div class="stacked-counter-karm__value">{{ $user->karma }}</div>
                    <div class="stacked-counter__label">Karma</div>
                </div>
                <div class="line"></div>
                <div>
                    <div class="stacked-counter-rait__value">{{ $user->rating }}</div>
                    <div class="stacked-counter__label">Reytinq</div>
                </div>
            </div>
        </div>
        <div class="profile__user-button">
            <user-follow-button
                    id="{{ $user->id }}" @auth :auth_check="true"
                    :user="{{ Auth::user() }}" @endauth
            ></user-follow-button>
            {{--               <button class="btn btn-outline"><i class="mdi mdi-email"></i> Mesaj</button>--}}
            <button class="btn btn-outline"><i class="mdi mdi-dots-vertical"></i></button>
        </div>
    </div>
</div>

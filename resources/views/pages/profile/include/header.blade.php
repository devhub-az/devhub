<div class="border dark:border-gray-700 xs:border-none xs:shadow-none mb-2 bg-white dark:bg-dpaper ">
    <div class="relative bg-cover bg-center p p-5">
        <div class="flex justify-between">
            <div class="flex">
                <img class="rounded xs:h-16 xs:w-16 w-24 h-24"
                     src="{{ $author->attributes->avatar }}"
                     alt="Profile image">
                <div class="w-9/12 ml-2">
                    <div class="text-2xl text-shadow dark:text-gray-300 xs:text-base flex items-center block">
                        <p>{{ $author->attributes->name ?? '' }}
                            {{ $author->attributes->surname ?? '' }}
                            {{ '@' . $author->attributes->username }}</p>
                    </div>

                    @if ( $author->attributes->description)
                        <p class="text-sm text-shadow dark:text-gray-300 xs:text-xs mt-2">{{  $author->attributes->description }}</p>
                    @endif

                </div>
            </div>

            <div class="flex py-2">
                <div class="">
                    <div class="text-center text-xl xs:text-sm font-medium dark:text-gray-300"
                         title="{{ $author->attributes->karma }}">
                        {{ \Numeric::number_format_short($author->attributes->karma) }}
                    </div>
                    <div class="text-sm text-shadow xs:text-xs font-light dark:text-gray-300">Karma</div>
                </div>
                <div class="ml-4">
                    <div class="text-center text-xl xs:text-sm font-medium dark:text-gray-300"
                         title="{{ $author->attributes->rating }}">{{ \Numeric::number_format_short($author->attributes->rating) }}</div>
                    <div class="text-sm text-shadow xs:text-xs font-light dark:text-gray-300">Reytinq</div>
                </div>
            </div>

        </div>
        <div class="flex gap-2 mt-4 xs:justify-between" id="app">
            @auth
                @can(App\Policies\AuthorPolicy::FOLLOW, $user)
                    <user-follow
                        :id="'{{ $author->id }}'"
                        @auth
                        :follow_check="'{{ $author->attributes->follower }}'"
                        @endauth
                    ></user-follow>
                @else
                    <a href="{{ route('profile-settings') }}" class="btn-outline h-7">Profili yenile</a>
                @endcan
            @else
                <button class="btn-outline h-7"><i class="mdi mdi-email"></i> Yazmag</button>
            @endauth
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
    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/author.js') }}" async></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/author.js') }}" as="script">
@endsection

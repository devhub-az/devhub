<div class="border dark:border-gray-700 xs:border-none xs:shadow-none mb-2 bg-white dark:bg-dpaper rounded">
    <div class="relative bg-cover bg-center p-4">
        <div class="flex justify-between">
            <div class="flex items-start space-x-2">
                <figure>
                    <img id="zoom-scrollOffset"
                         class="rounded shadow-sm border dark:border-gray-700 xs:h-16 xs:w-16 w-16 h-16 object-cover"
                         src="{{ $author->attributes->avatar }}"
                         alt="Profile image">
                </figure>
                <div class="space-y-1">
                    <div class="flex items-end space-x-2">
                        <div class="text-2xl text-shadow dark:text-gray-300 xs:text-base flex items-center leading-6">
                            {{ $author->attributes->name ?? '' }}
                            {{ $author->attributes->surname ?? '' }}
                        </div>
                    </div>
                    <div
                        class="text-cerulean-100 text-xl text-shadow dark:text-cerulean-100 xs:text-base flex items-center">
                        {{ '@' . $author->attributes->username }}
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="flex space-x-2 mt-4 xs:justify-between" id="app">
                    @auth
                        @can(App\Policies\AuthorPolicy::FOLLOW, $user)
                            <user-follow
                                :id="'{{ $author->id }}'"
                                :follow_check="'{{ $author->attributes->follower }}'"
                            ></user-follow>
                        @else
                            <a href="{{ route('profile-settings') }}" class="btn-outline h-7">Изменить</a>
                        @endcan
                    @else
                        <user-follow
                            :id="'{{ $author->id }}'"
                            @auth
                            :follow_check="'{{ $author->attributes->follower }}'"
                            @endauth
                        ></user-follow>
                    @endauth
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2 mt-2">
            <div class="flex items-center space-x-2">
                <a target="_blank" class="text-xl" title="Github"
                   href="https://github.com/{{ $author->attributes->github }}">
                    <span id="trans-none" class="iconify dark:text-gray-400 dark:hover:text-gray-300"
                          data-icon="ant-design:github-filled"
                          data-inline="false"></span>
                </a>
            </div>
            <div class="flex items-center space-x-2">
                <a target="_blank" class="text-xl" title="Вебсайт"
                   href="{{ $author->attributes->website }}">
                    <span id="trans-none" class="iconify dark:text-gray-400 dark:hover:text-gray-300"
                          data-icon="akar-icons:link-chain"
                          data-inline="false"></span>
                </a>
            </div>
            <div class="flex items-center space-x-2">
                <a target="_blank" class="text-xl" title="Твиттер"
                   href="https://twitter.com/{{ $author->attributes->twitter }}">
                    <span id="trans-none" class="iconify dark:text-gray-400 dark:hover:text-gray-300"
                          data-icon="akar-icons:twitter-fill"
                          data-inline="false"></span>
                </a>
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

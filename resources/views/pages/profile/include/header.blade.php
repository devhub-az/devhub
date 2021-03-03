<div class="border dark:border-gray-700 xs:border-none xs:shadow-none mb-2 bg-white dark:bg-dpaper ">
    <div class="relative bg-cover bg-center p-4">
        <div class="flex justify-between">
            <div class="flex">
                <img class="rounded xs:h-16 xs:w-16 w-16 h-16 object-cover"
                     src="{{ $author->attributes->avatar }}"
                     alt="Profile image">
                <div class="ml-2">
                    <div class="text-2xl text-shadow dark:text-gray-300 xs:text-base flex items-center mb-2">
                        <p>{{ $author->attributes->name ?? '' }}
                            {{ $author->attributes->surname ?? '' }}
                            {{ '@' . $author->attributes->username }}</p>
                    </div>
                    <div class="flex items-end space-x-1 text-sm">
                        <p class="dark:text-gray-300">{{ \Numeric::number_format_short($author->attributes->rating) }}</p>
                        <p class="dark:text-gray-400">Рейтинг</p>
                        <div class="dark:text-gray-300" title="{{ $author->attributes->karma }}">
                            {{ \Numeric::number_format_short($author->attributes->karma) }}
                        </div>
                        <div class="dark:text-gray-400">Карма</div>
                    </div>
                </div>
            </div>
            <div class="flex">
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
    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/author.js') }}" async></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/author.js') }}" as="script">
@endsection

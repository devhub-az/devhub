<div class="flex p-3 space-x-2">
    <img
        loading=lazy
        src="{{ ($author->avatar !== 'default') ? $author->getMedia('avatars')->first()->getFullUrl() : config('devhub.default_avatar') }}"
        alt="{{ __('devhub.authorLogo') }}" class="w-12 h-12 rounded xs:w-8 xs:h-8">
    <div>
        <a href="#" class="">
            <div class="flex items-end space-x-2">
                <div class="text-xl text-shadow dark:text-gray-300 xs:text-base flex items-center leading-6">
                    {{ $author->name ?? '' }}
                    {{ $author->surname ?? '' }}
                </div>
            </div>
            <div class="text-cerulean-100 text-shadow dark:text-cerulean-100 xs:text-base flex items-center">
                {{ '@' . $author->username }}
            </div>
        </a>
        <div>
            <div class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2 dark:text-gray-400">
                {{ $author->description }}
            </div>
        </div>
        @if($author->company)
            <div class="flex space-x-2 mt-2 items-center">
                <span class="iconify" data-icon="heroicons-outline:briefcase" data-inline="false"></span>
                <p class="text-xs">{{ $author->company }}</p>
            </div>
        @endif
    </div>
</div>

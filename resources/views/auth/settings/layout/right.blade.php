<div class="flex flex-col space-y-2">
    <a href="{{ route('profile-settings', Auth::user()->username) }}"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group @if(Route::getCurrentRoute()->getName() === "profile-settings") dark:text-gray-300 bg-cerulean-700 dark:bg-cerulean-700 text-cerulean-300 @endif">
        <span class="iconify text-xl group-hover:text-white" data-icon="mdi:account-circle-outline" data-inline="false"></span>
        <p>Şəxsi məlumat</p>
    </a>
    <a href=""
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        <span class="iconify text-xl group-hover:text-white" data-icon="bx:bxs-key" data-inline="false"></span>
        <p class="group-hover:text-white">Giriş və təhlükəsizlik</p>
    </a>
    <a href="#"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
{{--        <span class="iconify group-hover:text-white transition-none" data-icon="fluent:alert-on-24-regular" data-inline="false"></span>--}}
        <span class="iconify text-xl group-hover:text-white transition-none" data-icon="mdi:bell-ring-outline" data-inline="false"></span>
        <p class="group-hover:text-white transition-none">Bildirişlər</p>
    </a>
    <a href="#"
       class="flex space-x-1 group items-center rounded transition-none  px-4 py-2 dark:hover:bg-red-700 hover:bg-red-500 transition-none">
        <span class="iconify text-xl dark:text-red-500 text-red-500 group-hover:text-white dark:group-hover:text-white transition-none" data-icon="jam:triangle-danger" data-inline="false"></span>
        <p class="dark:text-red-500 dark:group-hover:text-white text-red-500 group-hover:text-white group-hover:text-white transition-none">Təhlükəli zona</p>
    </a>
</div>

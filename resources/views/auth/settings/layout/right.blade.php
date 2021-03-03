<div class="flex flex-col space-y-2">
    <a href="{{ route('profile-settings') }}"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-white transition-none group @if(Route::getCurrentRoute()->getName() === "profile-settings") dark:text-gray-300 bg-white dark:bg-dpaper @endif">
        <span class="iconify text-xl group-hover:text-black" data-icon="mdi:account-circle-outline" data-inline="false"></span>
        <p>Профиль</p>
    </a>
    <a href=""
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-black px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-white transition-none group">
        <span class="iconify text-xl group-hover:text-black" data-icon="bx:bxs-key" data-inline="false"></span>
        <p class="group-hover:text-black">Вход и безопасность</p>
    </a>
    <a href="#"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-black px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-white transition-none group">
{{--        <span class="iconify group-hover:text-white transition-none" data-icon="fluent:alert-on-24-regular" data-inline="false"></span>--}}
        <span class="iconify text-xl group-hover:text-black transition-none" data-icon="mdi:bell-ring-outline" data-inline="false"></span>
        <p class="group-hover:text-black transition-none">Уведомления</p>
    </a>
    <a href="{{ route('destroy-settings') }}"
       class="flex space-x-1 group items-center rounded transition-none px-4 py-2 dark:hover:bg-red-700 hover:bg-red-500 transition-none @if(Route::getCurrentRoute()->getName() === "destroy-settings") dark:text-gray-300 bg-red-600 dark:bg-red-600 @endif">
        <span class="iconify text-xl dark:text-red-500 text-red-500 group-hover:text-white dark:group-hover:text-white transition-none @if(Route::getCurrentRoute()->getName() === "destroy-settings") text-white dark:text-white @endif" data-icon="jam:triangle-danger" data-inline="false"></span>
        <p class="dark:text-red-500 dark:group-hover:text-white text-red-500 group-hover:text-white @if(Route::getCurrentRoute()->getName() === "destroy-settings") text-white dark:text-white @endif">Опасная зона</p>
    </a>
</div>

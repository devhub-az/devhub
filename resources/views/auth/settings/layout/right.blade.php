<div class="flex flex-col space-y-2">
    <a href="{{ route('profile-settings', Auth::user()->username) }}"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group @if(Route::getCurrentRoute()->getName() === "profile-settings") dark:text-cerulean-700 bg-white text-cerulean-300 @endif">
        <span class="iconify text-xl" data-icon="mdi:account-circle-outline" data-inline="false"></span>
        <p>Şəxsi məlumat</p>
    </a>
    <a href=""
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        <span class="iconify text-xl" data-icon="bx:bxs-key" data-inline="false"></span>
        <p>Şifrə</p>
    </a>
    <a href="#"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        <p>Üstünlüklər</p>
    </a>
    <a href="#"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        <p>Bildirişlər</p>
    </a>
    <a href="#"
       class="flex space-x-1 items-center rounded transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        <p>Giriş və təhlükəsizlik</p>
    </a>
</div>

<div class="flex flex-col border rounded bg-white dark:border-gray-700 dark:bg-dpaper">
    <a href="{{ route('profile-settings', Auth::user()->username) }}"
       class="rounded-t group-hover:text-white transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group @if(Route::getCurrentRoute()->getName() === "profile-settings") dark:bg-cerulean-700 dark:text-gray-300 text-white bg-cerulean-100 @endif">
        Şəxsi məlumat
    </a>
    <a href="#"
       class="group-hover:text-white transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        Üstünlüklər
    </a>
    <a href="#"
       class="group-hover:text-white transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        Bildirişlər
    </a>
    <a href="#"
       class="rounded-b group-hover:text-white transition-none dark:text-gray-300 hover:text-white px-4 py-2 dark:hover:bg-cerulean-700 hover:bg-cerulean-100 transition-none group">
        Giriş və təhlükəsizlik
    </a>
</div>

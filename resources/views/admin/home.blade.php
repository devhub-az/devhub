@section('title')Admin panel @stop

@extends('layouts.admin')

@section('content')
    <div class="flex w-screen h-screen text-gray-400 bg-gray-900">

        <!-- Component Start -->
        <div class="flex flex-col items-center w-16 pb-4 overflow-auto border-r border-gray-800 text-gray-500">
            <a class="flex items-center justify-center flex-shrink-0 w-full h-16" href="{{route('home')}}">
                <img src="{{ asset('images/DevHub_Compact_Logo.svg') }}" alt="DevHub Logo" width="128"
                     height="36" class="w-10 xs:h-8">
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-800" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-800" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-800" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-800" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-800" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 mt-auto rounded hover:bg-gray-800"
               href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </a>
        </div>
        <div class="flex flex-col flex-grow">
            <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-800">
                <h1 class="text-lg font-medium">Главная</h1>
{{--                <button--}}
{{--                    class="flex items-center justify-center h-10 px-4 ml-auto text-sm font-medium rounded hover:bg-gray-800">--}}
{{--                    Action 1--}}
{{--                </button>--}}
{{--                <button--}}
{{--                    class="flex items-center justify-center h-10 px-4 ml-2 text-sm font-medium bg-gray-800 rounded hover:bg-gray-700">--}}
{{--                    Action 2--}}
{{--                </button>--}}
{{--                <button class="relative ml-2 text-sm focus:outline-none group">--}}
{{--                    <div class="flex items-center justify-between w-10 h-10 rounded hover:bg-gray-800">--}}
{{--                        <svg class="w-5 h-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                             stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="absolute right-0 flex-col items-start hidden w-40 mt-1 pb-1 bg-gray-800 border border-gray-800 shadow-lg group-focus:flex">--}}
{{--                        <a class="w-full px-4 py-2 text-left hover:bg-gray-900" href="#">Menu Item 1</a>--}}
{{--                        <a class="w-full px-4 py-2 text-left hover:bg-gray-900" href="#">Menu Item 2</a>--}}
{{--                        <a class="w-full px-4 py-2 text-left hover:bg-gray-900" href="#">Menu Item 3</a>--}}
{{--                    </div>--}}
{{--                </button>--}}
            </div>
            <div class="flex-grow p-6 overflow-auto bg-gray-800">
                <div class="bg-gray-800 w-full pb-6">
                    <div class="flex space-x-4 mx-auto w-full">
                        <div class="w-full lg:w-1/4">
                            <div
                                class="widget w-full p-4 rounded-lg bg-gray-900 border border-gray-800 dark:bg-gray-900 dark:border-gray-800">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-col">
                                        <div class="text-xs uppercase text-gray-500">
                                            Пользователей
                                            <span
                                                class="text-green-500 text-sm font-semibold ml-1">+{{ $newUsers }}</span>
                                        </div>
                                        <div class="text-xl font-bold">
                                            {{ $users->count() }}
                                        </div>
                                    </div>
                                    <span class="iconify text-3xl text-gray-500" data-icon="mi:users"
                                          data-inline="false"></span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/4">
                            <div
                                class="widget w-full p-4 rounded-lg bg-gray-900 border border-gray-800 dark:bg-gray-900 dark:border-gray-800">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-col">
                                        <div class="text-xs uppercase text-gray-500">
                                            Постов
                                            <span
                                                class="text-green-500 text-sm font-semibold ml-1">+{{ $newArticles }}</span>
                                        </div>
                                        <div class="text-xl font-bold">
                                            {{ $articles->count() }}
                                        </div>
                                    </div>
                                    <span class="iconify text-3xl text-gray-500"
                                          data-icon="mdi:newspaper-variant-multiple-outline" data-inline="false"></span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/4">
                            <div
                                class="widget w-full p-4 rounded-lg bg-gray-900 border border-gray-800 dark:bg-gray-900 dark:border-gray-800">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-col">
                                        <div class="text-xs uppercase text-gray-500">
                                            Просмотров
                                            <span
                                                class="text-green-500 text-sm font-semibold ml-1">+{{ $newViews }}</span>
                                        </div>
                                        <div class="text-xl font-bold">
                                            {{ $views->count() }}
                                        </div>
                                    </div>
                                    <span class="iconify text-3xl text-gray-500"
                                          data-icon="mdi-eye-outline" data-inline="false"></span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/4">
                            <div
                                class="widget w-full p-4 rounded-lg bg-gray-900 border border-gray-800 dark:bg-gray-900 dark:border-gray-800">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-col">
                                        <div class="text-xs uppercase text-gray-500">
                                            Комментариев
                                        </div>
                                        <div class="text-xl font-bold">
                                            999
                                        </div>
                                    </div>
                                    <span class="iconify text-3xl text-gray-500"
                                          data-icon="bx:bx-comment-detail"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-xl mb-2">Пользователи</p>
                    <table class="min-w-full divide-y rounded border border-gray-700 divide-gray-700">
                        <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Имя
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Эмейл
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Активность
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Присоединился
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Статус
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-700 text-sm">
                                <td class="flex inline-flex items-center space-x-4 px-6 py-4 whitespace-normal">
                                    <div>
                                        <img
                                            src="{{($user->avatar !== 'default') ? '' . $user->avatar : config('devhub.default_avatar') }}"
                                            alt=""
                                            class="mr-1 md:mr-2 md:inline-block h-12 w-12 rounded object-cover">
                                    </div>
                                    <div class="w-40">
                                        <p class="text-sm">
                                            {{ $user->name }}
                                        </p>
                                        <p class="md:hidden text-xs text-gray-600 font-medium">{{ '@' . $user->username }}</p>
                                        <p class="md:table-cell text-xs text-gray-500 font-medium"
                                           title="{{$user->description}}">
                                            {{ Str::limit(strip_tags($user->description), 30) }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap"
                                    title="{{ $user->last_active }}">
                                    {{ $user->last_active ? $user->last_active->format('j M Y') : $user->last_active }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" title="{{ $user->created_at }}">
                                    {{ $user->created_at ? $user->created_at->format('j M Y') : $user->created_at}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($user->isBanned())
                                        <span class=""></span>
                                    @elseif ($user->isAdmin())
                                        <span
                                            class="font-medium text-white border border-gray-700 rounded bg-red-700 px-2 py-1">Admin</span>
                                    @elseif ($user->isModerator())
                                        <span
                                            class="font-medium text-white border border-gray-700 rounded bg-cerulean-700 px-2 py-1">Moderator</span>
                                    @else
                                        <span
                                            class="font-medium text-white border border-gray-700 rounded bg-transparent px-2 py-1">User</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @can(App\Policies\UserPolicy::BAN, $user)
                                        @if ($user->isBanned())
                                            <button type="submit"
                                                    class="btn-outline h-7 inline-flex justify-center bg-white font-medium text-gray-700 hover:bg-gray-50"
                                                    @click.prevent="activeModal = 'unbanUser'">Разбанить
                                            </button>
                                        @else
                                            <button type="submit"
                                                    class="btn h-7 inline-flex justify-center bg-cerulean-600 border-none hover:bg-cerulean-700"
                                                    @click.prevent="activeModal = 'banUser'">Забанить
                                            </button>
                                        @endif
                                    @endcan
                                </td>
                                <td>
                                    @if (Auth::check() && Auth::user()->isAdmin())
                                        @can(App\Policies\UserPolicy::DELETE, $user)
                                            <button type="submit"
                                                    class="btn h-7 inline-flex justify-center bg-red-600 border-none hover:bg-red-700"
                                                    @click.prevent="activeModal = 'deleteUser'">Удалить
                                            </button>
                                        @endcan
                                    @endif
                                </td>
                                @can(App\Policies\UserPolicy::BAN, $user)
                                    @if ($user->isBanned())
                                        @include('include.modal', [
                                            'identifier' => 'unbanUser',
                                            'route' => ['admin.users.unban', $user->username],
                                            'title' => "Разбанить {$user->name}",
                                            'submit' => "Разбанить",
                                            'body' => '<p>Разблокировка этого пользователя позволит ему снова войти в систему и публиковать материалы.</p>',
                                        ])
                                    @else
                                        @include('include.modal', [
                                            'identifier' => 'banUser',
                                            'route' => ['admin.users.ban', $user->username],
                                            'title' => "Забанить {$user->username}?",
                                            'submit' => "Забанить",
                                            'body' => '<p>Если заблокировать этого пользователя, он не сможет входить в систему, публиковать обсуждения и отвечать на них.</p>',
                                        ])
                                    @endif
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    @can(App\Policies\UserPolicy::DELETE, $user)--}}
    {{--        @include('_partials._delete_modal', [--}}
    {{--            'identifier' => 'deleteUser',--}}
    {{--            'route' => ['admin.users.delete', $user->username],--}}
    {{--            'title' => "Delete {$user->name}",--}}
    {{--            'body' => '<p>Deleting this user will remove their account and any related content like threads & replies. This cannot be undone.</p>',--}}
    {{--        ])--}}
    {{--    @endcan--}}
@endsection

@section('title')Админ панель @stop

@extends('layouts.admin')

@section('content')
    <div class="flex-grow p-6 overflow-auto bg-gray-100 space-y-4">
        <div class="w-full pb-6">
            <div class="flex space-x-4 mx-auto w-full">
                <div class="w-full lg:w-1/4">
                    <div
                        class="w-full p-4 rounded-lg border border-gray-300">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase">
                                    Пользователей
                                    <span
                                        class="text-green-500 text-sm font-semibold ml-1">{{ $newUsers === 0 ? '' : '+ ' . $newUsers }}</span>
                                </div>
                                <div class="text-xl font-bold">
                                    {{ $users->count() }}
                                </div>
                            </div>
                            <span class="iconify text-3xl" data-icon="mi:users"
                                  data-inline="false"></span>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <div
                        class="w-full p-4 rounded-lg border border-gray-300">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase">
                                    Постов
                                    <span
                                        class="text-green-500 text-sm font-semibold ml-1">{{ $newArticles === 0 ? '' : '+ ' . $newArticles }}</span>
                                </div>
                                <div class="text-xl font-bold">
                                    {{ $articles->count() }}
                                </div>
                            </div>
                            <span class="iconify text-3xl"
                                  data-icon="mdi:newspaper-variant-multiple-outline" data-inline="false"></span>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <div
                        class="w-full p-4 rounded-lg border border-gray-300">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase">
                                    Просмотров
                                    <span
                                        class="text-green-500 text-sm font-semibold ml-1">{{ $newViews === 0 ? '' : '+ ' . $newViews }}</span>
                                </div>
                                <div class="text-xl font-bold">
                                    {{ $views->count() }}
                                </div>
                            </div>
                            <span class="iconify text-3xl"
                                  data-icon="mdi-eye-outline" data-inline="false"></span>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <div
                        class="w-full p-4 rounded-lg border border-gray-300">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase">
                                    Комментариев
                                    <span
                                        class="text-green-500 text-sm font-semibold ml-1">{{ $newComments === 0 ? '' : '+ ' . $newComments }}</span>
                                </div>
                                <div class="text-xl font-bold">
                                    {{ $comments->count() }}
                                </div>
                            </div>
                            <span class="iconify text-3xl"
                                  data-icon="bx:bx-comment-detail"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="text-xl font-semibold mb-2">Пользователи</p>
            <table class="min-w-full divide-y rounded border border-gray-300 divide-gray-300 shadow">
                <thead class="bg-gray-200 rounded">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Имя
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Эмейл
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Активность
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Присоединился
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Статус
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"></th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 bg-white hover:bg-gray-200">
                @foreach ($users as $user)
                    <tr class="text-sm">
                        <td class="flex inline-flex items-center space-x-2 px-6 py-4 whitespace-normal">
                            <img
                                src="{{ ($user->avatar !== 'default') ? $user->getMedia('avatars')->first()->getFullUrl() : config('devhub.default_avatar') }}"
                                alt="{{ __('devhub.authorLogo') }}"
                                class="md:inline-block h-8 w-8 rounded object-cover">
                            <div class="w-40">
                                <p class="text-sm">
                                    {{ $user->name }}
                                </p>
                                <p class="md:hidden text-xs text-gray-600 font-medium">{{ '@' . $user->username }}</p>
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
                                    class="font-medium border border-red-700 rounded text-red-700 px-2 py-1">Admin</span>
                            @elseif ($user->isModerator())
                                <span
                                    class="font-medium text-white border border-gray-700 rounded bg-cerulean-700 px-2 py-1">Moderator</span>
                            @else
                                <span
                                    class="font-medium text-white border border-gray-700 rounded bg-transparent px-2 py-1">User</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @can(App\Policies\AuthorPolicy::BAN, $user)
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
                                @can(App\Policies\AuthorPolicy::DELETE, $user)
                                    <button type="submit"
                                            class="btn h-7 inline-flex justify-center bg-red-600 border-none hover:bg-red-700"
                                            @click.prevent="activeModal = 'deleteUser'">Удалить
                                    </button>
                                @endcan
                            @endif
                        </td>
                        @can(App\Policies\AuthorPolicy::BAN, $user)
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

    {{--    @can(App\Policies\UserPolicy::DELETE, $user)--}}
    {{--        @include('_partials._delete_modal', [--}}
    {{--            'identifier' => 'deleteUser',--}}
    {{--            'route' => ['admin.users.delete', $user->username],--}}
    {{--            'title' => "Delete {$user->name}",--}}
    {{--            'body' => '<p>Deleting this user will remove their account and any related content like threads & replies. This cannot be undone.</p>',--}}
    {{--        ])--}}
    {{--    @endcan--}}
@endsection

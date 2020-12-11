<div class="border p-2 rounded mb-2">
    <p class="font-medium mb-3">Izləyənlər</p>
    <div class="flex -space-x-2 overflow-hidden p-1">
        @if (count($user->relationships->followers->data) > 0)
            @foreach($user->relationships->followers->data as $follower)
                <img src="{{ $follower->attributes->avatar }}" alt="User profili"
                     class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-300">
            @endforeach
        @else
            <p>Heç kim istifadəçini izləmir</p>
        @endif
    </div>
</div>
<div class="border p-2 rounded">
    <p class="font-medium mb-3">Izlənən</p>
    <div class="flex -space-x-2 overflow-hidden p-1">
        @if (count($user->relationships->followings->data) > 0)
            @foreach($user->relationships->followings->data as $following)
                <img src="{{ $following->attributes->avatar }}" alt="User profili"
                     class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-300">
            @endforeach
        @else
            <p>İstifadəçi heç kimi izləmir</p>
        @endif

    </div>
</div>

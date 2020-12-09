<div class="conversations__users">
    <div class="list-group">
        @foreach ($users as $user)
            <a class="list-group-item @if (Request::is('conversations/' . $user->id)) current  @endif" href="{{ route('conversations.show', $user->id) }}">
                <div class="text">
                    <h4 class="@if (isset($unread[$user->id]))badge  data-badge={{ $unread[$user->id] }} @endif">{{ $user->username }} </h4>
                    <p class="text-muted">{{ $last_message }}</p>
                </div>
                <span class="time text-muted small">{{ $last_message_time ? $last_message_time->diffForHumans() : '' }}</span>
            </a>
        @endforeach
    </div>
</div>

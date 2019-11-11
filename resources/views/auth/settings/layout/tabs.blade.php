<ul class="nav_posts">
    <a href="{{ route('home') }}"
       class="nav-posts__item @if(Request::is('top/*') || Request::is('/')) nav-posts__item-link_current @endif">
        <span class="nav-posts__item-link">PROFIL</span>
    </a>
    <a href="{{ route('all') }}"
       class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
        <span class="nav-posts__item-link">AKKAUNT</span>
    </a>
    @auth
        @if (Auth::user()->getUserIdsAttribute() !== null)
            <a href="{{ route('favorite') }}"
               class="nav-posts__item @if(Request::url() === route('favorite')) nav-posts__item-link_current @endif">
                <span class="nav-posts__item-link">Bildirişlər</span>
            </a>
        @endif
    @endauth
</ul>

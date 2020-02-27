<div id="footer" class="footer">
    <div class="footer-content">
        <a class="logo-footer" href="/">DevHub</a>
        <div class="copyright">&copy; 2019 - {{ date('Y') }}</div>
        <ul class="nav-links" id="navbar-links">
            <li class="nav-links__item">
                <a href="{{ session('main-page') ?? route('home') }}" class="nav-links__item-link">Paylaşmalar</a>
            </li>
            <li class="nav-links__item">
                <a href="{{ route('hubs-list') }}" class="nav-links__item-link ">Hablar</a>
              </li>
            <li class="nav-links__item">
                <a href="{{ route('users-list') }}" class="nav-links__item-link ">Müəlliflər</a>
            </li>
            <li class="nav-links__item">
                <a href="{{ url('/about_us') }}" class="nav-links__item-link ">Haqqımızda</a>
            </li>
        </ul>
    </div>
</div>

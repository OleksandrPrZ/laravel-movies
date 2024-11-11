<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">{{_('Home')}}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="language-switcher d-flex">
                <a href="{{ route('locale.switch', 'ua') }}" class="nav-link {{ app()->getLocale() === 'ua' ? 'active' : '' }}">Українською</a>
                <span class="nav-link">/</span>
                <a href="{{ route('locale.switch', 'en') }}" class="nav-link {{ app()->getLocale() === 'en' ? 'active' : '' }}">English</a>
            </div>
        </li>
    </ul>
</nav>

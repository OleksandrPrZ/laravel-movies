<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Логотип -->
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo/img.png') }}" alt="Movie App Logo" class="logo-image">
            </a>
        </div>

        <div class="language-switcher">
            <a href="{{ route('locale.switch', 'ua') }}" class="{{ app()->getLocale() === 'ua' ? 'active' : '' }}">
                {{ __('labels.language_uk') }}
            </a> /
            <a href="{{ route('locale.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">
                {{ __('labels.language_en') }}
            </a>
        </div>

    </div>
</header>

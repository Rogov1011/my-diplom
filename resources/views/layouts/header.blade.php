<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('mainPage') }}"><img class="rounded-3"
                    src="{{ asset('assets/icon/logo.png') }}" width="150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('mainPage') }}">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link popup_catalog" href="#">
                            Каталог
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("contacts") }}">О нас</a>
                    </li>
                    @if ($currentUser)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders') }}">Мои заказы</a>
                        </li>
                        @hasrole('super-admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('adminIndex') }}">Страница администратора</a>
                            </li>
                        @endhasrole
                    @endif
                </ul>
                <ul class="navbar-nav mx-4">
                    @if ($currentUser)
                        <li class="nav-item d-flex">
                            <p class="text-light d-flex align-items-end icon-header">Корзина</p>
                            @if ($currentUser->cart)
                                <a class="nav-link icon-header d-flex" href="{{ route('cart') }}"><img
                                        src="{{ asset('assets/icon/cart.png') }}">
                                    <p class="header-cart my-2 text-light mx-1">
                                        {{ $currentUser->cart->getTotalItems() }}</p>
                                </a>
                            @else
                                <a class="nav-link icon-header d-flex" href="{{ route('cart') }}"><img
                                        src="{{ asset('assets/icon/cart.png') }}">
                                    <p class="header-cart my-2 text-light mx-1">0</p>
                                </a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link icon-header" href="#"><img class="open-popup-auth"
                                    src="{{ asset('assets/icon/user.png') }}"><span
                                    class="open-popup-auth">Войти</span></a>
                        </li>
                    @endif
                </ul>
                @if ($currentUser)
                    <h3 class="nav-item text-light mx-3">
                        {{ auth()->user()->name }}
                    </h3>
                    <form class="mx-4" action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link icon-header"><img
                                src="{{ asset('assets/icon/exit.png') }}"></button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
</header>

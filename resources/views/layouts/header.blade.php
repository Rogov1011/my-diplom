<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img class="rounded-3" src="{{asset("assets/icon/logo.png")}}" width="150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link popup_catalog" href="#">
                            Каталог
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О нас</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-4">
                    <li class="nav-item">
                        <a class="nav-link icon-header" href="#"><img class="open-popup-auth" src="{{asset("assets/icon/user.png")}}"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-header" href="#"><img src="{{asset("assets/icon/health.png")}}">(0)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-header" href="#"><img src="{{asset("assets/icon/cart.png")}}">(0)</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 bg-light" type="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-light" type="submit">Поиск</button>
                </form>
            </div>
        </div>
    </nav>
</header>


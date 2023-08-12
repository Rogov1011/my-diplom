<body>
    <footer>
        <div class="footer">
            <a class="navbar-brand" href="{{ route('mainPage') }}"><img class="rounded-3"
                src="{{ asset('assets/icon/logo.png') }}" width="250px"></a>
            <div class="content my-4">
                <ul>
                    <li><a class="text-light" href="{{ route("contacts") }}">О нас</a></li>
                    <li><a class="text-light" href="{{ route("user_agreement") }}">Пользовательское соглашение</a></li>
                    <li><a class="text-light" href="{{ route("warranty") }}">Гарантия</a></li>
                    <li><a class="text-light" href="{{ route("sertificat") }}">Сертификаты</a></li>
                    <li><a class="text-light" href="{{ route("payment") }}">Способы оплаты</a></li>
                </ul>
            </div>
            <div class="contentFoot text-light">
                MyDiplom Copyright © 2023 Instrument37 - All rights reserved || Designed By: Rogov
            </div>
        </div>
    </footer>

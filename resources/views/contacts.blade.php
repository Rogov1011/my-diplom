@extends('app')

@section('title', 'О нас')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <div>
            <h1> О магазине</h1>
            <h4 class="my-3">Инструмент37 - это интернет магазин строительного инструмента, садово-огородного инвентаря,
                расходных материалов и многого другого
                У нас Вы можете быстро и легко купить все, что нужно для строительства и ремонта, благоустройства природных
                территорий, гаражного ремонта и прочего. Удобство комплектации заказа через наш магазин облегчит Вам выбор
                нужного товара и сэкономит Ваше время и силы.</h4>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-6">
            <iframe class="rounded shadow-lg p-3 mb-5 bg-body rounded"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2584.9270815484697!2d40.954503220002366!3d56.98895301969236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414d14275d96fcab%3A0x6152abcf25a6fc29!2z0KHRgtGA0L7QudCx0LDRgg!5e0!3m2!1sru!2sru!4v1691664611618!5m2!1sru!2sru"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-6 d-flex flex-column">
            <div class="d-flex">
                <div class="d-flex">
                    <h4>График работы:</h4>
                </div>
                <div class="d-flex flex-column mx-4 my-1">
                    <div>
                        <p>пн-пт: 8-00 до 20-00</p>
                        <p>сб: с 8-00 до 17-00</p>
                        <p>вс: с 8-00 до 15-00</p>
                    </div>
                </div>
            </div>
            <div class="d-flex my-4">
                <h4>Телефон для связи:</h4>
                <h4 class="mx-2">8 (4932) 220-230</h4>
            </div>
            <div class="d-flex my-4">
                <h4>Email:</h4>
                <h4 class="mx-2">rogov_p.a@mail.ru</h4>
            </div>
            <a class="navbar-brand d-flex my-5" href="{{ route('mainPage') }}"><img class="rounded-3"
                src="{{ asset('assets/icon/logo.png') }}" width="300px"></a>
        </div>
    </div>
    </div>
@endsection

@extends("app")

@section("title", "Главная страница")

@section("content")
    <h1 class="my-5 text-center">Категории товаров</h1>
    @if (session("success_register"))
        <div class="alert alert-dark col-6 message_register">
            {{ session("success_register") }}
        </div>
    @endif
    <div class="content">

    </div>
@endsection

@extends('app');

@section('title', 'Корзина')
@section('content')

    <h1 class="my-5">Корзина</h1>
    @if ($cart)
        <div class="row">
            <div class="col-lg-8 col-12">
                <table class="table table-striped">
                    <div class="thead">
                        <tr class="table-dark">
                            <td>Карт.</td>
                            <td>Товар</td>
                            <td>Цена</td>
                            <td>Количество</td>
                            <td>Итог</td>
                            <td>Действие</td>
                        </tr>
                    </div>
                    <tbody>
                        @foreach ($cart->items as $item)
                            <tr>
                                <td><img src="{{ $item->product->getImage() }}" alt=""
                                        style="width: 50px; height: 50px"></td>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <form action="{{ route('cart.items.qty-update', $item) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="number" class="form-control change-qty" name="quantity"
                                            value="{{ $item->quantity }}">
                                    </form>
                                </td>
                                <td>{{ $item->sub_total }}</td>
                                <td>
                                    <form action="{{ route('cart.items.destroy', $item) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (\Session::has('message'))
                    <div class="alert alert-warning">
                        {!! \Session::get('message') !!}
                    </div>
                @endif

                @if ($cart->promocodes->first())
                    @if ($cart->promocodes->contains($cart->promocodes->first()->id))
                        <p>Промокод успешно применён<a href="{{ route('cart-cancel-promocode') }}" class="mx-2 btn btn-sm btn-dark">отменить промокод</a></p>
                    @endif
                @else
                    <form action="{{ route('cart-apply-promocode') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Введите промокод</label>
                            <input type="text" name="promocode" id="" class="form-control" placeholder="">
                        </div>
                        <button class="btn btn-dark">Применить</button>
                    </form>
                @endif
            </div>
            <div class="col-lg-4 col-12">
                <div class="col-5 border-3 bg-dark text-light d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-2">Итого</h3>
                    <p class="mb-2">Сумма заказа:</p>
                    <h4 class="mb-2">{{ priceFormat($cart->getTotalPrice()) }}</h4>

                    <a class="btn btn-sm btn-light text-dark my-2" href="{{ route('app.checkout') }}">Оформить заказ</a>
                </div>
            </div>
        </div>
    @else
        <h3 class="header-cart mx-3">У вас ещё нет товаров!</h3>
        <a href="/" class="btn btn-dark my-5">Вернуться на главную</a>
    @endif
@endsection

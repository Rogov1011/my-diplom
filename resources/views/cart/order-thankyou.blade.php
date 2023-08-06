@extends('app');

@section('title','Спасибо за заказ!!!')
@section('content')

    <h1 class="my-5">Спасибо за заказ!!!</h1>


    <p class="mb-3">Ваш заказ №{{ $order->id }} успешно оформлен! Статус заказа - {{ __('statuses.'.$order->status) }}</p>
    <div>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark text-center">
                    <td>id</td>
                    <td>ФИО</td>
                    <td>Товары</td>
                    <td>Количество</td>
                    <td>Цена</td>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{$order->id}}</td>
                    <td>{{$order->getCustomerFullName()}}</td>
                    <td>
                        <ul>
                            @foreach ($order->items as $item)
                                <li class="list-unstyled">{{ $item->product->title }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($order->items as $item)
                                <li class="list-unstyled">{{ $item->quantity . ' шт.'}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{priceFormat($order->total_sum)}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="/" class="btn btn-dark">Вернуться на главную</a>
@endsection

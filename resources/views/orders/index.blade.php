@extends('app');

@section('title','Ваши заказы')
@section('content')

    <h1 class="my-5">Ваши заказы</h1>
    <div>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark text-center">
                    <td>ФИО</td>
                    <td>Телефон</td>
                    <td>Email</td>
                    <td>Заказ номер</td>
                    <td>Статус заказа</td>
                    <td>Сумма</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="text-center">
                    <td>{{$order->getCustomerFullName()}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{$order->status}}</td>
                    <td>{{priceFormat($order->total_sum)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/" class="btn btn-dark">Вернуться на главную</a>
@endsection
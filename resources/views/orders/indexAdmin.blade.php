@extends('app')

@section('title', "Заказы")
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Заказы</h2>
</div>

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
            @foreach ($orders as $order)
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
                            <li class="list-unstyled">{{ $item->quantity . ' шт.' }}</li>
                        @endforeach
                    </ul>
                </td>

                <td>{{priceFormat($order->total_sum)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
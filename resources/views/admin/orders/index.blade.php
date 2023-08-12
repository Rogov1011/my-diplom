@extends('app')

@section('title','Все Заказы')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Все Заказы</h2>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark text-center">
                    <td>id заказа</td>
                    <td>Дата</td>
                    <td>ФИО</td>
                    <td>Email</td>
                    <td>Товары</td>
                    <td>Количество</td>
                    <td>Цена</td>
                    <td>Статус</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="text-center">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->getCustomerFullName() }}</td>
                        <td>{{ $order->email }}</td>
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

                        <td>{{ priceFormat($order->total_sum) }}</td>
                        <td>
                            <form action="{{ route("order.change-status", $order) }}" method="GET">
                                <select name="status" id="" class="changeStatus">
                                    <option value="in_process" @if ($order->status == "in_process") selected @endif>
                                        {{ __('В обработке') }}
                                    </option>
                                    <option class="bg-light text-dark" value="finished" @if ($order->status == "finished") selected @endif>>
                                        {{ __('Завершен') }}
                                    </option>
                                    <option class="bg-light text-dark" value="canceled" @if ($order->status == "canceled") selected @endif>>
                                        {{ __('Отменен') }}
                                    </option>
                                    <option class="bg-light text-dark" value="paid" @if ($order->status == "paid") selected @endif>>
                                        {{ __('Оплачен') }}
                                    </option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
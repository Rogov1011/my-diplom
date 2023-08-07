<h3>Здраствуйте, {{ $order->user_name }}</h3>

<p>Вы успешно оформили заказ № {{ $order->id }}</p>

<h4>Состав заказа</h4>

<table>
    <tr>
        <td>Товары</td>
        <td>Цена</td>
        <td>Количество</td>
        <td>Итого</td>
    </tr>
    <tr>
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
                    <li class="list-unstyled">{{ priceFormat($item->price)}}</li>
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
    </tr>
</table>

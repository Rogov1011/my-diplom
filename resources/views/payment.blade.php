@extends('app')

@section('title', 'Способы оплаты')
@section('content')
    <div class="container my-3">
        <h3>Способы оплаты</h3>
        <ul>
            <li>Удобная оплата</li>
            <li>Легкий возврат денежных средств</li>
            <li>Работаем с физическими и юридическими лицами (все цены на сайте указаны с НДС)</li>
        </ul>
    </div>
    <div class="container my-3">
        <h3>Банковские карты</h3>
        <p>Оплатить картой можно только при оформлении заказа на сайте.Мы принимаем к оплате:</p>
        <div class="d-flex gap-4">
            <img src="{{ asset('assets/images/mir.png') }}" width="150px" alt="">
            <img src="{{ asset('assets/images/visa.png') }}" width="150px" alt="">
            <img src="{{ asset('assets/images/visaelect.png') }}" width="150px" alt="">
        </div>
        <p class="my-4">Важно! При оплате банковской картой комиссия не взимается.</p>
    </div>
    <div class="container my-3">
        <h3>Кредит</h3>
        <p>При оплате товаров на нашем сайте Вы можете оформить покупку в кредит. Процедура оформления кредита производится онлайн и не занимает много времени.</p>
</div 
@endsection

@extends('app')

@section('title', 'Товар')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <img src="{{ $products->getImage() }}" alt="" style="width: 300px">
        <div class="container">
            <h2 class="my-5">{{ $products->title }}</h2>
            <p>{{ $products->description }}</p>
        </div>
    </div>
    <h2 class="my-5">{{ $products->getPrice() }}</h2>
    @if ($products->quantity == 0)
        <h6 class="card-title fs-5 text-dark my-3"> нет в наличии</h6>
    @else
        <div class="card-head">
            <h6 class="card-title fs-5 text-dark my-3">{{ $products->quantity }} шт. в наличии
            </h6>
        </div>
    @endif
    @if (auth()->user())
        @if ($products->quantity == 0)
            <button class="btn btn-light">В
                корзину</button>
        @else
            <a href="{{-- route('cart.add-product',$product) --}}" type="button" class="btn btn-dark add-to-cart">В
                корзину</a>
        @endif
    @else
        <button class="btn btn-dark open-popup-auth">В корзину</button>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection

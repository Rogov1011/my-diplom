@extends('app')

@section('title', 'Товар')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
    </div>
    <div>
        <div>
            <img src="{{ $products->getImage() }}" alt="" style="width: 300px">
        </div>
        <h2 class="my-5">{{ $products->title }}</h2>
        <h2 class="my-5">{{ $products->getPrice() }}</h2>
        <p>{{ $products->description }}</p>
        @if (auth()->user())
            <a href="{{-- route('cart.add-product',$product) --}}" type="button" class="btn btn-dark add-to-cart">В
                корзину</a>
        @else
            <a href="{{ route('auth.login') }}" type="button" class="btn btn-dark">В корзину</a>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection

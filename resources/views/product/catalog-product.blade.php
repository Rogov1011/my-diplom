@extends('app')

@section('title', 'Главная страница')

@section('content')
    @if ($products->count())
        @if (session('success_register'))
            <div class="alert alert-dark col-6 message_register">
                {{ session('success_register') }}
            </div>
        @endif
        <div class="content">
            <div class="owl-carousel owl-theme my-2 z-0" id="slider">
                @if ($images->count())
                    @foreach ($images as $image)
                        <div class="slyder_picture_block">
                            <img class="d-flex" src="{{ $image->getImage() }}" alt=""
                                style="width: 645px; height:300px">
                        </div>
                    @endforeach
                @else
                    <div class="slyder_picture_block"><img src="{{ asset('assets/images/b-finland_2.webp') }}"
                            alt=""></div>
                    <div class="slyder_picture_block"><img src="{{ asset('assets/images/b-steher.webp') }}" alt="">
                    </div>
                @endif
            </div>
            @if ($promocodes->count())
                <div class="promo d-flex my-4"><img src="{{ asset('assets/images/promo.jpg') }}" alt="">
                    <h2 class="mx-4 text-danger">
                        @foreach ($promocodes as $promocode)
                            {{ $promocode->code }}
                        @endforeach
                    </h2>
                    <h3 class="my-1">Скидка по промокоду @foreach ($promocodes as $promocode)
                            {{ priceFormat($promocode->discount) }}
                        @endforeach
                    </h3>
                </div>
            @endif
            <form action="{{ route('searchProduct') }}" method="GET"
                class="mb-5 d-flex justify-content-center align-items-center">
                <input type="text" name="searchCatalog" placeholder="Введите запрос" class="col-6">
                <button class="btn btn-dark mx-3">Найти</button>
                <a class="mx-3 text-decoration-none text-dark" href="/">Сбросить фильтр</a>
            </form>
            <div class="card-head">
                <h3 class="card-title text-center my-5">{{ $subcategory->name }}</h3>
            </div>
            <div class="row col-11">
                @foreach ($products as $product)
                    @if ($product->is_published == 0)
                        <h3 class="d-flex justify-content-center">Извините товаров пока нет!!!</h3>
                    @else
                        <div class="col-lg-3">
                            <div class="card mb-5 col-12 d-flex justify-content-center align-items-center">
                                <div class="card-head">
                                    <h6 class="card-title text-center fs-5">{{ $product->title }}</h6>
                                </div>
                                <img src="{{ $product->getImage() }}" alt="" style="width:100px; height:100px">
                                <div class="card-head">
                                    <h3 class="card-title text-center text-dark">{{ priceFormat($product->price) }}</h3>
                                </div>
                                <div class="container d-flex justify-content-between px-4">
                                    <a href="{{ route('showProducts', $product) }}"
                                        class="btn btn-sm btn-dark my-2">Перейти</a>
                                    @if (auth()->user())
                                        @if ($product->quantity == 0)
                                            <button class="btn btn-sm btn-light my-2">В
                                                корзину</button>
                                        @else
                                            <a href="{{ route('cart.add-product', $product) }}" type="button"
                                                class="btn btn-sm btn-dark my-2 add-to-cart">В
                                                корзину</a>
                                        @endif
                                    @else
                                        <button class="btn btn-sm btn-dark my-2 open-popup-auth">В корзину</button>
                                    @endif
                                </div>
                                @if ($product->quantity == 0)
                                    <h6 class="card-title text-center fs-5 text-dark"> нет в наличии</h6>
                                @else
                                    <div class="card-head">
                                        <h6 class="card-title text-center fs-5 text-dark">{{ $product->quantity }} шт.
                                        </h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <h3 class="d-flex justify-content-center my-3">Ещё нет добавленных товаров</h3>
    @endif
    </div>
@endsection

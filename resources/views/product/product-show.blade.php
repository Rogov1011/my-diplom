@extends('app')

@section('title', 'Товар')
@section('content')
    <div class="d-flex justify-content-between">
        <img class="max_min imageShow" src="{{ $products->getImage() }}" alt="" style="width: 400px; height: 400px">
        <div class="container mx-4 col-7">
            <h2 class="my-5">{{ $products->title }}</h2>
            <p>{{ $products->description }}</p>
            <h2 class="my-2">{{ priceFormat($products->price) }}</h2>
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
                    <a href="{{ route('cart.add-product', $products) }}" type="button" class="btn btn-dark add-to-cart">В
                        корзину</a>
                @endif
            @else
                <button class="btn btn-dark open-popup-auth mx-2">В корзину</button>
            @endif
            <button class="btn btn-dark open-popup-auth my-4" onclick=history.back()>Назад</button>
        </div>
    </div>
    <div class="owl-carousel owl-theme z-0 my-4 imageShow" id="slider">
        <div class="slyder_picture_block imageShowSlider"><img src="{{ asset('assets/images/b-wolfcraft.webp') }}" alt="">
        </div>
        <div class="slyder_picture_block imageShowSlider"><img src="{{ asset('assets/images/banner_stanki.webp') }}" alt="">
        </div>
    </div>
    <div class="pupupFullscreen">
        <div class=".pupup_content_full d-flex justify-content-center">
            <div class="full_img"><img class="max_min" src="{{ $products->getImage() }}" alt=""
                    style="width: 800px; height: 800px"></div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection

@extends('app')

@section('title', 'Главная страница')

@section('content')
    @if ($subCategory->count())
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
            <h3 class="my-2 d-flex justify-content-center">Подкатегории товаров</h3>
            <div class="row my-4">
                @foreach ($subCategory as $subCat)
                    <div class="col-lg-3">
                        <div class="card mb-5 col-12 d-flex justify-content-center align-items-center">
                            <img src="{{ $subCat->getImage() }}" alt="" style="width:150px; height:100px">
                            <div class="card-head">
                                <h6 class="card-title text-center fs-5">{{ $subCat->name }}</h6>
                            </div>
                            <a href="{{ route('app.catalog-by-products', $subCat) }}"
                                class="btn btn-sm btn-dark my-2">Перейти</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h3 class="d-flex justify-content-center my-3">Ещё нет добавленных товаров</h3>
    @endif
    </div>
@endsection

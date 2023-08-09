@extends('app')

@section('title', 'Главная страница')

@section('content')
    @if (session('success_register'))
        <div class="alert alert-dark col-6 message_register">
            {{ session('success_register') }}
        </div>
    @endif
    <div class="content">
        <div class="owl-carousel owl-theme my-2 z-0" id="slider">
            <div class="slyder_picture_block"><img src="{{ asset('assets/images/b-finland_2.webp') }}" alt=""></div>
            <div class="slyder_picture_block"><img src="{{ asset('assets/images/b-steher.webp') }}" alt=""></div>
        </div>
        <div class="promo d-flex my-4"><img src="{{ asset('assets/images/promo.jpg') }}" alt="">
            <h2 class="mx-4 text-danger">LETO</h2>
            <h3>Скидка по промокоду 500 рублей</h3>
        </div>
        <h3 class="my-2 d-flex justify-content-center">Категории товаров</h3>
        <tbody>
            <div class="row my-4">
                @foreach ($categories as $category)
                    <div class="col-lg-3">
                        <div class="card mb-5 col-12 d-flex justify-content-center align-items-center">
                            <img src="{{ $category->getImage() }}" alt="" style="width:150px; height:100px">
                            <div class="card-head">
                                <h6 class="card-title text-center fs-5">{{ $category->name }}</h6>
                            </div>
                            <a href="{{ route("app.catalog-by-subCategories", $category) }}" class="btn btn-sm btn-dark my-2">Перейти</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group">
                @if ($products->count() > 11)
                    @if ($products->currentPage() > 1)
                        <a href="{{ $products->previousPageUrl() }}" type="button" class="btn btn-lg btn-primary">
                            <</a>
                    @endif
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <a href="{{ $products->url($i) }}" type="button"
                            class="btn btn-lg @if ($i == $products->currentPage()) btn-primary @else btn-outline-primary @endif">{{ $i }}</a>
                    @endfor
                    @if ($products->currentPage() != $products->lastPage())
                        <a href="{{ $products->nextPageUrl() }}" type="button" class="btn btn-lg btn-primary">></a>
                    @endif
                @endif
            </div>
        </div> --}}
        </tbody>
    </div>
@endsection

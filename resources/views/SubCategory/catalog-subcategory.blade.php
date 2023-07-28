@extends('app')

@section('title', 'Главная страница')

@section('content')
    <h1 class="my-5 text-center">Категории товаров</h1>
    @if (session('success_register'))
        <div class="alert alert-dark col-6 message_register">
            {{ session('success_register') }}
        </div>
    @endif
    <div class="content">
        <form action="" method="GET" class="mb-5 d-flex justify-content-center align-items-center">
            <input type="text" name="search" placeholder="Введите запрос" class="col-6">
            <button class="btn btn-dark mx-3">Найти</button>
            <a class="mx-3 text-decoration-none text-dark" href="/">Сбросить фильтр</a>
        </form>
        <tbody>
            <div class="row">
                @foreach ($subCategory as $subCat)
                    <div class="col-lg-3">
                        <div class="card mb-5 col-12 d-flex justify-content-center align-items-center">
                            <img src="{{ $subCat->getImage() }}" alt="" style="width:150px; height:100px">
                            <div class="card-head">
                                <h6 class="card-title text-center fs-5">{{ $subCat->name }}</h6>
                            </div>
                            <a href="" class="btn btn-sm btn-dark my-2">Перейти</a>
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

@extends('app')

@section('title', 'Товары')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Товары</h2>
        <div class="container">
            <form action="{{ route("search") }}" method="GET" class="d-flex">
                <input type="text" name="search" id="search" placeholder="Введите запрос" class="col-6">
                <button class="btn btn-dark mx-3">Найти</button>
                <a class="mx-3 text-decoration-none text-dark" href="{{ route("indexProduct") }}">Сбросить фильтр</a>
            </form>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-dark">Добавить</a>
    </div>
    @if ($products->count())
        <div>
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <td>Товар</td>
                        <td>Подкатегория</td>
                        <td>Категория</td>
                        <td>Изображение</td>
                        <td>Наличие</td>
                        <td>Опубликовано</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="fw-bold">{{ $product->title }}</td>
                            <td>{{ $product->subcategory->name }}</td>
                            <td>{{ $product->subCategory->category->name }}</td>
                            <td>
                                <img src="{{ $product->getImage() }}" alt="" style="width: 50px; height: 50px">
                            </td>
                            <td>
                                @if ($product->quantity == 0)
                                    <p class="card-title text-center text-dark"> нет в наличии</p>
                                @else
                                    <div class="card-head">
                                        <p class="card-title text-center text-dark">{{ $product->quantity }} шт.
                                        </p>
                                    </div>
                                @endif
                            </td>
                            <td>{!! $product->Is_PublishedStatus() !!}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-sm btn-success">Ред.</a>
                                    <form action="{{ route('products.delete', $product->id) }}" method="POST"
                                        class="mx-3">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick='event.preventDefault();if(confirm("Запись бдет удалена. Продолжить?")){this.closest("form").submit();}'>Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3>Здесь нет ещё добавленных товаров</h3>
    @endif
@endsection

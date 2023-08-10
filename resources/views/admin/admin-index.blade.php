@extends('app')

@section('title', 'Страница администратора')

@section('content')
    <h1 class="my-5 text-center">Привет Администратор</h1>
    <div class="content d-flex gap-4">
        <div class="col-6">
            <h3 class="d-flex justify-content-center bg-dark text-light">Управление товарами</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('indexCategory') }}">Категория товаров</a>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                            <a href="{{ route('indexCategory') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('indexSubCategory') }}">Подкатегория
                                товаров</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('Subcategories.create') }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                            <a href="{{ route('indexSubCategory') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('indexProduct') }}">Товары</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                            <a href="{{ route('indexProduct') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('images.index') }}">Картинки на главный экран</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('images.create') }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                            <a href="{{ route('images.index') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('promocodes.index') }}">Промокоды</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('promocodes.create') }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                            <a href="{{ route('promocodes.index') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h3 class="d-flex justify-content-center bg-dark text-light">Управление пользователями</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('orders.index') }}">Заказы</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('users.index') }}">Пользователи</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="text-decoration-none text-dark" href="{{ route('roles.index') }}">Создание роли для
                                пользователя</a></td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-dark">Вернуться на главную</a>
@endsection

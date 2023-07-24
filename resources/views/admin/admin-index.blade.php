@extends('app')

@section('title', 'Страница администратора')

@section('content')
    <h1 class="my-5 text-center">Привет Администратор</h1>
    <div class="content">
        <table class="table table-striped">

            <tbody>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="">Категория товаров</a></td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route("categories.create") }}" class="btn btn-sm btn-dark mx-2">Создать</a>
                        <a href="{{ route("indexCategory") }}" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="">Подкатегория товаров</a></td>
                    <td class="d-flex justify-content-end">
                        <a href="" class="btn btn-sm btn-dark mx-2">Создать</a>
                        <a href="" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="">Товары</a></td>
                    <td class="d-flex justify-content-end">
                        <a href="" class="btn btn-sm btn-dark mx-2">Создать</a>
                        <a href="" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="">Заказы</a></td>
                    <td class="d-flex justify-content-end">
                        <a href="" class="btn btn-sm btn-success mx-2">Редактировать</a>
                        <a href="" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="">Пользователи</a></td>
                    <td class="d-flex justify-content-end">
                        <a href="" class="btn btn-sm btn-success mx-2">Редактировать</a>
                        <a href="" class="btn btn-sm btn-secondary mx-2">Просмотреть</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
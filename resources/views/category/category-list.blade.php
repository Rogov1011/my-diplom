@extends('app')

@section('title', 'Категории')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Категории</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-dark">Добавить</a>
    </div>
    @if ($categories->count())
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Изображение</td>
                        <td>Категории</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <img src="{{ $category->getImage() }}" alt="" style="width: 80px">
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="d-flex">
                             <a href="{{ route('categories.edit', $category->id) }}"
                                 class="btn btn-sm btn-success">Редактировать</a>
                             <form action="{{ route('categories.delete', $category->id) }}" method="POST" class="mx-3">
                                 @csrf @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                             </form>
                         </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h3>Здесь нет ещё добавленных категорий</h3>
        @endif
@endsection

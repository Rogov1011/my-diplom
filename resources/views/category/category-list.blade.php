@extends('app')

@section('title', 'Категории')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Категории</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-dark">Добавить</a>
    </div>
    @if ($categories->count())
        <div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <td>Категория</td>
                        <td>Изображение</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="fw-bold">{{ $category->name }}</td>
                            <td>
                                <img src="{{ $category->getImage() }}" alt="" style="width: 80px">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                             <a href="{{ route('categories.edit', $category->id) }}"
                                 class="btn btn-sm btn-success">Ред.</a>
                             <form action="{{ route('categories.delete', $category->id) }}" method="POST" class="mx-3">
                                 @csrf @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger" onclick='event.preventDefault();if(confirm("Запись бдет удалена. Продолжить?")){this.closest("form").submit();}'>Удалить</button>
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

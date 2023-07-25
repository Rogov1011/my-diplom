@extends('app')

@section('title', 'Категории')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Подкатегории</h2>
        <a href="{{ route('Subcategories.create') }}" class="btn btn-dark">Добавить</a>
    </div>
    @if ($subCategories->count())
        <div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <td>Подкатегория</td>
                        <td>Категория</td>
                        <td>Изображение</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subCategories as $subCategory)
                        <tr>
                            <td class="fw-bold">{{ $subCategory->name }}</td>
                            <td>{{ $subCategory->category->name }}</td>
                            <td>
                                <img src="{{ $subCategory->getImage() }}" alt="" style="width: 100px">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('Subcategories.edit', $subCategory->id) }}"
                                        class="btn btn-sm btn-success">Ред.</a>
                                    <form action="{{ route('Subcategories.delete', $subCategory->id) }}" method="POST"
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
        <h3>Здесь нет ещё добавленных подкатегорий</h3>
    @endif
@endsection

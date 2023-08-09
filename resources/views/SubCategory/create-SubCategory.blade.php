@extends('app')

@section('title', 'Новая подкатегория')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        @if ($categories->count())
        <h2>Новая подкатегория</h2>
    </div>

    <div>
        <form action="{{ route('Subcategories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Выберите категорию</label>
                <select name="category_id" class="form-select">
                    <option value="">Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name" class="form-label">Название подкатегории</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-dark my-5">Добавить</button>
        </form>
    </div>
    @else
    <h3>Добавьте сначала категорию товара</h3>
    @endif
@endsection

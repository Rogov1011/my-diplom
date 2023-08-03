@extends('app')

@section('title', __('Новый товар'))
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        @if ($subCategories->count())
            <h2>Новый товар</h2>
    </div>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group mb-3">
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
            </div> --}}
            <div class="d-flex gap-4">
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="subcategory_id" class="form-label">Выберите подкатегорию</label>
                        <select name="subcategory_id" class="form-select">
                            <option value="">Выберите подкатегорию</option>
                            @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Название товара</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Стоимость</label>
                        <input type="text" name="price" class="form-control">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="quantity" class="form-label">Количество</label>
                        <input type="text" name="quantity" class="form-control">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea type="text" name="description" class="form-control"></textarea>
                @error('description')
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
            <div class="form-group my-3">
                <label for="is_published" class="form-label">
                    <input type="checkbox" id="is_published" name="is_published" class="form-check-input" value="1" @if(old("is_published") == 1) checked @endif> опубликовать
                </label>
            </div>
            <button class="btn btn-dark my-5">Добавить</button>
        </form>
    </div>
@else
    <h3>Добавьте сначала подкатегорию товара</h3>
    @endif
@endsection

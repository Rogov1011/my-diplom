@extends('app')

@section('title', $subCategory->name . '(ред.)')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{ $subCategory->name . '(ред.)' }}</h2>
    </div>

    <div>
        <form action="{{ route('Subcategories.update', $subCategory) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Выберите категорию</label>
                <select name="category_id" class="form-select">
                    <option value="">Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id', $subCategory->category_id)) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Имя категории</label>
                <input type="text" name="name" class="form-control" value="{{ $subCategory->name }}">
            </div>
            <div>
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" class="form-control">
            </div>
            @if ($subCategory->image)
                <div class="my-3">
                    <img src="{{ $subCategory->getImage() }}" alt="" style="width: 150px">
                    <a class="btn btn-sm btn-danger" href="{{ route('SubCategory.removeImage', $subCategory->id) }}">удалить
                        картинку</a>
                </div>
            @endif
            <button class="btn btn-dark my-3">Сохранить</button>
        </form>
    </div>

@endsection

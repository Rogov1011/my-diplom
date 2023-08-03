@extends('app')

@section('title', $products->title . '(ред.)')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{ $products->title . '(ред.)' }}</h2>
    </div>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="d-flex gap-4">
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="subcategory_id" class="form-label">Выберите подкатегорию</label>
                        <select name="subcategory_id" class="form-select">
                            <option value="">Выберите подкатегорию</option>
                            @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @if ($subCategory->id == old('subcategory_id', $products->subcategory_id)) selected @endif>
                                {{ $subCategory->name }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Название товара</label>
                        <input type="text" name="title" class="form-control" value="{{ $products->title }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Стоимость</label>
                        <input type="text" name="price" class="form-control" value="{{ $products->price }}">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="quantity" class="form-label">Количество</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $products->quantity }}">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea type="text" name="description" class="form-control">{{ $products->description }}</textarea>
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
            @if ($products->image)
                <div class="my-3">
                    <img src="{{ $products->getImage() }}" alt="" style="width: 150px">
                    <a class="btn btn-sm btn-danger" href="{{ route('products.removeImage', $products->id) }}">удалить
                        картинку</a>
                </div>
            @endif
            <div class="form-group my-3">
                <label for="is_published" class="form-label">
                    <input type="checkbox" id="is_published" name="is_published" class="form-check-input" value="1"
                        @if (old('is_published') == 1) checked @endif> Опубликовать
                </label>
            </div>
            <button class="btn btn-dark my-5">Сохранить</button>
        </form>
    </div>
@endsection

@extends('app')

@section('title', __('Новая категория'))
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Новая категория</h2>
    </div>

    <div>
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Название категории</label>
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

@endsection

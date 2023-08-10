@extends('app')

@section('title', 'Новая картинка')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
            <h2>Новая картинка</h2>
    </div>

    <div>
        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Название картинки</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="images" class="form-label">Изображение</label>
                <input type="file" name="images" class="form-control">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-dark my-5">Добавить</button>
        </form>
    </div>
@endsection

@extends('app')

@section('title', 'Новый промокод')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Новый промокод</h2>
    </div>

    <div>
        <form class="col-6" action="{{ route('promocodes.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="code" class="form-label">Название промокода</label>
                <input type="text" name="code" class="form-control">
                @error('code')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="count" class="form-label">Количество</label>
                <input type="text" name="count" class="form-control">
                @error('count')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="discount" class="form-label">Цена скидки</label>
                <input type="text" name="discount" class="form-control">
                @error('discount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-dark my-5">Добавить</button>
        </form>
    </div>
@endsection

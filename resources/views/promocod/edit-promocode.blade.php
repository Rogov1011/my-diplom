@extends('app')

@section('title', $promocodes->code . '(ред.)')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{ $promocodes->code . '(ред.)' }}</h2>
    </div>
    <div>
        <form action="{{ route('promocodes.update', $promocodes) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group mb-3">
                <label for="" class="form-label">Имя промокода</label>
                <input type="text" name="code" class="form-control" value="{{ $promocodes->code }}">
            </div>
            <div>
                <label for="count" class="form-label">Количество</label>
                <input type="text" name="count" class="form-control" value="{{ $promocodes->count }}">
            </div>
            <div>
                <label for="discount" class="form-label">Стоимость скидки</label>
                <input type="text" name="discount" class="form-control" value="{{ $promocodes->discount }}">
            </div>
            <button class="btn btn-dark my-3">Сохранить</button>
        </form>
    </div>

@endsection

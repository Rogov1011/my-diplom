@extends('app')

@section('title', "Создание роли")
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Создание роли</h2>
</div>

<div>
    <form action="{{route("roles.store")}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Название роли</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-dark">Добавить</button>
    </form>
</div>
    
@endsection
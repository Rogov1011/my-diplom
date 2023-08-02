@extends('app')

@section('title', $role->name)
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{ $role->name }}</h2>
    </div>
    <div>
        <form action="{{ route('roles.update' , $role) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group mb-3">
                <label for="name" class="form-label">Название роли</label>
                <input type="text" name="name" 
                class="form-control" value="{{old("name", $role->name)}}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-dark">Сохранить</button>
        </form>
    </div>

@endsection

@extends('app')

@section('title', "Регистрация")
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Регистрация</h2>
</div>
<div class="col-6">
    <h3>Новый пользователь</h3>
    <p>После регистрации на сайте вам будет доступно отслеживание состояния заказов, личный кабинет и другие новые возможности.</p>
</div>
<div>
    <form class="col-6 my-5" action="{{ route("auth.store-user") }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Ваше имя</label value="{{old("name")}}">
            <input type="text" name="name" class="form-control">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Ваш email</label value="{{old("email")}}">
            <input type="text" id="email" name="email" class="form-control">
            @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation" class="form-label">Повторите Пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            @error('password_confirmation')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button class="btn btn-dark my-3">Регистрация</button>
    </form>
</div>
    
@endsection
@extends('app')

@section('title', "Пользовотели")
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Пользователи</h2>
</div>

<div>
    <table class="table table-striped text-center">
        <thead class="table-dark">
            <tr>
                <td>ФИО</td>
                <td>email</td>
                <td>Роли</td>
                <td>Действие</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->getRoles()}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route("users.edit", $user) }}" class="btn btn-sm btn-success">Редактировать</a>
                    <form action="" method="POST" class="mx-3">
                        @csrf @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-dark">Заблокировать</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
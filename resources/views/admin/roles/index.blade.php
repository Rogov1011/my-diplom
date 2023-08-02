@extends('app')

@section('title', 'Роли')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Роли</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-dark">Добавить</a>
    </div>

    <div class="container col-8">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <td>Роль</td>
                    <td class="d-flex text-center">Действие</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">Редактировать</a>
                            <form action="" method="POST" class="mx-3">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

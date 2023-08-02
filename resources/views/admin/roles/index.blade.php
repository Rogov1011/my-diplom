@extends('app')

@section('title', 'Роли')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Роли</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-dark">Добавить</a>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <td>Роль</td>
                    <td class="d-flex">Действие</td>
                </tr>
            </thead>
            <tbody class="col-4">
                @foreach ($roles as $role)
                    <tr>
                        <td class="col-9">{{ $role->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-success">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

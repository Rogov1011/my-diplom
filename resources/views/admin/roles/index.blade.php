@extends('app')

@section('title', 'Роли')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Роли</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-dark">Добавить</a>
    </div>
    <div class="row col-6">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <td>Роль</td>
                    <td>Действие</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="text-center">
                        <td class="col-9">{{ $role->name }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-success">Редактировать</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

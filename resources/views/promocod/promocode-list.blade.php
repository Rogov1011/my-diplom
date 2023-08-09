@extends('app')

@section('title', 'Промокоды')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Промокоды</h2>
        <a href="{{ route("promocodes.create") }}" class="btn btn-dark">Добавить</a>
    </div>
    @if ($promocodes->count())
        <div>
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <td>Название промокода</td>
                        <td>Количество</td>
                        <td>Стоимость скидки</td>
                        <td>Действие</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promocodes as $promocode)
                        <tr>
                            <td class="fw-bold">{{ $promocode->code }}</td>
                            <td>{{ $promocode->count }}</td>
                            <td>{{ priceFormat($promocode->discount) }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('promocodes.edit', $promocode->id) }}"
                                        class="btn btn-sm btn-success">Ред.</a>
                                    <form action="{{ route('promocodes.destroy', $promocode->id) }}" method="POST"
                                        class="mx-3">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick='event.preventDefault();if(confirm("Запись бдет удалена. Продолжить?")){this.closest("form").submit();}'>Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3>Здесь нет ещё добавленных подкатегорий</h3>
    @endif
@endsection

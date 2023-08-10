@extends('app')

@section('title', 'Картинки на главныцй экран')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Картинки на главный экран</h2>
        <a href="{{ route("images.create") }}" class="btn btn-dark">Добавить</a>
    </div>
    @if ($images->count())
        <div>
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <td>Название картинки</td>
                        <td>Картинка</td>
                        <td>Действие</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td class="fw-bold">{{ $image->name }}</td>
                            <td><img src="{{ $image->getImage() }}" alt="" style="width: 70px; height:70px"></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('images.edit', $image->id) }}"
                                        class="btn btn-sm btn-success">Ред.</a>
                                    <form action="{{ route('images.destroy', $image->id) }}" method="POST"
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
        <h3>Здесь нет ещё добавленных картинок</h3>
    @endif
@endsection

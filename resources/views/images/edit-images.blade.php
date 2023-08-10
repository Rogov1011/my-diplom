@extends('app')

@section('title', $images->name . '(ред.)')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{ $images->name . '(ред.)' }}</h2>
    </div>
    <div>
        <form action="{{route("images.update", $images)}}" method="POST" enctype="multipart/form-data">
            @csrf @method("PUT")
            <div class="form-group mb-3">
                <label for="" class="form-label">Имя категории</label>
                <input type="text" name="name" class="form-control" value="{{$images->name}}">
            </div>
            <div>
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" class="form-control">
            </div>
            @if ($images->images)
            <div class="my-3">
                <img src="{{ $images->getImage() }}" alt="" style="width: 150px">
            </div>
            @endif
            <button class="btn btn-dark my-3">Сохранить</button>
        </form>
    </div>

@endsection

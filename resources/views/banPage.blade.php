@extends('app')

@section('title', 'БАН')
@section('content')
<div class="containerBan d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-dark d-flex justify-content-center align-items-center">ВЫ ЗАБАНЕНЫ!!!!</h1>
    <img src="{{ asset('assets/icon/sad.png') }}" alt="">
</div>
@endsection
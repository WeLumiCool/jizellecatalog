@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
            <div class="shadow-lg p-5 rounded">
                <div class="mb-3">
                    <img src="{{ asset('images/logo.svg') }}" alt="">
                </div>
                <p class="font-size-16 text-center mb-4">
                    Благодарим что оставили  контакты <br>
                    Мы с Вами свяжемся в течении 15 минут
                </p>
                <div class="text-center">
                <a href="/">
                    <button class="btn btn-success px-5 py-2">Вернуться на главную</button>
                </a>
                </div>
            </div>
        </div>
    </div>
@endsection
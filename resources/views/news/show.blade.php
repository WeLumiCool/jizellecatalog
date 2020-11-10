@extends('layouts.app')
@section('content')
    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col-lg-4 col-12">
                <p class="small openSans mb-3 ml-2">Присоединяйтесь к Jizelle в <br> социальных сетях</p>
                <div class="d-flex align-items-center mt-2">
                    <a href="https://api.whatsapp.com/send?phone=996507900300" style="text-decoration: none;">
                        <div class="social bg-white d-flex align-items-center justify-content-center">
                            <i class="fab fa-whatsapp font-size-20"></i>
                        </div>
                    </a>
                    <a href="https://t.me/Jizzele" style="text-decoration: none;">
                        <div class="social bg-white d-flex align-items-center justify-content-center ml-3">
                            <i class="fab fa-telegram-plane font-size-20"></i>
                        </div>
                    </a>
                    {{--<a href="#" style="text-decoration: none;">--}}
                    {{--<div class="social bg-white d-flex align-items-center justify-content-center ml-3">--}}
                    {{--<i class="fab fa-facebook font-size-20"></i>--}}
                    {{--</div>--}}
                    {{--</a>--}}
                    <a href="https://www.instagram.com/jizelle.world/" style="text-decoration: none;">
                        <div class="social bg-white d-flex align-items-center justify-content-center ml-3">
                            <i class="fab fa-instagram font-size-20"></i>
                        </div>
                    </a>
                    <a href="https://vk.com/jizzelle" style="text-decoration: none;">
                        <div class="social bg-white d-flex align-items-center justify-content-center ml-3">
                            <i class="fab fa-vk font-size-20"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
<div class="container py-5">
    <h4 class="font-size-26 font-weight-light openSans text-center text-dark">
        {{$new->title}}
    </h4>
    <div class="text-center">
    <p class="mt-3 openSans font-size-12"
       style="color: #b8b8b8;">{{ \Jenssegers\Date\Date::parse($new->created_at)->format('j F Y г.')}}</p>
        <img class="w-50" src="{{ asset('storage/'.$new->image) }}" alt="">
    </div>
    <div class="mt-4 openSans">
        {!! $new->content !!}
    </div>
</div>

@endsection
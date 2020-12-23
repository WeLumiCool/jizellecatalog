<?php
use Jenssegers\Agent\Agent;

$agent = new Agent();
?>
<nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top menuse shadow-none pt-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="max-width: 115px;" src="{{ asset('images/logo.png') }}" alt="">
        </a>
        @if($agent->isMobile())
            <a href="{{ route('basket') }}">
                <div class="position-relative mr-3">
                    <div class="position-absolute bg-danger d-flex align-items-center justify-content-center cart-index text-white" style="width: 25px; height: 26px; border-radius: 50%; top: -41%; right: -55%; {{ \Illuminate\Support\Facades\Session::has('cart') ? '' : 'display:none;' }}">
                        {{ \Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('count') : 0 }}
                    </div>
                    <img class="ml-3" src="{{ asset('images/cart.svg') }}" alt="">
                </div>
            </a>
            {{--<i class="fas fa-bars fa-2x catalog-list"></i>--}}
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <div class="navbar-nav d-flex align-items-center justify-content-end my-lg-0 my-4">
                <!-- Authentication Links -->
                <div class="ml-lg-0 ml-auto">
                    {{--<div class="">--}}
                        {{--<span style="cursor: pointer;" class="font-size-16 text-dark" data-toggle="modal" data-target="#table" >Таблица размеров</span>--}}
                    {{--</div>--}}
                    <div class="mt-2 d-flex align-items-center justify-content-lg-start justify-content-end">
                        <a href="/" style="text-decoration: none;">
                            <p class="mb-0 menu-point openSans font-size-14 font-weight-bold mx-4 my-lg-0 my-2 text-dark">
                                Главная
                            </p>
                        </a>
                        <a href="{{ route('catalog') }}" style="text-decoration: none;">
                            <p class="mb-0 menu-point openSans font-size-14 font-weight-bold mx-4 my-lg-0 my-2 text-dark">
                                Каталог
                            </p>
                        </a>
                        @if(!$agent->isMobile())
                        <a href="{{ route('basket') }}">
                        <div class="position-relative">
                            <div class="position-absolute bg-danger d-flex align-items-center justify-content-center cart-index text-white" style="width: 25px; height: 26px; border-radius: 50%; top: -41%; right: -55%; {{ \Illuminate\Support\Facades\Session::has('cart') ? '' : 'display:none;' }}">
                                {{ \Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('count') : 0 }}
                            </div>
                            <img class="ml-3" src="{{ asset('images/cart.svg') }}" alt="">
                        </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@push('scripts')
    <script>
        $('#search').on('keyup', function (e) {
            var value = $(e.currentTarget);

            console.log(value.val());
            $.ajax({
                url: '{{ route('search') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": value.val(),
                },
                success: data => {
                    $('.search-content').html(data.html);

                },
                error: () => {
                }
            });
        })
    </script>
@endpush
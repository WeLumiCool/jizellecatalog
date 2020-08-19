<?php
use Jenssegers\Agent\Agent;

$agent = new Agent();
?>
<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">
    <div class="container pb-5 border-bottom">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" src="{{ asset('images/logo.svg') }}" alt="">
        </a>
        @if($agent->isMobile())
            <a href="{{ route('basket') }}">
                <div class="position-relative">
                    <div class="position-absolute bg-danger d-flex align-items-center justify-content-center cart-index text-white" style="width: 25px; height: 26px; border-radius: 50%; top: -41%; right: -55%; {{ \Illuminate\Support\Facades\Session::has('cart') ? '' : 'display:none;' }}">
                        {{ \Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('count') : 0 }}
                    </div>
                    <img class="ml-3" src="{{ asset('images/cart.svg') }}" alt="">
                </div>
            </a>
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
                <div class="">
                    <div class="">
                        <a href="" class="font-size-16 text-dark">ПОМОЩЬ/КОНТАКТЫ</a>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-lg-start justify-content-end">
                        <div class="position-relative">
                            <div class="position-absolute search-content bg-white border rounded" style="right:0%; top: 100%; z-index: 999; width:300px; max-height:200px; overflow-y: auto;">
                            </div>
                        <input style="border: 1px solid #000000; box-sizing: border-box; border-radius: 5px; outline: none!important;" type="text" class="mr-3 px-2 font-size-14 line-height-120 h-100" id="search" placeholder="Поиск...">
                        </div>
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
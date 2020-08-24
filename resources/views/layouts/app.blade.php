<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jizelle</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
</head>
<body>
<div class="preloader">
    <div class="row h-100 align-items-center justify-content-center">
        <img class="img-fluid" src="{{ asset("images/logo.svg") }}" alt="">
    </div>
</div>
    <div id="app">

        @include('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>


    @foreach(\App\Product::all() as $product)
        <div class="modal fade" id="product-{{$product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close position-absolute" style="right:5%; top:5%; z-index:9999;" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/close.svg') }}" alt="">
                    </button>
                    <div class="modal-body text-center p-0">
                        <div class="px-lg-0 px-0 owl-one owl-carousel text-center">
                            @foreach(json_decode($product->image) as $image)
                                <div class="item">
                                    <img class="w-100" src="{{ asset('storage/'.$image) }}" alt="">
                                </div>
                            @endforeach
                            {{--<div class="item">--}}
                                {{--<img class="w-100" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">--}}
                            {{--</div>--}}
                            {{--<div class="item">--}}
                                {{--<img class="w-100" src="{{ asset('storage/'.json_decode($product->image)[1]) }}" alt="">--}}
                            {{--</div>--}}
                        </div>
                        <div class="container pb-3">
                        <div class="d-flex">
                            <div class="col-8">
                                <div class="text-left px-lg-4 px-1">
                                    <p class="font-size-12 text-secondary font-weight-light mb-1">{{$product->article}}</p>
                                    <p class="font-size-18 text-dark mb-1">{{ $product->title }}</p>
                                    <div class="d-flex">
                                        @foreach($product->colors as $color)
                                            <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 px-lg-3 px-0">
                                <div class="d-flex align-items-center justify-content-center add-to-cart mt-3 py-2" data-id="{{ $product->id }}" style="width: 80px; background: #2F2F2F; cursor: pointer; transition: 0.5s">
                                    <img src="{{ asset('images/addcart.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                            <div class="mt-3 px-lg-4 px-1 font-size-16 font-weight-light text-left line-height-110 descer">
                                    {!!$product->description!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="info_map_ip" style="width:1px; height:1px;display:none;opacity:0;"></div>
    @endforeach
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="http://api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173937125-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-173937125-2');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '728311891351725');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=728311891351725&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(66499177, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/66499177" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
@stack('scripts')

<script>
    function preloader() {
        // ymaps.ready(init);

        // function init() {
        //     // Данные о местоположении, определённом по IP
        //     var geolocation = ymaps.geolocation,
        //         // координаты
        //         coords = [geolocation.latitude, geolocation.longitude],
        //         myMap = new ymaps.Map('info_map_ip', {
        //             center: coords,
        //             zoom: 10
        //         });
        //     /*
        //     alert(geolocation.country);
        //     alert(geolocation.city);
        //     alert(geolocation.region);
        //     */
        //     if(geolocation.country.indexOf('Киргизия') >= 0) {
        //         //if(geolocation.region.indexOf('Москва') < 0) {
        //         window.location.href = '/404';
        //     }
        //     else
        //     {
                $('.preloader').fadeOut('slow').delay(1000);
            // }

        // }

    }
</script>
<script>
    setTimeout(preloader, 500);
</script>
    <script>
        $(document).on('click', '.add-to-cart', function (e) {
            var btn = $(e.currentTarget);
            var size = $('#size-' + btn.data('id')).val();
            var color = $('#color-' + btn.data('id')).val();
            var count = $('#count-' + btn.data('id')).val();

            $.ajax({
                url: '{{ route('add_cart') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": btn.data('id'),
                    "color": color,
                    "size": size,
                    "count": count,
                },
                success: data => {
                    btn.addClass('bg-success');
                    setTimeout(function () {
                        btn.removeClass('bg-success');
                    }, 1500);
                    $('.cart-index').html(data.count);
                    $('#settings-' + btn.data('id')).hide();
                },
                error: () => {
                }
            });

            console.log(btn.data('id'));
        });
    </script>
<script>
    $(document).on('click', '.order-settings', function (e) {
        var btn = $(e.currentTarget);

        console.log(btn.data('id'));
        $('#settings-' + btn.data('id')).show();
    });
</script>
<script>
    $(document).on('click', '#close', function (e) {
        var btn = $(e.currentTarget);

        $('#settings-' + btn.data('id')).hide();
    });
</script>
    <script>
        var owl = $('.owl-one');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            // autoplay:true,
            // autoplayTimeout:5000,
            // autoplaySpeed: 1500,
            // autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    </script>
</body>
</html>

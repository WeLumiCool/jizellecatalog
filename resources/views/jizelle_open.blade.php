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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
</head>
<body>
<div class="preloader">
    <div class="row h-100 align-items-center justify-content-center">
        <img class="img-fluid" src="{{ asset("images/logo.svg") }}" alt="">
    </div>
</div>
<?php
$agent = new \Jenssegers\Agent\Agent();
?>
<div id="app">
    <div class="mobile-backdrop"></div>
    <div class="sidebar" id="mobile-catalog">
        <i class="fas fa-times position-absolute fa-lg close-mobile-catalog" style="top:2%; right:10%;"></i>
        <div class="p-4">
            <p class="font-size-18 font-weight-bold mb-5">Каталог</p>

            <p class="font-size-18 btn-link font-weight-light mb-1 text-dark" type="button" data-type="switch" data-id="all">Весь каталог</p>
            @foreach(\App\Category::all() as $category)
                <p class="font-size-18 btn-link font-weight-light mb-1 text-dark" type="button" data-type="switch" data-id="{{ $category->id }}">{{ $category->title }}</p>
            @endforeach
        </div>
    </div>
    @include('partials.header')
    <main class="py-4">
    {{--<!--    --><?php--}}
    {{--//        $product = \App\Product::all()->first();--}}
    {{--//        dd($product->colors);--}}
    {{--//    ?>--}}

    <div class="container main-block">
        <div class="row mb-4 d-lg-block d-none">
            <div class="col-lg-3"></div>
            <div class="col-lg-9 col-12">
                <p class="font-size-20">Весь каталог</p>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="" style="position: sticky; top:20%;">
                    <p class="font-size-18 font-weight-bold mb-5">Каталог</p>

                    <p class="font-size-18 btn-link font-weight-light mb-1 text-dark switcher" type="button" data-type="switch" data-id="all">Весь каталог</p>
                    @foreach($categories as $category)
                        @if(count($category->products))
                            <p class="font-size-18 btn-link font-weight-light text-dark switcher" type="button" data-type="switch" data-id="{{ $category->id }}">{{ $category->title }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-3 col-4 d-lg-none d-block">
                        <p class="font-size-14">Весь каталог</p>
                    </div>
                    <div class="col-lg-9 col-8 d-flex justify-content-lg-start justify-content-end">
                        {{--<div class="mr-5 d-flex align-items-center">--}}
                        {{--<span class="text-secondary font-size-12 mr-2">Размер</span>--}}
                        {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                        {{--</div>--}}
                        <div class="dropdown">
                            <div class="mr-5 d-flex align-items-center position-relative color-filter dropdown-toggle" id="dropdowncolor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                                <span class="text-secondary font-size-12 mr-2 color-title">Все цвета</span>
                                {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                            </div>
                            <input type="hidden" class="color-value">
                            <div class="position-absolute bg-white border p-2 color-list dropdown-menu" aria-labelledby="dropdowncolor">
                                <div class="d-flex align-items-center color-item" data-value="none"><div style="width:15px; height:15px; border-radius:50%; background-color: transparent"></div><span class="color-point ml-3">Все цвета</span></div>
                                @foreach(\App\Color::all() as $color)
                                    <div class="d-flex align-items-center color-item" data-value="{{ $color->id }}"><div class="border" style="width:15px; height:15px; border-radius:50%; background-color: {{$color->color}}"></div><span class="color-point ml-3">{{$color->title}}</span></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown">
                            <div class="d-flex align-items-center position-relative price-filter dropdown-toggle" id="dropdownprice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                                <span class="text-secondary font-size-12 mr-2">Цена</span>
                                {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                            </div>
                            <input type="hidden" class="price-value">
                            <div class="bg-white border p-2 price-list dropdown-menu" aria-labelledby="dropdownprice">
                                <div class="d-flex align-items-center price-item dropdown-item" data-value="0"><span class="price-point ml-3">По возрастанию</span></div>
                                <div class="d-flex align-items-center price-item dropdown-item" data-value="1"><span class="price-point ml-3">По убыванию</span></div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-3">--}}
                    {{--<div class="mr-5 d-flex align-items-center">--}}
                    {{--<span class="text-secondary font-size-12 mr-2">Сортировка по дате</span>--}}
                    {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="row mt-lg-5 mt-3 justify-content-lg-start justify-content-lg-left justify-content-between px-lg-0 px-0" id="products_list">

                </div>
                <div class="row mt-lg-4 mt-1 d-none">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pg-amber justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Пред</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">След</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>






    </main>
    @include('partials.footer')
</div>

@include('modals.size_table')
@foreach(\App\Product::all() as $product)
    <div class="modal productions fade" id="product-{{$product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <p style="cursor: pointer;" class="font-size-12 text-dark mb-1 mt-2 tabled text-left">Таблица размеров</p>
                                </div>
                            </div>
                            <div class="col-4 px-lg-3 px-0">
                                <div class="d-flex align-items-center justify-content-center order-modal-settings mt-3 py-2" data-id="{{ $product->id }}" style="width: 80px; background: #2F2F2F; cursor: pointer; transition: 0.5s">
                                    <img src="{{ asset('images/addcart.svg') }}" alt="">
                                </div>

                            </div>
                        </div>
                        <div class="mt-3 px-lg-4 px-1 font-size-16 font-weight-light text-left line-height-110 descer">
                            {!!$product->description!!}
                        </div>
                    </div>



                    <div class="position-absolute w-100 h-100 px-2 py-lg-5 py-2 bg-white shadow-lg" id="settings-modal-{{$product->id}}" style="top:0%; left:0%; display: none; z-index: 99999;">
                        <div class="d-flex h-100 align-items-center">
                            <div class="w-100">
                                <img class="position-absolute" style="right:6%; top:2%; cursor: pointer;" id="close-modal" data-id="{{ $product->id }}" src="{{ asset('images/close.svg') }}" alt="">
                                <div>
                                    <p class="font-size-16 font-weight-bold text-center">Параметры</p>
                                    <div class="form-group">
                                        <label class="font-size-12" for="size-modal-{{$product->id}}">Выберите размер</label>
                                        <select class="form-control" id="size-modal-{{$product->id}}">
                                            <option>52</option>
                                            <option>54</option>
                                            <option>56</option>
                                            <option>58</option>
                                            <option>60</option>
                                            <option>62</option>
                                        </select>
                                    </div>

                                    @if(count($product->colors) > 1)
                                        <div class="form-group">
                                            <label class="font-size-12" for="color-modal-{{$product->id}}">Выберите цвет</label>
                                            <select class="form-control" id="color-modal-{{$product->id}}">
                                                @foreach($product->colors as $color)
                                                    <option value="{{$color->id}}">{{$color->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <input type="text" hidden id="color-modal-{{$product->id}}" value="{{$product->colors[0]->id}}">
                                    @endif

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="font-size-12" for="count-modal-{{$product->id}}">Введите количество</label>
                                            <input type="text" name="count" id="count-modal-{{$product->id}}" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Введите кол-во" required="" autofocus="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn py-2 text-white position-absolute add-to-cart-modal" data-id="{{ $product->id }}" style="background: #2F2F2F; cursor: pointer;bottom: 20%; width: 90%; left:5%;">В корзину</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{--@include('modals.wish_list')--}}
{{--<div class="position-fixed rounded-circle d-flex align-items-center justify-content-center wish-list" data-toggle="modal" data-target="#wish-list" style="bottom:150px; right:55px; width: 60px; height:60px; background-color: rgba(241,199,18,0.6); z-index: 10; cursor: pointer">--}}
    {{--<i class="fas fa-star fa-lg text-white"></i>--}}
    {{--<div class="position-absolute align-items-center pl-3 wish-list-content" style="width: 150px; right:90%; top:25%; height:50%; border-top-left-radius: 50px; border-bottom-left-radius: 50px; background-color: rgba(241,199,18,0.6); display: none;">Список желаний</div>--}}
{{--</div>--}}

<div id="info_map_ip" style="width:1px; height:1px;display:none;opacity:0;"></div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Facebook Pixel Code -->


@stack('scripts')
<script>
    $('.catalog-list').on('click', function () {
        document.getElementById('mobile-catalog').style.right = "0px";
        $('.mobile-backdrop').show();
    });

    $('.mobile-backdrop').click(function () {
        $('.mobile-backdrop').hide();
        document.getElementById('mobile-catalog').style.right = "-300px";
    });

    $('.close-mobile-catalog').click(function () {
        $('.mobile-backdrop').hide();
        document.getElementById('mobile-catalog').style.right = "-300px";
    });
</script>
<script>
    function preloader() {

                $('.preloader').fadeOut('slow').delay(1000);

    }
</script>
<script>
    setTimeout(preloader);
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
    $(document).on('click', '.add-to-cart-modal', function (e) {
        var btn = $(e.currentTarget);
        var size = $('#size-modal-' + btn.data('id')).val();
        var color = $('#color-modal-' + btn.data('id')).val();
        var count = $('#count-modal-' + btn.data('id')).val();

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
                $('#settings-modal-' + btn.data('id')).hide();
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

    $(document).on('click', '.order-modal-settings', function (e) {
        var btn = $(e.currentTarget);

        $('#settings-modal-' + btn.data('id')).show();
    });
</script>
<script>
    $(document).on('click', '#close', function (e) {
        var btn = $(e.currentTarget);

        $('#settings-' + btn.data('id')).hide();
    });
</script>
<script>
    $(document).on('click', '#close-modal', function (e) {
        var btn = $(e.currentTarget);

        $('#settings-modal-' + btn.data('id')).hide();
    });
</script>
<script>
    $(document).on('click', '.tabled', function () {

        $('#table').modal('show');
        $('.productions').modal('hide');
    });
</script>
<script>
    $('.wish-list-form').submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        let form = $(this);
        let url = form.attr('action');
        var formData = new FormData();
        formData.set('_token', '{{ csrf_token() }}');
        formData.set('name', document.getElementById('name').value);
        formData.set('desc', document.getElementById('desc').value);
        // formData.set('photos', document.getElementById('photos').files);
        formData.set('phone', document.getElementById('phone').value);
        formData.set('email', document.getElementById('email').value);
        var ins = document.getElementById('photos').files.length;
        for (var x = 0; x < ins; x++) {
            formData.append("photos[]", document.getElementById('photos').files[x]);
        }
        // console.log($('#photos').val());
        // formData.append( 'action','uploadImages');
        // $.each(document.getElementById('photos').files, function(i, obj) {
        //     $.each(obj.files,function(j, file){
        //         formData.append('photo['+j+']', file);
        //     })
        // });
        // formData.set('id', this.$store.state.news ? this.$store.state.news : null);
        console.log();
        // fd.append('files',files);
        // console.log(fd);
        $('#wish-list').modal('hide');
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",

            // serializes the form's elements.
            success: function (data) {
                if (data.status == 'success') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Спасибо за заявку!',
                        desc: 'Мы свяжемся с вами в ближайшее время'
                    });
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Вы уже отправляли заявку!',
                    });
                }
            }
        });
    })
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

<script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
<script>
    function paginationWithDots(c, m) {
        var current = c,
            last = m,
            delta = 1,
            left = current - delta,
            right = current + delta + 1,
            range = [],
            rangeWithDots = [],
            l;
        for (let i = 1; i <= last; i++) {
            if (i == 1 || i == last || i >= left && i < right) {
                range.push(i);
            }
        }
        for (let i of range) {
            if (l) {
                if (i - l === 2) {
                    rangeWithDots.push(l + 1);
                } else if (i - l !== 1) {
                    rangeWithDots.push('...');
                }
            }
            rangeWithDots.push(i);
            l = i;
        }
        return rangeWithDots;
    }
    function registerPageButtons(data) {
        data.click(e => {
            e.preventDefault();
            let btn = $(e.currentTarget);
            let page = btn.data('page');
            if (page) {
                params.page = page;
                window.localStorage.setItem('productionsPage', page);
                fetchProductions(params);
            }
        })
    }
</script>
<script>
    let params = [];
    let color = null;
    let price = null;
    let productionsPage = window.localStorage.getItem('productionsPage');
    if (productionsPage) {
        params.page = productionsPage;
    }
    $('p[data-type="switch"]').click(e => {
        let input = $(e.currentTarget);
        if(input.hasClass('active') == false)
        {
            $('p[data-type="switch"]').removeClass('active');
            input.addClass('active');
            // params.page = 1;
            // fetchProductions(params, input.data('value'));
            // if(input.data('value') == 'product'){
            //     $('h2[data-parent="title"]').text('База товаров наших производителей');
            // }
            // else if(input.data('value') == 'productions'){
            //     $('h2[data-parent="title"]').text('Наши производители');
            // }
        }
        $('.mobile-backdrop').hide();
        document.getElementById('mobile-catalog').style.right = "-300px";
        // console.log(input.data('id'));
        let isChecked = (input.hasClass('active') == true ? true : false);
        let id = input.data('id');
        // console.log(input.data('id'));
        if (input.data('id') == 'all')
        {
            params = [];
        }
        else
        {
            isChecked == true ? params = id : params = id;
        }

        // input.data('id') == 'all' ? params = [] :
        // var btn = getType();
        params.page = 1;
        var colors = $('.color-value').val();
        var prices = $('.price-value').val();
        console.log(params, colors, prices);
        fetchProductions(params, colors, prices);
    });
    function getColor(code){

        code == 'none' ? color = '' : color = code;

        fetchProductions(params, color, price)
    }
    function getPrice(code) {

        code == 'none' ? price = '' : price = code;

        fetchProductions(params, color, price)
    }
    function getType()
    {
        var btn = document.querySelectorAll('button[data-parent="type"]' + '.active');
        return btn[0].dataset.value;
    }
    function fetchProductions(params, color, price) {
        $.ajax({
            url: '{{ route('product/filter') }}',
            data: {
                params: params,
                color: color,
                price: price,
                page: params.page,
            },
            success: data => {
                let pagination = $('ul.pagination');
                pagination.empty();
                if (data.count) {
                    let paginationDots = paginationWithDots(data.products.current_page, data.products.last_page);
                    if (data.products.last_page > 1) {
                        if (data.products.current_page != 1) {
                            pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.products.current_page - 1) + '" href="#">Пред</a></li>');
                        }
                    }
                    for (let item of paginationDots) {
                        if (item == '...') {
                            pagination.append('<li class="page-item disabled"><a class="page-link disabled" disabled onclick="event.preventDefault()">' + item + '</a></li>');
                        } else if (item == data.announces.current_page) {
                            pagination.append('<li class="page-item active"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                        } else {
                            pagination.append('<li class="page-item"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                        }
                    }
                    if (data.products.last_page > 1) {
                        if (data.products.current_page != data.products.last_page) {
                            pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.products.current_page + 1) + '" href="#">След</a></li>');
                        }
                    }
                }

                pagination.find('.page-link').each((e, i) => {
                    registerPageButtons($(i));
                });


                let result = $('#products_list').hide().html(data.html).fadeIn('fast');
                @if(auth()->check())
                result.find('.favorite').each((e, i) => {
                    registerFavoriteButton($(i));
                });
                @endif
                result.find('.call-btn').each((e, i) => {
                    registerCallButton($(i));
                });
                result.find('.div-lazy').each((e, i) => {
                    registerLazyLoad($(i));
                })



            },
            error: () => {
            }
        })
    }
    function registerLazyLoad(item) {
        item.lazy();
    }
    @if(auth()->check())
    {{--function registerFavoriteButton(item) {--}}
    {{--item.click((e) => {--}}
    {{--e.preventDefault();--}}
    {{--let btn = $(e.currentTarget);--}}
    {{--let id = btn.data('id');--}}
    {{--$.ajax({--}}
    {{--method: "POST",--}}
    {{--url: '{{ route('production.favorite') }}',--}}
    {{--data: {--}}
    {{--'id': id,--}}
    {{--'user_id': '{{ \Illuminate\Support\Facades\Auth::user()->id }}'--}}
    {{--},--}}
    {{--success: data => {--}}
    {{--if (data.status === 'success') {--}}
    {{--if (data.isFavorited) {--}}
    {{--btn.find('.fa-heart').removeClass('far').addClass('fas');--}}
    {{--} else {--}}
    {{--btn.find('.fa-heart').removeClass('fas').addClass('far');--}}
    {{--}--}}
    {{--}--}}
    {{--},--}}
    {{--error: () => {--}}
    {{--}--}}
    {{--})--}}
    {{--});--}}
    {{--}--}}
    @endif
    function registerCallButton(item) {
    }
    fetchProductions(params);
</script>
<script>
    // $('.color-filter').click(function (e) {
    //     var item = $(e.currentTarget);
    //
    //     if (item.hasClass('active') == true)
    //     {
    //         item.removeClass('active');
    //         $('.color-list').hide();
    //     }
    //     else
    //     {
    //         item.addClass('active');
    //         $('.color-list').show();
    //     }
    // });

    $('.color-item').click(function (e) {
        var choice = $(e.currentTarget);

        $('.color-title').text(choice.find('.color-point').text());
        $('.color-value').val(choice.data('value'));
        getColor(choice.data('value'));

    });
</script>
<script>
    $(document).click(function(event) {
        if ($(event.target).is('#color-filter')) {
            console.log('success');
            $('#color-filter').removeClass('active');
            $('.color-list').hide();
        }
    });
</script>
<script>
    // $('.price-filter').click(function (e) {
    //     var item = $(e.currentTarget);
    //
    //     if (item.hasClass('active') == true)
    //     {
    //         item.removeClass('active');
    //         $('.price-list').hide();
    //     }
    //     else
    //     {
    //         item.addClass('active');
    //         $('.price-list').show();
    //     }
    // });

    $('.price-item').click(function (e) {
        var choice = $(e.currentTarget);

        $('.price-title').text(choice.find('.price-point').text());
        $('.price-value').val(choice.data('value'));
        getPrice(choice.data('value'));

    });
</script>
</body>
</html>


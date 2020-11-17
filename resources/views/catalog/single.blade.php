@extends('layouts.app')
@section('content')
    <?php
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    $size_count = count($product->sizes);
    ?>
{{--@dd($bask['content'][0])--}}
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-lg-5 col-12">
                <div class="row">
                    <div class="col-3 position-relative slide px-0">
                        @foreach(json_decode($product->image) as $image)
                            @if($loop->index == 3)
                                @break
                            @endif
                            <a href="#{{$loop->index}}">
                            <img class="img-fluid border mb-2" style="height: 32%;" src="{{ asset('storage/'.$image) }}" alt="">
                            </a>

                        @endforeach
                    </div>

                    <div class="col-9">
                        <div class="owl-carousel owl-img main-img">
                            @foreach(json_decode($product->image) as $image)
                            <div class="item">
                                <img class="w-100 border" data-hash="{{$loop->index}}" src="{{ asset('storage/'.$image) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-12 mt-lg-0 mt-4">
                <h4 class="font-size-20 font-weight-bold openSans" style="color: #333333;">
                    {{ $product->title }}
                </h4>
                {{--<p class="font-size-14 text-dark font-weight-bold mt-4 mb-1">--}}
                    {{--Ткань: <span class="font-weight-light">{{$product->cloth}}</span>--}}
                {{--</p>--}}
                {{--<p class="font-size-14 text-dark font-weight-bold">--}}
                    {{--Состав: <span class="font-weight-light">{{ $product->composition }}</span>--}}
                {{--</p>--}}

                <div class="row mb-4">
                    <div class="col-lg-3 col-6">
                        <p class="font-size-14 font-weight-bold openSans text-dark mb-0">
                            Опт
                        </p>
                        <p class="font-size-16 font-weight-bold openSans text-dark mb-0">
                            {{ $product->price_opt }} p.
                        </p>
                        <p class="font-size-14 font-weight-light openSans text-dark mb-0">
                            (от 6 товаров на 1 размер)
                        </p>
                    </div>
                    <div class="col-lg-3 col-6">
                        <p class="font-size-14 font-weight-bold openSans mb-0" style="color: #DA9966;">
                            Розница
                        </p>
                        <p class="font-size-16 font-weight-bold openSans mb-0" style="color: #DA9966;">
                            {{ $product->price }} p.
                        </p>
                        <p class="font-size-14 font-weight-light openSans mb-0" style="color: #DA9966;">
                            (от 1 товара)
                        </p>
                    </div>
                </div>
                <div class="pt-4">
                    <?php
                        if (isset($bask))
                            {
                                $count = 0;
                                foreach ($bask['content'] as $item) {
                                    $count = $count + $item['count'];
                                }
                                if ($count > $product->stock)
                                    {
                                        $stock = 0;
                                        if ((1000 - $product->closed) - ($count - $product->stock) < 0)
                                            {
                                                $closed = 0;
                                            }
                                            else
                                                {
                                                    $closed = (1000 - $product->closed) - ($count - $product->stock);
                                                }
                                    }
                                    else {
                                        $stock = $product->stock - $count;
                                    }
                            }
                    ?>
                    <p class="font-size-18 font-weight-bold openSans" style="color: #4A8F14;"><span class="stock">{{isset($stock) ? $stock : $product->stock}}</span> ед. <span class="font-size-12 text-dark font-weight-light"> - в наличии</span></p>

                    <div class="d-flex align-items-center">
                        <div class="position-relative" style="width:200px; overflow: hidden; height: 31px; border-radius: 19px; border: 1px solid #000000;">
                            <div class="position-absolute closed-indikator" style="width:{{ 100 / 1000 * $product->closed }}%; height: 30px; top:-1px; left:-1px; border-radius: 19px; border: 1px solid transparent; background-color: #4A8F14;"></div>
                        </div>
                        <p class="font-size-18 font-weight-bold openSans ml-3 mb-0" style="color: #4A8F14;"><span class="closed">{{ isset($closed) ? $closed : 1000 - $product->closed }}</span> ед. <span class="font-size-12 text-dark font-weight-light"> - доступно к заказу</span></p>
                    </div>
                </div>
                <div class="">

                    <div class="row my-4">
                        <div class="col-6">
                            <button class="btn jzl-btn py-1 px-5 text-white active" data-id="1">
                                Оптом
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn jzl-btn py-1 px-5 text-white" data-id="2">
                               Розница
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-12 order-lg-first order-last">
                            <div class="optov">
                                <p class="font-size-12 text-dark font-weight-normal mb-0">
                                Кол-во линеек:
                                </p>
                                <div class="col-lg-6 col-4 d-flex px-0">
                                    <div class="d-flex py-1 px-2 minus-opt"
                                         style="background-color: #F7F7F7; cursor: pointer;">
                                        <p class="mb-0 text-dark font-size-10 openSans">-</p>
                                    </div>
                                    <?php
//                                    if (isset($bask))
//                                    {
//                                        foreach ($bask['content'] as $item) {
//                                            if ($size->size == $item['size'])
//                                            {
//                                                $sizer = $item['count'];
//                                            }
//                                        }
//                                    }
                                    ?>
                                    <input class="bg-transparent border-0 text-center counter-opt" id=""  onkeypress='return event.charCode >= 48 && event.charCode <= 57' style="width: 50px;"
                                           type="text" value="0">
                                    <div class="d-flex align-items-center justify-content-center py-1 px-2 plus-opt"
                                         style="background-color: #F7F7F7; cursor: pointer;">
                                        <p class="mb-0 text-dark font-size-10 openSans">+</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="mt-4">
                                    <p class="font-size-12 text-dark font-weight-normal mb-0">
                                        Итого:
                                    </p>
                                    <p class="font-size-14 text-dark font-weight-normal mb-0 optov">
                                        <span class="lineika">0</span> линейки (<span class="opt-count">0</span>) ед
                                    </p>
                                    <p class="font-size-14 text-dark font-weight-bold">
                                <span class="total-price">
                                    {{ $total }}
                                </span>
                                        руб.
                                        <span class="font-size-16 text-danger font-weight-light non-left d-none">Индивидуальный заказ - с вами свяжется менеджер по продажам для уточнения деталей</span>
                                    </p>
                                    <button class="btn jzl-but text-white" style="background-color: #DA9966; border-radius: 0%;">В корзину</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 roznic inactive">
                            {{--<div class="row mb-2">--}}
                                {{--<div class="col-2"></div>--}}
                                {{--<div class="col-2">--}}
                                    {{--<p class="font-size-12 text-dark font-weight-normal mb-0">--}}
                                        {{--Опт--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                                {{--<div class="col-2">--}}
                                    {{--<p class="font-size-12 text-dark font-weight-normal mb-0">--}}
                                        {{--Розница--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                                {{--<div class="col-4"></div>--}}
                            {{--</div>--}}
                            @foreach($product->sizes as $size)
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="d-flex align-items-center justify-content-center p-1"
                                             style="background-color: #F7F7F7;">
                                            <p class="mb-0 text-dark font-size-10 openSans">{{ $size->size }}</p>
                                        </div>
                                    </div>
                                    {{--<div class="col-2">--}}
                                        {{--<div class="d-flex align-items-center justify-content-center p-1"--}}
                                             {{--style="background-color: #F7F7F7;">--}}
                                            {{--<p class="mb-0 text-dark font-size-10 openSans">{{ $product->price_opt }} р.</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-3">
                                        <div class="d-flex align-items-center justify-content-center p-1"
                                             style="background-color: #F7F7F7;">
                                            <p class="mb-0 text-dark font-size-10 openSans">{{ $product->price }} р.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-4 d-flex">
                                        <div class="d-flex align-items-center justify-content-center py-1 px-2 minus"
                                             style="background-color: #F7F7F7; cursor: pointer;">
                                            <p class="mb-0 text-dark font-size-10 openSans">-</p>
                                        </div>
                                        <?php
                                        if (isset($bask))
                                        {
                                            foreach ($bask['content'] as $item) {
                                                if ($size->size == $item['size'])
                                                    {
                                                        $sizer = $item['count'];
                                                    }
                                            }
                                        }
                                        ?>
                                        <input class="bg-transparent border-0 text-center counter" id=""  onkeypress='return event.charCode >= 48 && event.charCode <= 57' style="width: 50px;"
                                               type="text" value="{{ isset($sizer) ? $sizer : 0 }}">
                                        <div class="d-flex align-items-center justify-content-center py-1 px-2 plus"
                                             style="background-color: #F7F7F7; cursor: pointer;">
                                            <p class="mb-0 text-dark font-size-10 openSans">+</p>
                                        </div>
                                    </div>
                                    {{--<div class="col-2 d-flex align-items-center">--}}
                                        {{--<p class="mb-0 text-dark font-size-10 openSans status">Розница</p>--}}
                                    {{--</div>--}}
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <div class="d-flex">
                <p class="font-size-18 px-3 font-weight-normal text-dark openSans mb-1" style="background-color: #F7F7F7; border-top: 1px solid #ddaf43;">
                    Характеристики
                </p>
                </div>
                <div class="p-4" style="background-color: #F7F7F7;">
                    <p class="font-size-16 font-weight-normal text-dark mb-0 openSans">
                        Ткань:
                    </p>
                    <p class="font-size-16 font-weight-light text-dark openSans">
                        {{$product->cloth}}
                    </p>
                    <p class="font-size-16 font-weight-normal text-dark mb-0 openSans">
                        Состав:
                    </p>
                    <p class="font-size-16 font-weight-light text-dark openSans">
                        {{ $product->composition }}
                    </p>
                    <p class="font-size-16 font-weight-normal text-dark mb-0 openSans">
                        Размеры:
                    </p>
                    <p class="font-size-16 font-weight-light text-dark openSans">
                        @foreach($product->sizes as $size)
                            {{ $size->size }}{{$loop->last ? '' : ','}}
                        @endforeach
                    </p>
                    <p class="font-size-16 font-weight-normal text-dark mb-0 openSans">
                        Описание:
                    </p>
                    <div class="font-size-16 font-weight-light text-dark openSans line-height-100 prod-desc">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
        <?php
            $prods = \App\Product::where('category_id', $product->category_id)->where('id', "!=" ,$product->id)->get()->take(4);
        ?>
        @if(count($prods))
        <div class="row mt-5">
            <div class="col-12 mb-3">
                <h4 class="font-size-20 font-weight-bold openSans">Похожие товары</h4>
            </div>
            @foreach($prods as $prod)
            <div class="col-lg-3 col-6 mt-lg-0 mt-4">
                <a href="{{ route('product/show', $product->id) }}" style="text-decoration: none;">
                <div class="shadow-sm h-100">
                    <img class="w-100 mb-2" src="{{ asset('storage/'.json_decode($prod->image)[0]) }}" alt="">
                    <div class="p-3">
                    <p class="font-size-18 text-dark mb-1 line-height-110 mb-2" style="height: 40px; overflow-y: hidden;">{{ $prod->title }}</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="font-size-14 font-weight-light openSans text-dark mb-0">
                                    Опт
                                </p>
                                <p class="font-size-16 font-weight-normal openSans text-dark mb-0">
                                    {{ $prod->price_opt }} p.
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="font-size-14 font-weight-light openSans mb-0" style="color: #DA9966;">
                                    Розница
                                </p>
                                <p class="font-size-16 font-weight-normal openSans mb-0" style="color: #DA9966;">
                                    {{ $prod->price }} p.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="text-dark font-size-14 font-weight-normal mb-0">
                                Размеры:
                            </p>
                            <div class="d-flex">
                                @foreach($prod->sizes as $size)
                                    <span class="font-size-12 text-dark font-weight-light mr-1">{{ $size->size }}{{$loop->last ? '' : ','}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
            @endif
    </div>

@endsection
@push('scripts')
        <script>
        var owl = $('.owl-img');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            dots: false,
            touchDrag: false,
            mouseDrag: false,
            lazyLoad: true,
            autoplay:false,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    </script>
        <script>
            $(document).ready(function () {
                var htemp = $('.main-img').height();
                console.log(htemp);
                $('.slide').height(htemp);
            })
        </script>
        <script>
            var stock = {{ isset($product->stock) ? $product->stock : 0 }};
            var closed_count = 1000 - {{ isset($product->closed) ? $product->stock : 0 }};
            var total = 0;
            var kind = 1;

            $('.jzl-btn').click(function (e) {
                var btn = $(e.currentTarget);

                $('.jzl-btn').removeClass('active');
                btn.addClass('active');

                var id = btn.data('id');
                if (id == 1)
                {
                    $('.roznic').addClass('inactive');
                    $('.optov').removeClass('inactive');
                    $('.counter').val(0);
                    kind = 1;

                }
                else
                {
                    $('.optov').addClass('inactive');
                    $('.roznic').removeClass('inactive');
                    $('.lineika').html(0);
                    $('.opt-count').html(0);
                    $('.counter-opt').val(0);
                    kind = 2;
                }
                $('.total-price').html(0);
                total = 0;
                $('.closed').html(closed_count);
                document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closed_count) + '%');
                $('.stock').html(stock);
            });

            $('.plus').click(function (e) {
                var btn = $(e.currentTarget);
                if (btn.parent().find('.counter').val() == '')
                {
                    btn.parent().find('.counter').val(0);
                }

                btn.parent().find('.counter').val(parseInt(btn.parent().find('.counter').val()) + 1);
                // if (btn.parent().find('.counter').val() >= 6)
                // {
                //     btn.parent().parent().find('.status').html('Оптом');
                // }
                var parameters = [];
                var price = 0;
                var opt = {{$product->price_opt}};
                var roznica = {{$product->price}};
                var count = 0;
                document.querySelectorAll('.counter').forEach(element => parameters.push(element.value));
                parameters.forEach(function (element) {
                    // console.log(element);
                        price = price + (element * roznica);
                    count = parseInt(count) + parseInt(element);
                });
                if (stock < count)
                {
                    var left = count - stock;
                    $(' .stock').html(stock - stock);
                    var closs = closed_count - left;
                    if (closed_count < left)
                    {
                        $('.closed').html(0);
                        $('.non-left').removeClass('d-none');
                    }
                    else {
                        $('.closed').html(closed_count - left);
                        $('.non-left').addClass('d-none');
                    }
                    document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
                    // console.log(document.querySelector('.closed-indikator').style.width = '15%');
                }
                else
                {
                    $(' .stock').html(stock - count);
                }

                // console.log(price);
                $('.total-price').html(price);
                total = price;

            });

            $('.minus').click(function (e) {
                var btn = $(e.currentTarget);
                if (btn.parent().find('.counter').val() == '')
                {
                    btn.parent().find('.counter').val(0);
                }
                if (btn.parent().find('.counter').val() > 0) {
                btn.parent().find('.counter').val(parseInt(btn.parent().find('.counter').val()) - 1);
                }
                // if (btn.parent().find('.counter').val() >= 6)
                // {
                //     btn.parent().parent().find('.status').html('Оптом');
                // }else {
                //     btn.parent().parent().find('.status').html('Розница');
                // }
                var parameters = [];
                var price = 0;
                var roznica = {{$product->price}};
                var count = 0;
                document.querySelectorAll('.counter').forEach(element => parameters.push(element.value));
                parameters.forEach(function (element) {
                    // if (element >= 6) {
                    //     price = price + (element * opt);
                    // }
                    // else {
                        price = price + (element * roznica);
                    // }
                    count = parseInt(count) + parseInt(element);
                });
                if (stock < count)
                {
                    var left = count - stock;
                    $(' .stock').html(stock - stock);
                    var closs = closed_count - left;
                    if (closed_count < left)
                    {
                        $('.closed').html(0);
                        $('.non-left').removeClass('d-none');
                    }
                    else {
                        $('.closed').html(closed_count - left);
                        $('.non-left').addClass('d-none');
                    }
                    document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
                    // console.log(document.querySelector('.closed-indikator').style.width = '15%');
                }
                else
                {
                    $(' .stock').html(stock - count);
                }
                $('.total-price').html(price);
                total = price;
            });

            $('.counter').keyup(function (e) {
                var btn = $(e.currentTarget);

                var parameters = [];
                var price = 0;
                var opt = {{$product->price_opt}};
                var roznica = {{$product->price}};
                var count = 0;
                // if (btn.parent().find('.counter').val() >= 6)
                // {
                //     btn.parent().parent().find('.status').html('Оптом');
                // }else {
                //     btn.parent().parent().find('.status').html('Розница');
                // }
                document.querySelectorAll('.counter').forEach(element => parameters.push(element.value));
                parameters.forEach(function (element) {
                    // if (element >= 6) {
                    //     price = price + (element * opt);
                    // }
                    // else {
                        price = price + (element * roznica);
                    // }
                    count = parseInt(count) + parseInt(element);
                    // console.log(price);
                });
                // count = stock - element;
                if (stock < count)
                {
                    var left = count - stock;
                    $(' .stock').html(stock - stock);
                    var closs = closed_count - left;
                    if (closed_count < left && closs <= 0)
                    {
                        $('.closed').html(0);
                        $('.non-left').removeClass('d-none');
                    }
                    else {
                        $('.closed').html(closed_count - left);
                        $('.non-left').addClass('d-none');
                    }
                    document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
                    // console.log(document.querySelector('.closed-indikator').style.width = '15%');
                }
                else
                {
                    $(' .stock').html(stock - count);
                }
                $('.total-price').html(price);
                total = price;

            });

            $('.jzl-but').click(function (e) {
                var btn = $(e.currentTarget);
                var parameters = [];
                var product = {{ $product->id }};
                if (total <= 0)
                {
                    alert('Количество не может быть равно 0');
                }
                else {
                parameters = $('.counter-opt').val();

                $.ajax({
                    url: '{{ route('add_cart') }}',
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "parameters": parameters,
                        "product": product,
                        "total": total,
                        "kind" : kind,
                    },
                    success: data => {
                        btn.addClass('bg-success');
                        setTimeout(function () {
                            btn.removeClass('bg-success');
                        }, 1500);
                        $('.cart-index').html(data.count);
                    },
                    error: () => {

                    }
                })
                }
            });
        </script>
        <script>
            var stock = {{ isset($product->stock) ? $product->stock : 0 }};
            var closed_count = 1000 - {{ isset($product->closed) ? $product->closed : 0}};
            var total = 0;
            var size_count = {{ $size_count }};

            $('.plus-opt').click(function (e) {
                var btn = $(e.currentTarget);
                var opt = {{$product->price_opt}};

                if (btn.parent().find('.counter-opt').val() == '')
                {
                    btn.parent().find('.counter-opt').val(0);
                }

                btn.parent().find('.counter-opt').val(parseInt(btn.parent().find('.counter-opt').val()) + 1);

                var count = 0;
                count = $('.counter-opt').val() * size_count;

                $('.lineika').html($('.counter-opt').val());
                $('.opt-count').html(count);
                total = count * opt;
                $('.total-price').html(total);
                console.log(count);

                if (stock < count)
                {
                    var left = count - stock;
                    $(' .stock').html(stock - stock);
                    var closs = closed_count - left;
                    if (closed_count < left && closs <= 0)
                    {
                        $('.closed').html(0);
                        $('.non-left').removeClass('d-none');
                    }
                    else {
                        $('.closed').html(closed_count - left);
                        $('.non-left').addClass('d-none');
                    }
                    document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
                    // console.log(document.querySelector('.closed-indikator').style.width = '15%');
                }
                else
                {
                    $(' .stock').html(stock - count);
                }
                document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
            });

            $('.minus-opt').click(function (e) {
                var btn = $(e.currentTarget);
                var opt = {{$product->price_opt}};

                if (btn.parent().find('.counter-opt').val() == '')
                {
                    btn.parent().find('.counter-opt').val(0);
                }
                if (btn.parent().find('.counter-opt').val() > 0) {
                    btn.parent().find('.counter-opt').val(parseInt(btn.parent().find('.counter-opt').val()) - 1);
                }

                var count = 0;
                count = $('.counter-opt').val() * size_count;

                $('.lineika').html($('.counter-opt').val());
                $('.opt-count').html(count);
                total = count * opt;
                $('.total-price').html(total);
                console.log(count);

                if (stock < count)
                {
                    var left = count - stock;
                    $(' .stock').html(stock - stock);
                    var closs = closed_count - left;
                    if (closed_count < left && closs <= 0)
                    {
                        $('.closed').html(0);
                        $('.non-left').removeClass('d-none');
                    }
                    else {
                        $('.closed').html(closed_count - left);
                        $('.non-left').addClass('d-none');
                    }
                    document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
                    // console.log(document.querySelector('.closed-indikator').style.width = '15%');
                }
                else
                {
                    $(' .stock').html(stock - count);
                }
                document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
            });

            $('.counter-opt').keyup(function (e) {
                var btn = $(e.currentTarget);
                var opt = {{$product->price_opt}};

                var count = 0;
                count = $('.counter-opt').val() * size_count;

                $('.lineika').html($('.counter-opt').val());
                $('.opt-count').html(count);
                total = count * opt;
                $('.total-price').html(total);
                console.log(count);

                if (stock < count)
                {
                    var left = count - stock;
                    $(' .stock').html(stock - stock);
                    var closs = closed_count - left;
                    if (closed_count < left && closs <= 0)
                    {
                        $('.closed').html(0);
                        $('.non-left').removeClass('d-none');
                    }
                    else {
                        $('.closed').html(closed_count - left);
                        $('.non-left').addClass('d-none');
                    }
                    document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
                    // console.log(document.querySelector('.closed-indikator').style.width = '15%');
                }
                else
                {
                    $(' .stock').html(stock - count);
                }
                document.querySelector('.closed-indikator').style.width = (100 / 1000 * (1000 - closs) + '%');
            });

        </script>
@endpush
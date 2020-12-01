@extends('layouts.app')
@section('content')
    <?php
    $agent = new \Jenssegers\Agent\Agent();
    ?>
    <div class="container-fluid px-0 owl-carousel owl-main" style="min-height: {{ $agent->isMobile() ? '80vh' : '100vh' }};">
        <div class="d-flex align-items-lg-center align-items-end item" style="height: {{ $agent->isMobile() ? '80vh' : '100vh' }}; background-image: url({{ $agent->isMobile() ? asset('images/mainbg5mob.jpg') : asset('images/mainbg5.jpg') }}); background-size: cover; background-position: center;">
            @if($agent->isDesktop())
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="font-weight-bold openSans mb-0 line-height-100" style="color: #323232; font-size: 85px;">
                            Новогодние
                        </p>
                    </div>
                    <div class="col-5"></div>
                    <div class="col-7 pl-4">
                        <p class="font-weight-bold openSans mb-0 line-height-100" style="color: #323232; font-size: 85px;">
                            платья
                        </p>
                    </div>
                    <div class="col-5"></div>
                    <div class="col-7">
                        <p class="font-weight-light openSans mb-0 line-height-100 mt-3" style="color: #323232; font-size: 37px;">
                            оптом от 600 руб
                        </p>
                        <a href="{{ route('catalog') }}" style="text-decoration: none;">
                            <button class="btn py-0 px-4 bg-transparent {{ $agent->isDesktop() ? 'font-size-22' : 'font-size-18'}} font-weight-light mt-lg-4 mt-2" style="border-radius: 0%; border: 2px solid #000000;">
                                перейти в каталог
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @else
                <div class="container mb-5">
                    <p class="font-size-24 text-dark font-weight-bold openSans mb-0">
                        Новогодние
                    </p>
                    <p class="font-size-24 text-dark font-weight-bold openSans mb-0">
                        платья
                    </p>
                    <p class="font-size-18 text-dark font-weight-light openSans">
                        оптом от 600 руб
                    </p>
                    <a href="{{ route('catalog') }}" style="text-decoration: none;">
                        <button class="btn py-0 px-4 bg-transparent {{ $agent->isDesktop() ? 'font-size-22' : 'font-size-18'}} font-weight-light mt-lg-4 mt-2" style="border-radius: 0%; border: 2px solid #000000;">
                            перейти в каталог
                        </button>
                    </a>
                </div>
            @endif
        </div>
        {{--<div class="d-flex align-items-lg-center align-items-end item" style="height: {{ $agent->isMobile() ? '80vh' : '100vh' }}; background-image: url({{ $agent->isMobile() ? asset('images/mainbg1mob.jpg') : asset('images/mainbg1.jpg') }}); background-size: cover; background-position: center;">--}}
            {{--@if($agent->isDesktop())--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-7 d-flex align-items-center">--}}
                            {{--<div>--}}
                                {{--<p class="font-weight-bold text-white openSans mb-0 line-height-100" style="font-size: 85px;">--}}
                                    {{--ЗАКАЗ--}}
                                {{--</p>--}}
                                {{--<p class="font-weight-bold text-white openSans mb-0 line-height-100" style="font-size: 85px;">--}}
                                    {{--ОТ--}}
                                {{--</p>--}}
                                {{--<p class="font-weight-light text-white openSans mb-0 line-height-100" style="font-size: 85px;">--}}
                                    {{--5000--}}
                                {{--</p>--}}
                                {{--<p class="font-weight-light text-white openSans mb-0 line-height-100" style="font-size: 85px;">--}}
                                    {{--РУБЛЕЙ--}}
                                {{--</p>--}}
                                {{--<a href="{{ route('catalog') }}" style="text-decoration: none;">--}}
                                {{--<button class="btn py-0 px-4 bg-white font-size-22 font-weight-light mt-2" style="border-radius: 0%;">--}}
                                    {{--перейти в каталог--}}
                                {{--</button>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-5">--}}
                            {{--<img class="img-fluid w-75" src="{{ asset('images/main1img.jpg') }}" alt="">--}}
                            {{--<div class="position-absolute" style="width: max-content; transform: rotate(90deg); top: 50%; right: -8%;">--}}
                                {{--<p class="text-white font-size-20 openSans font-weight-light">получить бесплатную доставку</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@else--}}
                {{--<div class="container mb-5">--}}
                    {{--<div class="row justify-content-end">--}}
                        {{--<div class="col-7 position-relative pr-4">--}}
                            {{--<img class="img-fluid w-100" src="{{ asset('images/main1img.jpg') }}" alt="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<p class="font-size-28 text-white font-weight-bold openSans mb-0">--}}
                        {{--ЗАКАЗ ОТ--}}
                    {{--</p>--}}
                    {{--<p class="font-size-28 text-white font-weight-light openSans">--}}
                        {{--5000 РУБЛЕЙ--}}
                    {{--</p>--}}
                    {{--<a href="{{ route('catalog') }}" style="text-decoration: none;">--}}
                    {{--<button class="btn py-0 px-4 bg-white font-size-18 font-weight-light mt-2" style="border-radius: 0%;">--}}
                        {{--перейти в каталог--}}
                    {{--</button>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        <div class="d-flex align-items-lg-center align-items-end item" style="height: {{ $agent->isMobile() ? '80vh' : '100vh' }}; background-image: url({{ $agent->isMobile() ? asset('images/mainbg6mob.jpg') : asset('images/mainbg6.jpg') }}); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row" style="height: {{ $agent->isMobile() ? '60vh' : '88vh' }}">
                    <div class="col-12 d-flex align-items-center justify-content-center text-center mb-lg-0 mb-5">
                        <div>
                            <p class="font-weight-bold text-white openSans mb-lg-1 mb-0 line-height-100" style="font-size: {{ $agent->isDesktop() ? '68px' : '26px'}};">
                                Молодежная одежда
                            </p>
                            <p class="font-weight-light text-white openSans mb-lg-1 mb-0 line-height-100" style="font-size: {{ $agent->isDesktop() ? '37px' : '17px'}};">
                                оптом от 300 руб
                            </p>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('catalog') }}" style="text-decoration: none;">
                        <button class="btn py-0 px-4 bg-transparent {{ $agent->isDesktop() ? 'font-size-22' : 'font-size-18'}} font-weight-light mt-lg-4 mt-2" style="border-radius: 0%; border: 2px solid #000000;">
                            перейти в каталог
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-lg-center align-items-end item" style="height: {{ $agent->isMobile() ? '80vh' : '100vh' }}; background-image: url({{ $agent->isMobile() ? asset('images/mainbg2mob.jpg') : asset('images/mainbg2.jpg') }}); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12 d-flex align-items-center mb-lg-0 mb-5">
                        <div>
                            <p class="font-weight-bold text-dark openSans mb-lg-1 mb-0 line-height-100" style="font-size: {{ $agent->isDesktop() ? '46px' : '28px'}};">
                                Прямой
                            </p>
                            <p class="font-weight-bold text-dark openSans mb-lg-1 mb-0 line-height-100" style="font-size: {{ $agent->isDesktop() ? '46px' : '28px'}};">
                                поставщик
                            </p>
                            <a href="{{ route('catalog') }}" style="text-decoration: none;">
                                <button class="btn py-0 px-4 bg-transparent {{ $agent->isDesktop() ? 'font-size-22' : 'font-size-18'}} font-weight-light mt-lg-4 mt-2" style="border-radius: 0%; border: 2px solid #000000;">
                                    перейти в каталог
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-lg-center align-items-end item" style="height: {{ $agent->isMobile() ? '80vh' : '100vh' }}; background-image: url({{ $agent->isMobile() ? asset('images/mainbg7mob.jpg') : asset('images/mainbg7.jpg') }}); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-2 d-lg-block d-none"></div>
                    <div class="col-lg-6 col-12 d-flex align-items-center mb-lg-0 mb-5">
                        <div>
                            <p class="font-weight-bold text-dark openSans mb-1 line-height-100" style="font-size: {{ $agent->isDesktop() ? '43px' : '24px'}};">
                                Бесплатная
                            </p>
                            <p class="font-weight-bold text-dark openSans mb-1 line-height-100" style="font-size: {{ $agent->isDesktop() ? '68px' : '28px'}};">
                                доставка
                            </p>
                            <a href="{{ route('catalog') }}" style="text-decoration: none;">
                            <button class="btn py-0 px-4 bg-transparent {{ $agent->isDesktop() ? 'font-size-22' : 'font-size-18'}} font-weight-light mt-lg-4 mt-2" style="border-radius: 0%; border: 2px solid #000000;">
                                перейти в каталог
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-5">
        <div class="container">
        <div class="row justify-content-center">
                        @foreach(\App\Category::where('parent_id', null)->get() as $category)
                        <div class="col-lg-5 col-6">
                            <a href="{{ route('change_cat',['id' => $category->id]) }}" style="text-decoration: none;">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{ asset('storage/'.$category->image) }}" alt="">
                                    <div class="position-absolute w-100" style="bottom: 5%; left: 0%; background: rgba(218, 153, 102, 0.76);">
                                        <p class="text-center mb-0 {{ $agent->isDesktop() ? 'font-size-18' : 'font-size-10'}} font-weight-bold text-white text-uppercase py-2">
                                            {{ $category->title }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach`
                </div>
            </div>
    </div>
    <div class="container bg-white py-4 my-lg-5 my-4">
        <div class="row justify-content-center">
            @foreach(\App\Type::all() as $type)
                @if(count($type->products))
                <div class="col-lg-4 col-6 px-lg-5 px-3 pb-lg-0 pb-4">
                    <a href="{{ route('catalog',['type' => $type->id]) }}" style="text-decoration: none;">
                    <div class="position-relative">
                        <img class="w-100" src="{{ asset('storage/'.$type->image) }}" alt="">
                        <div class="position-absolute py-1 px-2" style="bottom:10%; width: 90%; background-color: rgba(218, 153, 102, 0.76);">
                            <span class="text-white openSans  {{ $agent->isDesktop() ? 'font-size-12' : 'font-size-8'}}">{{ $type->title }}</span>
                        </div>
                        <img class="position-absolute" src="{{ asset('storage/'.$type->icon) }}" style="top:3%; right: 3%; max-width: {{ $agent->isMobile() ? '30px' : '50px' }};">

                    </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container py-5">
        {{--<div class="owl-carousel owl-second">--}}
            <?php
                $id = \Illuminate\Support\Facades\Session::has('category') ? \Illuminate\Support\Facades\Session::get('category') : 15;
//                dd($id);
//            $circle = count(\App\Category::where('parent_id', $id)->get()) / 8;
//            dd($circle);
//            if (count(\App\Category::where('parent_id', $id)->get()) % 8 > 0)
//            {
//                $circle = floor($circle) + 1;
//            }
//            $kol =0;
            ?>
            {{--@for($i = 0; $i < intval($circle); $i++)--}}
                {{--<div class="item">--}}
                    <div class="row">
                        @foreach(\App\Category::where('parent_id', $id)->get() as $category)
                            @if(isset($category->products))
                            {{--@if($loop->index == (($i + 1) * 8))--}}
                                {{--@break--}}
                            {{--@else--}}
{{--                                @if($loop->index >= 8 * $i)--}}
                                    <div class="col-lg-3 col-6  mb-3 jzl-block">
                                        <a href="{{ route('catalog', ['category' => $category->id] ) }}" style="text-decoration: none;">
                                        <img class="img-fluid" src="{{ asset('storage/'.$category->image) }}" alt="">

                                        <p class="font-size-16 openSans mt-1 jzl-title font-weight-light">
                                            {{ $category->title }}
                                        </p>
                                        </a>
                                    </div>
                                {{--@endif--}}
                            {{--@endif--}}
                            @endif
                        @endforeach
                    </div>
                </div>
            {{--@endfor--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="container py-5">
        <h3 class="font-weight-normal text-center">
            Отзывы
        </h3>
        <p class="font-size-14 text-center" style="color: #737373;">
            Что говорят люди о нас?
        </p>

        <div class="owl-carousel owl-comment">
            @foreach(\App\Comment::all() as $comment)
                <div class="item row justify-content-center">
                    <div class="col-lg-6 col-10 text-center">
                        <p class="font-size-16 font-weight-light" style="color: #a6a6a6;">
                            {{ $comment->comment }}
                        </p>

                        <p class="font-size-22 font-weight-bold mb-0" style="color: #DA9966;">
                            {{ $comment->name }}
                        </p>
                        <p class="font-size-12 font-weight-light" style="color: #a6a6a6;">
                            {{ $comment->position }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid pl-lg-5 pl-2">
        <a href="{{ route('news') }}" style="text-decoration: none;">
            <p class="font-weight-normal font-size-14 text-center openSans" style="color: #DA9966;">Смотреть все статьи <i class="fas fa-long-arrow-alt-right"></i></p>
        </a>
        <div class="owl-carousel owl-news pl-lg-5 pl-0">
            @foreach(\App\News::all()->reverse()->take(8) as $new)
                <div class="item">
                    @include('news.single')
                </div>
            @endforeach
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop < 150 || 1200 < scrollTop )
                {
                    $('.wish-list-content').addClass('dissapoint');
                }
                else
                {
                    $('.wish-list-content').removeClass('dissapoint');
                }
            })
        });
    </script>
    <script>
        var owl = $('.owl-main');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            dots: false,
            touchDrag: false,
            mouseDrag: false,
            lazyLoad: true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplaySpeed: 500,
            autoplayHoverPause:false,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    </script>
    <script>
        var owl = $('.owl-second');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    </script>
    <script>
        var owl = $('.owl-comment');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplaySpeed: 500,
            autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    </script>
    <script>
        var owl = $('.owl-news');
        owl.owlCarousel({
            margin: 0,
            loop: true,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1.5
                },
                700: {
                    items: 3.5
                }
            }
        })
    </script>
@endpush

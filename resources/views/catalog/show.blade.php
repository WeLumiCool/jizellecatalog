@extends('layouts.app')
@section('content')
    {{--<!--    --><?php--}}
    {{--//        $product = \App\Product::all()->first();--}}
    {{--//        dd($product->colors);--}}
    {{--//    ?>--}}
    {{--{{ dd($cat_id) }}--}}
    <?php
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    ?>
    <div class="container main-block">
        {{--<div class="row mb-4 d-lg-block d-none">--}}
            {{--<div class="col-lg-3"></div>--}}
            {{--<div class="col-lg-9 col-12">--}}
                {{--<p class="font-size-20">Весь каталог</p>--}}
            {{--</div>--}}

        {{--</div>--}}
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 border-top border-bottom">
                    <div class="row justify-content-center">
                        @foreach(\App\Category::where('parent_id', null)->get() as $category)
                            <a href="{{ route('change_cat',['id' => $category->id]) }}" style="text-decoration: none;">
                                <p class="px-4 mb-0 font-size-18 font-weight-normal text-uppercase py-2 main-category {{ \Illuminate\Support\Facades\Session::has('category') && \Illuminate\Support\Facades\Session::get('category') == $category->id ? 'active' : '' }}{{ \Illuminate\Support\Facades\Session::has('category') ? '' : $loop->index == 1 ? 'active' : ''}}">
                                    {{ $category->title }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-4">
            @if(!$agent->isMobile())
            <div class="col-lg-12 col-12 d-flex justify-content-lg-start justify-content-end py-4 align-items-center" style="background-color: #F7F6FC;">
                <div class="col-3 mr-5 pl-0">
                    <h1 class="font-size-20">Каталог</h1>
                </div>
                {{--<div class="mr-5 d-flex align-items-center">--}}
                {{--<span class="text-secondary font-size-12 mr-2">Размер</span>--}}
                {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                {{--</div>--}}
                {{--<div class="dropdown">--}}
                    {{--<div class="mr-5 d-flex align-items-center position-relative color-filter dropdown-toggle" id="dropdowncolor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">--}}
                        {{--<span class="text-secondary font-size-12 mr-2 color-title">Все цвета</span>--}}
                        {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                    {{--</div>--}}
                    {{--<input type="hidden" class="color-value">--}}
                    {{--<div class="position-absolute bg-white border p-2 color-list dropdown-menu" aria-labelledby="dropdowncolor">--}}
                        {{--<div class="d-flex align-items-center color-item" data-value="none"><div style="width:15px; height:15px; border-radius:50%; background-color: transparent"></div><span class="color-point ml-3">Все цвета</span></div>--}}
                        {{--@foreach(\App\Color::all() as $color)--}}
                            {{--<div class="d-flex align-items-center color-item" data-value="{{ $color->id }}"><div class="border" style="width:15px; height:15px; border-radius:50%; background-color: {{$color->color}}"></div><span class="color-point ml-3">{{$color->title}}</span></div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="dropdown">
                    <div class="mr-5 d-flex align-items-center position-relative color-filter dropdown-toggle" id="dropdowncolor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                        <span class="text-secondary font-size-12 mr-2 type-title">{{isset($id2) ? \App\Type::find($id2)->title : 'Все типы'}}</span>
                        {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                    </div>
                    <input type="hidden" class="type-value">
                    <div class="position-absolute bg-white border p-2 type-list dropdown-menu" aria-labelledby="dropdowntype">
                        <div class="d-flex align-items-center type-item" data-value="none"><span class="type-point ml-3">Все типы</span></div>
                        @foreach(\App\Type::all() as $type)
                            <div class="d-flex align-items-center type-item" data-value="{{ $type->id }}"><span class="type-point ml-3">{{$type->title}}</span></div>
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
            @else
                <div class="col-lg-12 col-12 py-4 align-items-center "
                     style="background-color: #F7F6FC;">
                    <div class="row justify-content-between">
                        <div class="col-7 d-flex align-items-center">
                            <div class="position-relative">
                            <h1 class="font-size-20 mb-0 mobile-selector">Весь каталог</h1>
                            {{--<div class="form-group position-absolute" style="top:0%; left:0%; opacity: 0;">--}}
                                {{--<select name="" id="" class="form-control category-picker">--}}
                                    {{--<option data-value="0" value="all">Все категории</option>--}}
                                    {{--@foreach($categories as $category)--}}
                                        {{--@if(count($category->products))--}}
                                            {{--<option data-value="1" value="{{$category->id}}" {{ $id == $category->id ? 'selected' : ''}}>{{ $category->title }}</option>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-2 pr-1 d-flex align-items-center">
                            <img class="w-50 show-settings" src="{{ asset('images/icons/sliders.svg') }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="position-fixed bg-white p-4" id="settings" style=" top:0%; right: -75%; height: 100%; width: 75%; z-index: 99999;">
                    <i class="far fa-times-circle fa-2x text-dark close-settings position-absolute" style="top:5%; right:5%;"></i>
                    <div class="mt-5 pt-4">
                        {{--<div class="form-group">--}}
                            {{--<p class="font-size-14 font-weight-light">Цвета</p>--}}
                            {{--<select name="" id="" class="form-control color-picker">--}}
                                {{--<option class="color-item" data-value="none" value="none">Все цвета</option>--}}
                                {{--@foreach(\App\Color::all() as $color)--}}
                                    {{--<option class="color-item" data-value="{{ $color->id }}" value="{{ $color->id }}">{{$color->title}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                        <div class="form-group">
                            <p class="font-size-14 font-weight-light">Категории</p>
                            <select name="" id="" class="form-control category-picker">
                                <option data-value="0" value="all">Все категории</option>
                                @foreach($categories as $category)
                                    @if(count($category->products))
                                        <option data-value="1" value="{{$category->id}}" {{ $id == $category->id ? 'selected' : ''}}>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <hr>

                        <div class="form-group">
                            <p class="font-size-14 font-weight-light">Цена</p>
                            <select name="" id="" class="form-control price-picker">
                                <option data-value="0" value="0">По возрастанию</option>
                                <option data-value="1" value="1">По убыванию</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <p class="font-size-14 font-weight-light">Тип</p>
                            <select name="" id="" class="form-control type-picker">
                                <option data-value="none" value="none">Все типы</option>
                                @foreach(\App\Type::all() as $type)
                                    <option value="{{ $type->id }}" {{ $id2 == $type->id ? 'selected' : ''}}>{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            @endif

            {{--<div class="col-3">--}}
            {{--<div class="mr-5 d-flex align-items-center">--}}
            {{--<span class="text-secondary font-size-12 mr-2">Сортировка по дате</span>--}}
            {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
        </div>
        <div class="row">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="" style="position: sticky; top:15%;">
                    <h2 class="font-size-18 btn-link font-weight-light mb-1 text-dark switcher" type="button" data-type="switch" data-id="all">Весь каталог</h2>
                    @foreach($categories as $category)
                        @if(count($category->products))
                            <h2 class="font-size-18 btn-link font-weight-light text-dark switcher {{isset($id) && $id == $category->id ? 'active' : ''}}" type="button" data-type="switch" data-id="{{ $category->id }}">{{ $category->title }}</h2>
                        @endif
                    @endforeach
                    <h2 class="font-size-18 btn-link font-weight-light mb-1 text-dark switcher" type="button" data-type="switch" data-id="archive">Архив</h2>
                </div>
            </div>
            <div class="col-lg-9 col-12">

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



@endsection
@push('scripts')

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
        let params = {{isset($id) ? $id : '[]'}};
        let color = null;
        let price = null;
        let type = {{isset($id2) ? $id2 : 'null'}};
        let cat_id = {{ $cat_id }};
        let productionsPage = window.localStorage.getItem('productionsPage');
        if (productionsPage) {
            params.page = productionsPage;
        }
        @if(!$agent->isMobile())
        $('h2[data-type="switch"]').click(e => {
            let input = $(e.currentTarget);
            if(input.hasClass('active') == false)
            {
                $('h2[data-type="switch"]').removeClass('active');
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
            var types = $('.type-value').val();
            console.log(params, colors, prices);
            fetchProductions(params, colors, prices, types);
        });
        @else
        $('.category-picker').change( function (e) {
            var choice = $(e.currentTarget);
            let id = choice.val();
            params = id == 'all' ? [] : id;
            params.page = 1;
            var colors = $('.color-value').val();
            var prices = $('.price-picker').val();
            var types = $('.type-picker').val();
            console.log(params, colors, prices);
            fetchProductions(params, colors, prices, types);
        });

        $('.mobile-selector').click(function () {
            params = [];
            params.page = 1;
            var colors = $('.color-value').val();
            var prices = $('.price-picker').val();
            var types = $('.type-picker').val();
            fetchProductions(params, colors, prices, types);
        });

        @endif
        function getColor(code){

            code == 'none' ? color = '' : color = code;

            fetchProductions(params, color, price, type)
        }
        function getPrice(code) {

            code == 'none' ? price = '' : price = code;

            fetchProductions(params, color, price, type)
        }
        function getType(code)
        {
            code == 'none' ? type = '' : type = code;

            fetchProductions(params, color, price, type)
        }
        function fetchProductions(params, color, price, type) {
            $.ajax({
                url: '{{ route('product/filter') }}',
                data: {
                    params: params,
                    color: color,
                    price: price,
                    type: type,
                    cat_id: cat_id,
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
        fetchProductions(params, color, price, type);
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
@if(!$agent->isMobile())
        $('.color-item').click(function (e) {
            var choice = $(e.currentTarget);
            console.log(choice);
            $('.color-title').text(choice.find('.color-point').text());
            $('.color-value').val(choice.data('value'));
            getColor(choice.data('value'));

        });

        $('.price-item').click(function (e) {
            var choice = $(e.currentTarget);

            $('.price-title').text(choice.find('.price-point').text());
            $('.price-value').val(choice.data('value'));
            getPrice(choice.data('value'));

        });

        $('.type-item').click(function (e) {
            var choice = $(e.currentTarget);

            $('.type-title').text(choice.find('.type-point').text());
            $('.type-value').val(choice.data('value'));
            getType(choice.data('value'));
        });
        @else
        $('.color-picker').change( function (e) {
            var choice = $(e.currentTarget);
            getColor(choice.val());
        });

        $('.price-picker').change( function (e) {
            var choice = $(e.currentTarget);
            getPrice(choice.val());
        });

        $('.type-picker').change( function (e) {
            var choice = $(e.currentTarget);
            getType(choice.val());
        });
        @endif
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

    @if($agent->isMobile())
        <script>
            $('.show-settings').click(function () {
                document.getElementById('settings').style.right = '0%';
            });


            $('.close-settings').click(function () {
                document.getElementById('settings').style.right = '-75%';
            })
        </script>
        <script>
            $('.mobile-selector').click(function () {
                $('.category-picker').trigger('click');
            })
        </script>
    @endif
@endpush
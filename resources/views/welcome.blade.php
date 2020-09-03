@extends('layouts.app')
@section('content')
{{--<!--    --><?php--}}
{{--//        $product = \App\Product::all()->first();--}}
{{--//        dd($product->colors);--}}
{{--//    ?>--}}
        <div class="container" style="margin-top: 120px">
            <div class="row mb-4">
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
                        <div class="col-lg-3 col-3 d-lg-none d-block">
                            <i class="fas fa-bars fa-2x catalog-list"></i>
                        </div>
                        <div class="col-lg-9 col-9 d-flex justify-content-lg-start justify-content-end">
                            {{--<div class="mr-5 d-flex align-items-center">--}}
                                {{--<span class="text-secondary font-size-12 mr-2">Размер</span>--}}
                                {{--<i class="fas fa-chevron-down text-secondary"></i>--}}
                            {{--</div>--}}
                            <div class="mr-5 d-flex align-items-center position-relative color-filter" id="color-filter" style="cursor:pointer;">
                                <span class="text-secondary font-size-12 mr-2 color-title">Все цвета</span>
                                <i class="fas fa-chevron-down text-secondary"></i>
                                <input type="hidden" class="color-value">
                                <div class="position-absolute bg-white border p-2 color-list">
                                    <div class="d-flex align-items-center color-item" data-value="none"><div style="width:15px; height:15px; border-radius:50%; background-color: transparent"></div><span class="color-point ml-3">Все цвета</span></div>
                                    @foreach(\App\Color::all() as $color)
                                        <div class="d-flex align-items-center color-item" data-value="{{ $color->id }}"><div style="width:15px; height:15px; border-radius:50%; background-color: {{$color->color}}"></div><span class="color-point ml-3">{{$color->title}}</span></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative price-filter" style="cursor:pointer;">
                                <span class="text-secondary font-size-12 mr-2">Цена</span>
                                <i class="fas fa-chevron-down text-secondary"></i>
                                <input type="hidden" class="price-value">
                                <div class="position-absolute bg-white border p-2 price-list">
                                    <div class="d-flex align-items-center price-item" data-value="0"><span class="price-point ml-3">По возрастанию</span></div>
                                    <div class="d-flex align-items-center price-item" data-value="1"><span class="price-point ml-3">По убыванию</span></div>
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
                    <div class="row mt-5 justify-content-lg-start justify-content-lg-center justify-content-between px-lg-0 px-3" id="products_list">

                    </div>
                    <div class="row mt-lg-4 mt-1">
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


<div class="mobile-backdrop"></div>
    <div class="sidebar" id="mobile-catalog">
        <i class="fas fa-times position-absolute fa-lg close-mobile-catalog" style="top:2%; right:10%;"></i>
        <div class="p-4">
            <p class="font-size-18 font-weight-bold mb-5">Каталог</p>

            <p class="font-size-18 btn-link font-weight-light mb-1 text-dark" type="button" data-type="switch" data-id="all">Весь каталог</p>
            @foreach($categories as $category)
                <p class="font-size-18 btn-link font-weight-light mb-1 text-dark" type="button" data-type="switch" data-id="{{ $category->id }}">{{ $category->title }}</p>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.catalog-list').on('click', function () {
            document.getElementById('mobile-catalog').style.left = "0px";
            $('.mobile-backdrop').show();
        });

        $('.mobile-backdrop').click(function () {
            $('.mobile-backdrop').hide();
            document.getElementById('mobile-catalog').style.left = "-300px";
        });

        $('.close-mobile-catalog').click(function () {
            $('.mobile-backdrop').hide();
            document.getElementById('mobile-catalog').style.left = "-300px";
        });
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
        $('.color-filter').click(function (e) {
            var item = $(e.currentTarget);

            if (item.hasClass('active') == true)
            {
                item.removeClass('active');
                $('.color-list').hide();
            }
            else
            {
                item.addClass('active');
                $('.color-list').show();
            }
        });

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
        $('.price-filter').click(function (e) {
            var item = $(e.currentTarget);

            if (item.hasClass('active') == true)
            {
                item.removeClass('active');
                $('.price-list').hide();
            }
            else
            {
                item.addClass('active');
                $('.price-list').show();
            }
        });

        $('.price-item').click(function (e) {
            var choice = $(e.currentTarget);

            $('.price-title').text(choice.find('.price-point').text());
            $('.price-value').val(choice.data('value'));
            getPrice(choice.data('value'));

        });
    </script>
@endpush
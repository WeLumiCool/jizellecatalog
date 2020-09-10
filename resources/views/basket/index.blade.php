@extends('layouts.app')
@section('content')
    <?php
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    ?>
    {{--@dd(\Illuminate\Support\Facades\Session::all())--}}
    <div class="container mb-5" style="margin-top: 120px">
        <div class="row mb-4">
            <div class="col-12 mb-5">
                <p class="font-size-20">Оформление заказа</p>
            </div>
        </div>

        <p class="font-size-18">Корзина</p>

        @if($products != null)

        @foreach($products as $key => $item)
                {{--@dd(\App\Color::find($item['color'])->color)--}}
                <?php
                $product = \App\Product::find($item['id']);
                ?>
            @if($agent->isMobile())


                <div id="basket-{{ $key }}">
                    <div class="row mb-2">
                        <div class="col-lg-1 col-6">
                            <img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
                        </div>
                        <div class="col-lg-3 col-6">
                            <p class="font-size-16 font-weight-light mb-1"> {{ $product->title }}</p>
                            <p class="font-size-16 font-weight-light mb-1"> Артикль: {{ $product->article }}</p>
                            <p class="font-size-16 font-weight-light mb-1">Размер: {{ $item['size'] }}</p>
                            <p class="font-size-16 font-weight-light mb-1">Кол-во: {{ $item['count'] }}</p>
                            <div class="d-flex">
                                    <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ \App\Color::find($item['color'])->color }};"></div>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <div class="p-2 bg-danger rounded cart-delete" style="cursor: pointer;" data-id="{{ $key }}"><i class="far fa-trash-alt fa-lg text-white"></i></div>
                            </div>

                        </div>
                    </div>
                    <hr>
                </div>
                @else
            <div id="basket-{{ $key }}">
            <div class="row mb-2">
                <div class="col-lg-1 col-6">
                    <img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
                </div>
                <div class="col-lg-3 col-6 d-flex align-items-center ">
                    <p class="font-size-16 font-weight-light"> {{ $product->title }} <br>
                        Артикль: {{ $product->article }}</p>
                </div>
                <div class="col-lg-3 col-6 d-flex align-items-center">
                    <p class="font-size-16 font-weight-light"> Размер: {{ $item['size'] }} <br>
                        Кол-во: {{ $item['count'] }}</p>
                </div>
                <div class="col-lg-3 col-6 d-flex align-items-center">
                    <div class="d-flex">
                        <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color:{{ \App\Color::find($item['color'])->color }};"></div>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <div class="p-2 bg-danger rounded cart-delete" style="cursor: pointer;" data-id="{{ $key }}"><i class="far fa-trash-alt fa-lg text-white"></i></div>
                </div>
            </div>
            <hr>
            </div>
            @endif
        @endforeach
        <div class="text-right">
            <p class="font-size-18 text-success">Итоговая сумма: <span id="total-price"> {{ \Illuminate\Support\Facades\Session::get('total')}}</span> руб</p>
        </div>
        <form class="mt-5" action="{{route('basket_save')}}" id="basket-form" method="POST">
            <p class="font-size-18">Введите ваши данные</p>
            @csrf
            <div class="form-label-group">
                <label for="inputName">Имя</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Введите имя" required="" autofocus="">
            </div>
            <div class="form-label-group pt-4">
                <label for="inputCity">Город</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Введите ваш город" required="" autofocus="">
            </div>
            <div class="form-label-group pt-4">
                <label for="telephone">Номер телефона</label>
                <input type="text" name="phone" id="phone" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 43' placeholder="Введите номер телефона" required="" autofocus="">
            </div>
        </form>
        <div class="mt-5">
        @if(\Illuminate\Support\Facades\Session::get('total') < 5000)
            <p class="small text-danger">Заказ, должен быть на сумму более 5000 руб.</p>
        @endif
        <button class="btn btn-success px-5 py-2 btn-send" {{\Illuminate\Support\Facades\Session::get('total') < 5000 ? 'disabled': ''}}>Отправить заявку</button>
        </div>
            @else
            <p class="font-size-16">Корзина пуста</p>

        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $('.cart-delete').click(function (e) {
            var btn = $(e.currentTarget);

            $.ajax({
                url: '{{ route('delete_cart') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": btn.data('id'),
                },
                success: data => {
                    // btn.addClass('bg-success');
                    // setTimeout(function () {
                    //     btn.removeClass('bg-success');
                    // }, 1500);
                    $('.cart-index').html(data.count);
                    $('#total-price').html(data.total);
                    $('#basket-' + btn.data('id')).remove();
                    if (data.total < 5000){
                        $('.btn-send').prop('disabled', true);
                    }
                    if (data.count == 0)
                    {
                        $('#basket-form').hide();
                        $('.btn-send').hide();
                    }
                },
                error: () => {
                }
            });
        })
    </script>
    <script>
        $('.btn-send').click(function () {
            if ($('#name').val() == '' || $('#phone').val() == '' || $('#city').val() == '')
            {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Заполните все поля',
                });
            }
            else {
                $(".btn-send").attr("disabled", true);
                $('#basket-form').submit();
            }
        });
    </script>
    @endpush

@extends('layouts.app')
@section('content')
    <?php
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    ?>
{{--    @dd(\Illuminate\Support\Facades\Session::all())--}}
    <div class="container mb-5" style="margin-top: 120px">
        <div class="row mb-4">
            <div class="col-12 mb-5">
                <p class="font-size-20">Оформление заказа</p>
            </div>
        </div>

        <p class="font-size-18">Корзина</p>

        @if($products)
        @foreach($products as $product)
            @if($agent->isMobile())


                <div id="basket-{{ $product->id }}">
                    <div class="row mb-2">
                        <div class="col-lg-1 col-6">
                            <img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
                        </div>
                        <div class="col-lg-3 col-6">
                            <p class="font-size-16 font-weight-light"> {{ $product->title }}</p>
                            <p class="font-size-16 font-weight-light"> Артикль: <br>{{ $product->article }}</p>
                            <div class="d-flex">
                                @foreach($product->colors as $color)
                                    <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <div class="p-2 bg-danger rounded cart-delete" style="cursor: pointer;" data-id="{{ $product->id }}"><i class="far fa-trash-alt fa-lg text-white"></i></div>
                            </div>

                        </div>
                    </div>
                    <hr>
                </div>
                @else
            <div id="basket-{{ $product->id }}">
            <div class="row mb-2">
                <div class="col-lg-1 col-6">
                    <img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
                </div>
                <div class="col-lg-3 col-6 d-flex align-items-center ">
                    <p class="font-size-16 font-weight-light"> {{ $product->title }}</p>
                </div>
                <div class="col-lg-3 col-6 d-flex align-items-center">
                    <p class="font-size-16 font-weight-light"> Артикль: <br>{{ $product->article }}</p>
                </div>
                <div class="col-lg-3 col-6 d-flex align-items-center">
                    <div class="d-flex">
                        @foreach($product->colors as $color)
                            <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <div class="p-2 bg-danger rounded cart-delete" style="cursor: pointer;" data-id="{{ $product->id }}"><i class="far fa-trash-alt fa-lg text-white"></i></div>
                </div>
            </div>
            <hr>
            </div>
            @endif
        @endforeach
        <form class="mt-5" action="{{route('basket_save')}}" id="basket-form" method="POST">
            <p class="font-size-18">Введите ваши данные</p>
            @csrf
            <div class="form-label-group">
                <label for="inputName">Имя</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Введите имя" required="" autofocus="">
            </div>
            <div class="form-label-group pt-4">
                <label for="telephone">Номер телефона</label>
                <input type="text" name="phone" id="phone" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 43' placeholder="Введите номер телефона" required="" autofocus="">
            </div>
        </form>
        <button class="btn btn-success px-5 py-2 mt-5 btn-send">Отправить заявку</button>
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
                    $('#basket-' + btn.data('id')).remove();
                },
                error: () => {
                }
            });
        })
    </script>
    <script>
        $('.btn-send').click(function () {
            if ($('#name').val() == '' || $('#phone').val() == '')
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

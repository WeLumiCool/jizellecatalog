
@if(count($products))
@foreach($products as $product)
    <?php
    $lefter = 0;
    if (\Illuminate\Support\Facades\Session::get('quantity')) {
    foreach (\Illuminate\Support\Facades\Session::get('quantity') as $item)
    {
        if ($item['id'] == $product->id)
        {
            $lefter = $item['count'];
        }
    }
    }
    ?>
<div class="col-lg-4 col-10 px-4 mb-5">
    <div class="bg-white position-relative" style="box-shadow: 4px 4px 21px rgba(0, 0, 0, 0.14);">
        <img class="w-100" style="cursor: pointer;" data-toggle="modal" data-target="#product-{{$product->id}}" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
        <div class="p-3">
            <p class="font-size-12 text-secondary font-weight-light mb-1">{{$product->article}}</p>
            <p class="font-size-18 text-dark mb-1">{{ $product->title }}</p>
            <div class="d-flex">
                @foreach($product->colors as $color)
                    <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>
                @endforeach
            </div>
            {{--<div class="d-flex justify-content-start mt-2">--}}

            {{--</div>--}}

            <div class="d-flex justify-content-between mt-2">
                <div>
                <p class="font-size-12 mb-0 text-secondary font-weight-light">Размер: {{ $product->size }}</p>
                <p class="font-size-12 text-secondary font-weight-light mb-0">{{ $product->price }} руб</p>
                </div>
                    <div class="d-flex align-items-center justify-content-center order-settings" data-id="{{$product->id}}" style="width: 80px; background: #2F2F2F; cursor: pointer; transition: 0.5s">
                    <img src="{{ asset('images/addcart.svg') }}" alt="">
                </div>
            </div>
            <div class="counter w-100 py-2 my-2 position-relative" style="background: #d22626;">
                <?php
                    $full = $product->count;
                    $left = $product->quantity - $lefter;
                    $procent = $left / ($full / 100);
                ?>
                <div class="position-absolute py-2" id="quantity-{{$product->id}}" style="background: #3cc13d; right:0%; top: 0%; width: {{ $procent }}%;"></div>
            </div>
            <p class="font-size-12 text-secondary font-weight-light">Доступно для заказа: <span class="letter-{{$product->id}}">{{ $product->quantity - $lefter }}</span> единиц</p>
        </div>
        <div class="position-absolute w-100 h-100 px-2 py-5 bg-white" id="settings-{{$product->id}}" style="top:0%; left:0%; display: none;">
            <img class="position-absolute" style="right:6%; top:2%; cursor: pointer;" id="close" data-id="{{ $product->id }}" src="{{ asset('images/close.svg') }}" alt="">
            <div>
            <p class="font-size-16 font-weight-bold text-center">Параметры</p>
            <div class="form-group">
                <label for="size-{{$product->id}}">Выберите размер</label>
                <select class="form-control" id="size-{{$product->id}}">
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
                    <label for="color-{{$product->id}}">Выберите цвет</label>
                <select class="form-control" id="color-{{$product->id}}">
                   @foreach($product->colors as $color)
                        <option value="{{$color->id}}">{{$color->title}}</option>
                    @endforeach
                </select>
                </div>
                @else
                    <input type="text" hidden id="color-{{$product->id}}" value="{{$product->colors[0]->id}}">
                @endif

            <div class="form-group">
                <div class="form-label-group">
                    <label for="count-{{$product->id}}">Введите количество</label>
                    <input type="number" name="count" id="count-{{$product->id}}" min="1" max="{{$product->quantity - $lefter}}" data-max="{{$product->quantity - $lefter}}" class="form-control input-for-count" placeholder="Введите кол-во" required="" autofocus="">
                </div>
            </div>
            </div>
            <div class="position-absolute" style="bottom: 5%; width: 93%;">
                <p class="font-size-12 text-secondary font-weight-light">Доступно для заказа: <span class="letter-{{$product->id}}">{{ $product->quantity - $lefter }}</span> единиц</p>
                <button class="btn py-2 text-white add-to-cart w-100" data-id="{{ $product->id }}" style="background: #2F2F2F; cursor: pointer;">В корзину</button>
            </div>
            </div>
    </div>
</div>

{{--<div class="modal fade" id="product-{{$product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered">--}}
        {{--<div class="modal-content">--}}
            {{--<button type="button" class="close position-absolute" style="right:5%; top:5%; z-index:9999;" data-dismiss="modal" aria-label="Close">--}}
                {{--<img src="{{ asset('images/close.svg') }}" alt="">--}}
            {{--</button>--}}
            {{--<div class="modal-body text-center" style="padding: 40px;">--}}
                {{--<div class="px-5">--}}
                    {{--<img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">--}}
                {{--</div>--}}
                {{--<div class="text-left px-5 mt-4">--}}
                {{--<p class="font-size-12 text-secondary font-weight-light mb-1">{{$product->article}}</p>--}}
                {{--<p class="font-size-18 text-dark mb-1">{{ $product->title }}</p>--}}
                    {{--<div class="d-flex">--}}
                        {{--@foreach($product->colors as $color)--}}
                            {{--<div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endforeach
@else
<div class="col-12">
    <p class="font-size-20 text-center font-weight-light">
        Список пуст
    </p>
</div>
@endif
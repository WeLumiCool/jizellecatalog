<?php
$agent = new \Jenssegers\Agent\Agent();
?>
@if(count($products))
@foreach($products as $product)
<div class="col-lg-4 col-6 px-lg-4 px-1 mb-lg-5 mb-4">
    <a href="{{ route('product/show', $product->id) }}" style="text-decoration: none;">
    <div class="bg-white position-relative h-100" style="box-shadow: 4px 4px 21px rgba(0, 0, 0, 0.14);">
        @if(isset($product->type))
            <img class="position-absolute" src="{{ asset('storage/'.$product->type->icon) }}" style="top:3%; right: 3%; max-width: {{ $agent->isMobile() ? '30px' : '50px' }};">
        @endif
        <img class="w-100" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
        <div class="p-3" style="">
            <p class="font-size-18 text-dark mb-1 line-height-110 mb-2" style="height: 40px; overflow-y: hidden;">{{ $product->title }}</p>
            <div class="row">
                <div class="col-6">
                    <p class="font-size-14 font-weight-light openSans text-dark mb-0">
                        Опт
                    </p>
                    <p class="font-size-16 font-weight-normal openSans text-dark mb-0">
                        {{ $product->price_opt }} p.
                    </p>
                </div>
                <div class="col-6">
                    <p class="font-size-14 font-weight-light openSans mb-0" style="color: #DA9966;">
                        Розница
                    </p>
                    <p class="font-size-16 font-weight-normal openSans mb-0" style="color: #DA9966;">
                        {{ $product->price }} p.
                    </p>
                </div>
            </div>
            <div class="mt-2">
                <p class="font-size-14 font-weight-normal mb-0 text-dark">
                    Размеры:
                </p>
                <div class="d-flex">
                    @foreach($product->sizes as $size)
                        <span class="font-size-12 text-dark font-weight-light mr-1">{{ $size->size }}{{$loop->last ? '' : ','}}</span>
                    @endforeach
                </div>
            </div>
                {{--@foreach($product->colors as $color)--}}
                    {{--<div class="mr-1 rounded-circle" style="border: 1px solid #656565; width:20px; height:20px; background-color: {{ $color->color }}"></div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
            {{--<div class="d-flex justify-content-start mt-2">--}}

            {{--</div>--}}
            {{--<div class="d-flex justify-content-between mt-2 position-relativex" style="bottom: 0%;">--}}
                {{--<div>--}}
                {{--<p class="font-size-12 mb-0 text-secondary font-weight-light">Размер: {{ $product->size }}</p>--}}

                {{--</div>--}}
                    {{--<div class="d-flex align-items-center justify-content-center order-settings" data-id="{{$product->id}}" style=" background: #2F2F2F; cursor: pointer; transition: 0.5s">--}}
                        {{--<img src="{{ asset('images/addcart.svg') }}" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
        {{--<div class="position-absolute w-100 h-100 px-2 py-lg-5 py-2 bg-white" id="settings-{{$product->id}}" style="top:0%; left:0%; display: none;">--}}
            {{--<img class="position-absolute" style="right:6%; top:2%; cursor: pointer;" id="close" data-id="{{ $product->id }}" src="{{ asset('images/close.svg') }}" alt="">--}}
            {{--<div>--}}
            {{--<p class="font-size-16 font-weight-bold text-center">Параметры</p>--}}
            {{--<div class="form-group">--}}
                {{--<label class="font-size-12" for="size-{{$product->id}}">Выберите размер</label>--}}
                {{--<select class="form-control" id="size-{{$product->id}}">--}}
                    {{--<option>52</option>--}}
                    {{--<option>54</option>--}}
                    {{--<option>56</option>--}}
                    {{--<option>58</option>--}}
                    {{--<option>60</option>--}}
                    {{--<option>62</option>--}}
                {{--</select>--}}
            {{--</div>--}}

                {{--@if(count($product->colors) > 1)--}}
                {{--<div class="form-group">--}}
                    {{--<label class="font-size-12" for="color-{{$product->id}}">Выберите цвет</label>--}}
                {{--<select class="form-control" id="color-{{$product->id}}">--}}
                   {{--@foreach($product->colors as $color)--}}
                        {{--<option value="{{$color->id}}">{{$color->title}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--@else--}}
                    {{--<input type="text" hidden id="color-{{$product->id}}" value="{{$product->colors[0]->id}}">--}}
                {{--@endif--}}

            {{--<div class="form-group">--}}
                {{--<div class="form-label-group">--}}
                    {{--<label class="font-size-12" for="count-{{$product->id}}">Введите количество</label>--}}
                    {{--<input type="text" name="count" id="count-{{$product->id}}" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Введите кол-во" required="" autofocus="">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
                {{--<button class="btn py-2 text-white position-absolute add-to-cart" data-id="{{ $product->id }}" style="background: #2F2F2F; cursor: pointer;bottom: 5%; width: 93%;">В корзину</button>--}}
            {{--</div>--}}
    </div>
    </a>
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
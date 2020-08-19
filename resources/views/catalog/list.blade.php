
@if(count($products))
@foreach($products as $product)
<div class="col-lg-4 col-10 px-4 mb-5">
    <div class="bg-white" style="box-shadow: 4px 4px 21px rgba(0, 0, 0, 0.14);">
        <img class="w-100" data-toggle="modal" data-target="#product-{{$product->id}}" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
        <div class="p-3">
            <p class="font-size-12 text-secondary font-weight-light mb-1">{{$product->article}}</p>
            <p class="font-size-18 text-dark mb-1">{{ $product->title }}</p>
            <div class="d-flex">
                @foreach($product->colors as $color)
                    <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>
                @endforeach
            </div>
            <div class="d-flex justify-content-between mt-2">
                <p class="font-size-12 text-secondary font-weight-light">{{ $product->price }} руб</p>
                <div class="d-flex align-items-center justify-content-center add-to-cart" data-id="{{ $product->id }}" style="width: 80px; background: #2F2F2F; cursor: pointer; transition: 0.5s">
                    <img src="{{ asset('images/addcart.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="product-{{$product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close position-absolute" style="right:5%; top:5%; z-index:9999;" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('images/close.svg') }}" alt="">
            </button>
            <div class="modal-body text-center" style="padding: 40px;">
                <div class="px-5">
                    <img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
                </div>
                <div class="text-left px-5 mt-4">
                <p class="font-size-12 text-secondary font-weight-light mb-1">{{$product->article}}</p>
                <p class="font-size-18 text-dark mb-1">{{ $product->title }}</p>
                    <div class="d-flex">
                        @foreach($product->colors as $color)
                            <div class="mr-1 rounded-circle" style="width:20px; height:20px; background-color: {{ $color->color }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col-12">
    <p class="font-size-20 text-center font-weight-light">
        Список пуст
    </p>
</div>
@endif
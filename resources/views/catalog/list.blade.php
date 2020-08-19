
@if(count($products))
@foreach($products as $product)
<div class="col-lg-4 col-10 px-4 mb-5">
    <div class="bg-white" style="box-shadow: 4px 4px 21px rgba(0, 0, 0, 0.14);">
        <img class="w-100" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
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
                <div class="d-flex align-items-center justify-content-center" style="width: 80px; background: #2F2F2F;">
                    <img src="{{ asset('images/addcart.svg') }}" alt="">
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
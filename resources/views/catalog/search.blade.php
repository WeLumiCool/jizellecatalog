@if($products != null)
<div class="container border py-3">
@foreach($products as $product)
<div class="row mb-1" data-toggle="modal" data-target="#product-{{$product->id}}" style="cursor: pointer;">
    <div class="col-3">
        <img class="img-fluid" src="{{ asset('storage/'.json_decode($product->image)[0]) }}" alt="">
    </div>
    <div class="col-3">{{$product->title}}</div>
    <div class="col-3">{{$product->article}}</div>
    <div class="col-3">{{$product->price}}руб</div>
</div>
    @endforeach
</div>
@else
    <div class=""></div>
@endif
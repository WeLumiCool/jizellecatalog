@component('mail::message')
    <html>
    <body>
    <div class="TTBold" style="padding:4%; border:4px #a2e0ff solid;">
        <br>
        <span class="TTBold" style="font-size:40px; color:#000000">Jizzele Catalog</span>
        <br>
        <h2 class="TTMedium"><strong>Новая заявка с Сайта</strong></h2>
        <br>
        Информация о заказе
        <br>
        <br>
        @foreach($products as $product)
           {{$loop->index + 1}}) <strong>{{\App\Product::find($product['id'])->title}}</strong> артикль: <strong>{{ \App\Product::find($product['id'])->article }}</strong>  цвет: <strong>{{ \App\Color::find($product['color'])->title }}</strong>  кол-во: <strong>{{ $product['count'] }}</strong>
            <br>
        @endforeach
        <br>
        <strong>Итого: {{$total}} руб</strong>
        <br>
        <br>
        <strong class="TTLight">Имя:</strong> {{ $name }}<br>
        <strong class="TTLight">Телефон:</strong> {{ $phone }}<br>
        <strong class="TTLight">Город:</strong> {{ $city }}<br>
        <br>


</div></body></html>
    {{--<img src="" style="width:50px; height:60px;" alt="">--}}

@endcomponent
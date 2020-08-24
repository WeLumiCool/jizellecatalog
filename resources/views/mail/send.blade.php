@component('mail::message')
    <html>
    <body>
    <div class="TTBold" style="padding:7%; border:4px #000000 solid;">
        <br>
        <span class="TTBold" style="font-size:40px; color:#000000">Jizzele Catalog</span>
        <br>
        <h2 class="TTMedium"><strong>Новая заявка с Сайта</strong></h2>
        <br>
        Информация о клиенте
        <br>
        <br>
        <strong class="TTLight">Имя:</strong> {{ $name }}<br>
        <strong class="TTLight">Телефон:</strong> {{ $phone }}<br>
        <strong class="TTLight">Город:</strong> {{ $city }}<br>
        <br>

        @foreach($products as $product)
            {{ $product->title }}  {{ $product->article }}
        @endforeach

    {{--<img src="" style="width:50px; height:60px;" alt="">--}}

@endcomponent
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
            <div class="shadow-lg p-5 rounded">
                <div class="mb-3">
                    <img src="{{ asset('images/logo.svg') }}" alt="">
                </div>
                <p class="font-size-16 text-center mb-4">
                    Благодарим что оставили  контакты <br>
                    Мы с Вами свяжемся в течении 15 минут
                </p>
                <div class="text-center">
                <a href="/">
                    <button class="btn btn-success px-5 py-2">Вернуться на главную</button>
                </a>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{$name}}" id="name">
    <input type="hidden" value="{{$total}}" id="total">
    <input type="hidden" value="{{$phone}}" id="phone">
    <input type="hidden" value="{{$city}}" id="city">

@endsection
@push('scripts')
    <script>
        var total = $('#total').val();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var city = $('#city').val();

        $(document).ready(function () {
            $.ajax({
                type: "GET",
                // url: 'https://jizelle.bitrix24.ru/rest/29/8xs8eym7oajxxzvp/crm.lead.add.json?FIELDS[TITLE]=' + name + '&FIELDS[NAME]=' + name + '&FIELDS[PHONE][0][VALUE]=' + phone + '&FIELDS[PHONE][0][VALUE_TYPE]=WORK&FIELDS[CURRENCY_ID]=RUB&FIELDS[OPPORTUNITY]=' + total + '&FIELDS[UF_CRM_1608877126999]=' + city,
                url: 'https://jizelle.bitrix24.ru/rest/29/8xs8eym7oajxxzvp/crm.lead.add.json?FIELDS[TITLE]=' + name + '&FIELDS[NAME]=' + name + '&FIELDS[PHONE][0][VALUE]=' + phone + '&FIELDS[PHONE][0][VALUE_TYPE]=WORK&FIELDS[CURRENCY_ID]=RUB&FIELDS[UF_CRM_1608878329298]=' + total + '&FIELDS[UF_CRM_1608877126999]=' + city + '&FIELDS[UF_CRM_1608878329298_l33h7]=RUB',

                // serializes the form's elements.
                success: function (data) {
                    console.log('success');
                }
            });
        });
    </script>
@endpush
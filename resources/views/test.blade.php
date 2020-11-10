@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('content')
<div class="container my-5">
    <h4>Страна</h4>
    <div class="ui-widget">
        <input class="form-control" id="country" type="text" placeholder="Начните вводить название страны">
    </div>
    <h4>Регион</h4>
    <div class="ui-widget">
        <input class="form-control" id="region" type="text" placeholder="Начните вводить название региона">
    </div>
    <h4>Город</h4>
    <div class="ui-widget">
        <input class="form-control" id="city" type="text" placeholder="Начните вводить название города">
    </div>
    <h4>Район</h4>
    <div class="ui-widget">
        <input class="form-control" id="district" type="text" placeholder="Начните вводить название городского района">
    </div>
</div>
@endsection
@push('scripts')
    {{--AIzaSyChiBsKYGyG6e5V7vpSQYxQTicrXhIgczk--}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChiBsKYGyG6e5V7vpSQYxQTicrXhIgczk&callback=initMap"
            type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var log = function(e){//облегчаем себе жизнь
            return(console.log(e));
        }
        var autocomplete_service = new google.maps.places.AutocompleteService();//подключаем гуглосервис
        var counrty_val = ' ';//это сюда будем писать значения наших местоположений
        var region_val = ' ';
        var city_val = ' ';
        var district_val = ' ';
        var country_list = [];//массивы для всплывающих списков
        var region_list = [];
        var city_list = [];
        var district_list = [];
        $('#country').keyup(function(){
            country_val = $('#country').val();//получаем буквы из нашего инпута для страны
            if(country_val){
                var request = {
                    input: country_val,
                };
                //log(request);
                autocomplete_service.getPlacePredictions(request, google_addresses_callback);//делаем запрос в гугл
                function google_addresses_callback(results, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        var counter = 0;
                        $.each(results, function (index, result) {
                            //log(result);
                            function in_array(value, array) {
                                for (var i = 0; i < array.length; i++) {
                                    if (array[i] == value){
                                        country_list[counter] = result.description;//заполняем результатами из гугла список подсказок во всплывашке
                                        counter++;
                                        return true;
                                    }
                                }
                                return false;
                            }
                            if (in_array("country", result.types)) {
                                //log(result);
                            }
                        });
                    }
                    else{
                        log('no result');
                    }
                }
                $("#country").autocomplete({//инициализируем Jquery UI Autocomplete
                    source: country_list,
                    focus: displayItem,
                    select: displayItem,
                    change: displayItem
                });
                function displayItem(event, ui) {//если автоподстановка произошла, забираем новое значение
                    if(ui.item){
                        country_val = ui.item.label;
                    }
                }
            }
        });
        //в принципе дальше по аналогии с небольшими изменениями
        $('#region').keyup(function(){
            region_val = country_val+' '+$('#region').val();//дописываем к значению инпута, значение предведущего инпута
            var request = {
                input: region_val,
            };
            //log(request);
            autocomplete_service.getPlacePredictions(request, google_addresses_callback);
            function google_addresses_callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    var counter = 0;
                    $.each(results, function (index, result) {
                        //log(result);
                        function in_array(value, array) {
                            for (var i = 0; i < array.length; i++) {
                                if (array[i] == value){
                                    var formated = result.description;
                                    formated = formated.split(',');//отсекаем значение предведущего инпута. в подсказке оно нам не нужно
                                    region_list[counter] = formated[0];
                                    counter++;
                                    return true;
                                }
                            }
                            return false;
                        }
                        if (in_array("administrative_area_level_1", result.types)) {
                            //log(result);
                        }
                    });
                }
                else{
                    log('no result')
                }
            }
            $( "#region" ).autocomplete({
                source: region_list,
                focus: displayItem,
                select: displayItem,
                change: displayItem
            });
            function displayItem(event, ui) {
                if(ui.item){
                    region_val = ui.item.label;
                }
            }
        });
        $('#city').keyup(function(){
            city_val = region_val+' '+$('#city').val();
            var request = {
                input: city_val,
            };
            //log(request);
            autocomplete_service.getPlacePredictions(request, google_addresses_callback);
            function google_addresses_callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    var counter = 0;
                    $.each(results, function (index, result) {
                        //log(result);
                        function in_array(value, array) {
                            for (var i = 0; i < array.length; i++) {
                                if (array[i] == value){
                                    var formated = result.description;
                                    formated = formated.split(',');
                                    city_list[counter] = formated[0];
                                    counter++;
                                    return true;
                                }
                            }
                            return false;
                        }
                        if (in_array("locality", result.types)) {
                            //log(result);
                        }
                    });
                }
                else{
                    log('no result')
                }
            }
            $( "#city" ).autocomplete({
                source: city_list,
                focus: displayItem,
                select: displayItem,
                change: displayItem
            });
            function displayItem(event, ui) {
                if(ui.item){
                    city_val = ui.item.label;
                }
            }
        });
        $('#district').keyup(function(){
            district_val = city_val+' '+$('#district').val();
            var request = {
                input: district_val,
            };
            //log(request);
            autocomplete_service.getPlacePredictions(request, google_addresses_callback);
            function google_addresses_callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    var counter = 0;
                    $.each(results, function (index, result) {
                        //log(result);
                        function in_array(value, array) {
                            for (var i = 0; i < array.length; i++) {
                                if (array[i] == value){
                                    var formated = result.description;
                                    formated = formated.split(',');
                                    district_list[counter] = formated[0];
                                    counter++;
                                    return true;
                                }
                            }
                            return false;
                        }
                        if (in_array("sublocality_level_2", result.types)) {
                            //log(result);
                        }
                    });
                }
                else{
                    log('no result')
                }
            }
            $( "#district" ).autocomplete({
                source: district_list,
                focus: displayItem,
                select: displayItem,
                change: displayItem
            });
            function displayItem(event, ui) {
                if(ui.item){
                    district_val = ui.item.label;
                }
            }
        });
    </script>
@endpush
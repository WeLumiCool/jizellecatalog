@if(!$agent->isMobile())
<div class="modal fade bd-example-modal-lg" id="table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="close position-absolute" style="right:5%; top:5%; z-index:9999;" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('images/close.svg') }}" alt="">
            </button>
            <div class="modal-body">
            <div class="row p-4">
                <div class="col-12">
                    <img class="img-fluid" src="{{ asset('images/table-lg1.jpg') }}" alt="">
                </div>
                {{--<div class="col-12 mt-5">--}}
                    {{--<img class="img-fluid" src="{{ asset('images/table-lg2.jpg') }}" alt="">--}}
                {{--</div>--}}
            </div>
                <div class="p-4">
                    <p class="font-size-14 line-height-120 mb-1">Модели полноразмерные соответствуют российской
                        размерной сетке</p>
                    <p class="font-size-14 line-height-120">Размерный ряд 52-62. Рост 164-170. </p>
                </div>
                </div>
        </div>
    </div>
</div>
@else
    <div class="modal fade bd-example-modal-lg" id="table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="close position-absolute" style="right:5%; top:5%; z-index:9999;" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('images/close.svg') }}" alt="">
                </button>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="col-12 py-3" style="background-color: #D0E2F2;">
                            <p class="font-size-18 text-center mb-0"> Таблица размеров</p>
                        </div>
                        <div class="col-4 shadow-lg">
                            <div class="d-flex align-items-center" style="height: 77px;">
                                <p class="font-size-14 font-weight-light mb-0 py-3" >Размеры</p>
                            </div>
                            <div class="d-flex align-items-center" style="height: 77px;">
                                <p class="font-size-14 font-weight-light mb-0 py-3">Обхват груди, в см</p>
                            </div>
                            <div class="d-flex align-items-center" style="height: 77px;">
                                <p class="font-size-14 font-weight-light mb-0 py-3" style="height: 77px;">Обхват талии, в см</p>
                            </div>
                            <div class="d-flex align-items-center" style="height: 77px;">
                                <p class="font-size-14 font-weight-light mb-0 py-3" style="height: 77px;">Обхват бедер, в см</p>
                            </div>

                        </div>
                        <div class="col-8 px-0" style="overflow-x: auto; overflow-y: hidden">
                            <div class="d-flex py-3 align-items-center" style="width:max-content; height: 77px;">
                                {{--<div class="text-center" style="width: 80px;">40</div>--}}
                                {{--<div class="text-center" style="width: 80px;">42</div>--}}
                                {{--<div class="text-center" style="width: 80px;">44</div>--}}
                                {{--<div class="text-center" style="width: 80px;">46</div>--}}
                                <div class="text-center" style="width: 80px;">48</div>
                                <div class="text-center" style="width: 80px;">50</div>
                                <div class="text-center" style="width: 80px;">52</div>
                                <div class="text-center" style="width: 80px;">54</div>
                                <div class="text-center" style="width: 80px;">56</div>
                                <div class="text-center" style="width: 80px;">58</div>
                                <div class="text-center" style="width: 80px;">60</div>
                                <div class="text-center" style="width: 80px;">62</div>
                            </div>
                            <div class="d-flex py-3" style="background-color: #EEEEEE; width: max-content; height: 77px;">
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">74-80</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">82-85</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">86-89</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">90-93</div>--}}
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">94-97</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">98-101</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">102-105</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">108-111</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">112-115</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">116-119</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">120-123</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">124-127</div>
                            </div>
                            <div class="d-flex py-3" style="width: max-content; height: 77px;">
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">60-65</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">66-69</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">70-73</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">74-77</div>--}}
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">78-81</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">82-85</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">86-89</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">90-93</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">94-97</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">98-101</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">102-105</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">106-109</div>
                            </div>
                            <div class="d-flex py-3" style="background-color: #EEEEEE; width: max-content; height: 77px;">
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">86-89</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">90-93</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">94-97</div>--}}
                                {{--<div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">98-101</div>--}}
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">102-105</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">106-109</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">110-114</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">115-118</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">119-122</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">123-126</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">127-130</div>
                                <div class="text-center d-flex align-items-center justify-content-center" style="width: 80px;">131-134</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
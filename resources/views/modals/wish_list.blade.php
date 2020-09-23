<div class="modal fade bd-example-modal" id="wish-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <button type="button" class="close position-absolute" style="right:5%; top:5%; z-index:9999;" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('images/close.svg') }}" alt="">
            </button>
            <div class="modal-body">
                <div class="row p-4">
                    <div class="col-12">
                        <p class="font-weight-normal text-center font-size-18">Отправьте нам список моделей</p>
                    </div>
                    <form class="col-12 wish-list-form" action="{{ route('wish_list') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-light font-size-14">Введите ваше ФИО</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-light font-size-14">Введите ваш Номер телефона</label>
                            <input type="text" id="phone" name="phone" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-light font-size-14">Введите ваш Email</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="photos" class="font-weight-light font-size-14">Выберите фото моделей</label>
                                <input type="file" id="photos" name="photos[]" multiple class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="desc" class="font-weight-light font-size-14">Комментарий (если у вас нет фото, скопируйте ссылки в комментарии)</label>
                            <textarea type="text" rows="4" id="desc" name="desc" class="form-control" required></textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-info btn-submit px-5">Отправить</button>
                        </div>
                    </form>
                    {{--<div class="col-12 mt-5">--}}
                    {{--<img class="img-fluid" src="{{ asset('images/table-lg2.jpg') }}" alt="">--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
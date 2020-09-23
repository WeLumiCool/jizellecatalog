@extends('layouts.app')
@section('content')

    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center mb-4">Wish List</h4>
            </div>
            @foreach($wishes as $wish)
                @foreach($wish->images as $image)
                    <div class="col-2">
                        <a href="{{ asset('storage/'.$image->photo) }}" data-fancybox="wish-{{$wish->id}}">
                            <img class="w-100 border" src="{{ asset('storage/'.$image->photo) }}" alt="">
                        </a>
                    </div>
                @endforeach
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-3">
                            <strong>Фио:</strong> <p>{{$wish->name}}</p>
                        </div>
                        <div class="col-3">
                            <strong>Телефон:</strong> <p>{{$wish->phone}}</p>
                        </div>
                        <div class="col-3">
                            <strong>Email:</strong> <p>{{$wish->email}}</p>
                        </div>
                        <div class="col-3">
                            <strong>Коммент:</strong> <p>{{$wish->comment}}</p>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

@endsection
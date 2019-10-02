@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="animated fadeIn">
            <div class="row">
                @foreach($buses as $bus)
                    <div class="col-md-{{$width ?? 4}}">
                        <a href="{{ route('volgabus',['id' => $bus->title ]) }}">
                            <div class="row" style="height:75px">
                            <img height="75" src="{{ asset('img/team/nanji.png') }}">
                            </div>
                            <div class="row" style="height:25px">
                                {{ $bus->title }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
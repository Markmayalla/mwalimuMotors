@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="animated fadeIn">
        <div class="card col-md-12">
            <div class="card-header">
                Cars
            </div>
            <div class="card-body">
                <a href="{{ route('car.create') }}">
                    <button class="btn btn-primary pull-right">Create</button>
                </a>
                <br />
                @php 
                    function display_image($image){
                        if($image != "avatar.png"){
                            if($image != ""){
                                $image = Storage::disk('public')->url($image);
                                return "<img src='$image' height='50'/>";
                            }
                        }
                        return "No Image";
                    }
                @endphp
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <td>Car</td>
                                <td>Transmision</td>
                                <td>Fuel</td>
                                <td>Color</td>
                                <td>Body type</td>
                                <td>Picture</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                                    
                                <tr>
                                    <td>{{ $car->brands->name . " " . $car->models->name }}</td>
                                    <td>{{ $car->transmissions->name }}</td>
                                    <td>{{ $car->fuels->name }}</td>
                                    <td>{{ $car->colors->name }}</td>
                                    <td>{{ $car->body_types->name }}</td>
                                    <td>
                                        @if(count($car->pictures))
                                            {!! display_image($car->pictures[0]->picture) !!}
                                        @endif
                                    </td>
                                    <td><a href="{{ route('car.picture',['id' => $car->id ]) }}">Picture</a></td>
                                    <td><a href="{{ route('car.block',['id' => $car->id ]) }}">{{ $car->status ? "Block" : "Un Bllock" }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('model_errors')
        <?php
            if(0 == 1){
                $call_model_sms("Do Locked","Do locked by $locker","success");
            }
        ?>
@endsection

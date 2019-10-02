@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="animated fadeIn">
        <div class="card col-md-12">
            <div class="card-header">
            Driving Wheel
            </div>
            <div class="card-body">
                <a href="{{ route('driving_wheel.create') }}">
                    <button class="btn btn-primary pull-right">Create</button>
                </a>
                <br>
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
                                <td>Name</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($driving_wheels as $driving_wheel)
                                <tr>
                                    <td>{{ $driving_wheel->name }}</td>
                                    <td><a href="{{ route('driving_wheel.edit',['id' => $driving_wheel->id ]) }}">{{ "Edit" }}</a></td>
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

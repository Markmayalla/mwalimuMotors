@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="animated fadeIn">
        <div class="card col-md-12">
            <div class="card-header">
                Cars Picture
            </div>
            <div class="card-body">
                <br>
                @php 
                    function display_image($image){
                        if($image != "avatar.png"){
                            if($image != ""){
                                $image = \Illuminate\Support\Facades\Storage::disk('public')->url($image);
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
                                <td>Pictures</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($car->pictures as $pic)
                                <tr>
                                    <td>{!! display_image($pic->picture) !!}</td>
                                    <td><a href="{{ route('car.picture',['id' => $car->id ]) }}?action=delete&picture={{$pic->id}}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    <div class="row">
                        <form class="form" method="POST" class="col-md-5 pull-right" action="{{ route('car.update',['id' => $car->id]) }}?picture" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <input type="file" name="picture[]" id="picture[]" multiple class="form-control">
                            <input type="submit" class="btn btn-primary pull-right" value="Upload">
                        </form>
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

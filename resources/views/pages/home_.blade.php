@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="animated fadeIn" align="center">
        Hey There      
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

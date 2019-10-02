@extends('layouts.app2')
@section('content')
    @php($data = array_merge($data,['main_page' => 'driving_wheel']))
    @component('creators/edit',$data)
    @endcomponent
@endsection
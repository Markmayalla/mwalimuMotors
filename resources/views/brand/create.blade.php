@extends('layouts.app2')
@section('content')
    @php($data = array_merge($data,['main_page' => 'brand']))
    @component('creators/create',$data)
    @endcomponent
@endsection
@extends('layouts.app2')
@section('content')
    @php($data = array_merge($data,['main_page' => 'model']))
    @component('creators/edit',$data)
    @endcomponent
@endsection
@extends('layouts.app2')
@section('content')
    @php($data = array_merge($data,['main_page' => 'transmission']))
    @component('creators/edit',$data)
    @endcomponent
@endsection
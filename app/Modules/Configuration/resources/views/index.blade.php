@extends('configuration::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('configuration.name') !!}</p>
@endsection

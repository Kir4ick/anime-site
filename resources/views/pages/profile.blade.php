@extends('layouts.layout')

@section('title', $nickname)

@section('content')
<section class="main">

    @include('layouts.admin.header')

    <profile
        href-image = '{!! asset('img/Group 157.png') !!}'
        href-patch = '{!! 'http' !!}'
        action-create = '{!! route('create-article') !!}'
        loader = '{!! asset('img/tube-spinner.svg') !!}'
    ></profile>

</section>
@endsection

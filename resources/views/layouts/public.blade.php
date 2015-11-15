@extends('layouts.master')

@section('assets')
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Alex Jover Morales">

    <link rel="stylesheet" href="{{ URL::asset('css/vendor.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"/>

@endsection

@section('header')
    <header>PUBLIC</header>
@endsection

@section('footer')
    <footer>my footer</footer>
@endsection

@section('js')
    <script src="js/vendor.js"></script>
@endsection
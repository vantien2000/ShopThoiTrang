@extends('users.layouts.master')
@section('content')
    @include('users.layouts.banner')
    <div class="container">
        @include('users.home.top')
        @include('users.home.middle')
        @include('users.home.rule')
        @include('users.home.recomend')
    </div>
@stop
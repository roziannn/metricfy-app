@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="row justify-content-between">
        @include('user.dashboard.partials.profile-card')
        @include('user.dashboard.partials.profile-settings')
    </div>
    <div class="m-5"></div>
@endsection

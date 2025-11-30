@extends('layouts.app')
@section('content')
    @if (Route::currentRouteName() == 'admins.index')
        @include('admins.dashboard.index')
    @endif
@endsection
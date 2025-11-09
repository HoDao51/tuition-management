@extends('admins.layouts.app')

@section('content')
    @if (Route::currentRouteName() == 'admins.index')
        @include('admins.Dashboard.index')
    @endif
@endsection
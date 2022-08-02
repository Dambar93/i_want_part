@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        @include('layouts.admin_navbar')

        @yield('body')
    </div>
@endsection
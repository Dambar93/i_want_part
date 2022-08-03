@extends('layouts.app_admin')

@section('content')
    <div id="app" >
        @include('layouts.admin_navbar')

        @yield('body')
    </div>
@endsection
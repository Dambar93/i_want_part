@extends('layouts.admin_template')

@section('body')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">

    </div>
    
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Order unique ID</td>
            <td>Order status</td>            
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td><a href="{{route('admin.order.show',$order->id)}}">{{ $order->unique_id }}</a></td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
    </table>
    <div style="justify-content:center;">    
        {{ $orders->links() }}
    </div>

    

@endsection

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
            <td>Action</td>
            
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td><a href="{{route('admin.order.show',$order->id)}}">{{ $order->unique_id }}</a></td>
                <td>{{ $order->status }}</td>
                <td>
                    <button class="btn btn-primary"><a style="text-decoration: none; color: white" href="">Edit</a></button>
                    <form action="" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>    
                </td>
            </tr>
        @endforeach
    </table>
    <div style="justify-content:center;">    
        {{ $orders->links() }}
    </div>

    

@endsection

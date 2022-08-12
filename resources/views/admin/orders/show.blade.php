@extends('layouts.admin_template')

@section('body')

<div class="row">
        <div class="col-lg-12 my-2">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('admin/orders') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order ID:</strong>
                {{ $order-> id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unique ID:</strong>
                
                    {{ $order-> unique_id }}
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $order-> status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $order-> address -> country }}, 
                {{ $order-> address -> city }}, 
                {{ $order-> address -> address }}, 
                {{ $order-> address -> zip }} 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Shipping comment:</strong>
                {{ $order-> address -> comment }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order Items:</strong> </br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Main Code</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($order_items as $item)
                            <tr> 
                                <th><img src="{{asset($item -> part -> pictures[0] -> image)}}" class="img-fluid" style="max-width: 150px;" alt=""></th>       
                                <th><a href="{{route('admin.part.show',$item-> item_id)}}">{{$item -> part -> title}} </a> </th>
                                <th>{{$item -> part -> sku}}</th>
                                <th>{{$item -> part -> part_code}}</th>
                                <th>{{$item -> quantity}}</th>
                            </tr>
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection


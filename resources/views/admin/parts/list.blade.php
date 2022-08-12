@extends('layouts.admin_template')

@section('body')
    @include('layouts.messages')  
    <div>
        <a href="{{ url('admin/parts/create') }}" class="btn btn-primary">Add New Part</a>
    </div>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>

            <th scope="col">Title</th>
            <th scope="col">Condition</th>
            <th scope="col">Car</th>
            <th scope="col">SKU</th>
            <th scope="col">Main Part Code</th>
            
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Other code</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($parts as $part)
            <tr>
                <th scope="row">{{$part->id}}</th>
                <th scope="row"> 
                    
                    @if (isset($part->pictures[0]->image))
                       <img src="{{asset($part->pictures[0]->image)}}" class="img-fluid" style="max-width: 150px;"alt=""> 
                       
                    @endif
                    
                   </th>
                <th scope="row"><a href="{{route('admin.part.show',$part->id)}}">{{$part->title}}</a></th>
                <th scope="row">{{$part->condition}}</th>
                <th scope="row">{{$part->car->model}}</th>
                <th scope="row">{{$part->sku}}</th>
                <th scope="row">{{$part->part_code}}</th>
                
                <th scope="row">{{$part->category->name}}</th>
                <th scope="row">{{$part->price}}</th>
                <th scope="row">{{$part->quantity}}</th>
                <th scope="row">

                    @foreach ( $part->codes as $code )
                        {{$code->code}}
                    @endforeach
                </th>
                <th scope="row">
                <button class="btn btn-primary"><a style="text-decoration: none; color: white" href="{{route('admin.part.edit', $part->id)}}">Edit</a></button>
                    <form action="{{route('admin.part.destroy',$part->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>   
                </th>    
            </tr>  
        @endforeach      
    </tbody>
    </table>

    <div style="justify-content:center;">    
        {{ $parts->links() }}
    </div>

@endsection

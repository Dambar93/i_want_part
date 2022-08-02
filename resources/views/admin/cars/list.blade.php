@extends('layouts.admin_template')

@section('body')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{route('admin.car.create')}}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <h2>Not deletable if got part assigned </h2>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Manufacture</td>
            <td>Model</td>
            <td>Year</td>
            <td>Fuel type</td>
            <td>Wheel side</td>
            <td>Engine Code</td>
            <td>Gearbox</td>
            <td>Body type</td>
            <td>Color</td>
            <td>KM</td>
            <td>Engine displacement</td>
            <td>KW</td>
            <td>Action</td>
        </tr>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->manufacture->name }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->fuel_type }}</td>
                <td>{{ $car->wheel_placement }}</td>
                <td>{{ $car->engine_code }}</td>
                <td>{{ $car->gearbox }}</td>
                <td>{{ $car->body_type }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->km }}</td>
                <td>{{ $car->engine_displacement }} &#13220</td>
                <td>{{ $car->power }}</td>                
                <td>
                    <button class="btn btn-primary"><a style="text-decoration: none; color: white" href="{{ route('admin.car.edit',$car->id) }}">Edit</a></button>
                    <form action="{{route('admin.car.destroy',$car->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>                
            </tr>
        @endforeach
    </table>
    <div style="justify-content:center;">    
        {{ $cars->links() }}
    </div>
    

@endsection

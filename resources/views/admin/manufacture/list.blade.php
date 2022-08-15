@extends('layouts.admin_template')

@section('body')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{route('admin.manufacture.create')}}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <h2>Not deletable if got part assigned </h2>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Manufacture</td>
            <td>Action</td>

        </tr>
        @foreach($manufactures as $manufacture)
            <tr>
                <td>{{ $manufacture->id }}</td>
                <td>{{ $manufacture->name }}</td>
                <td>
                    <form action="{{route('admin.manufacture.destroy',$manufacture->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>    
                </td>
            </tr>
        @endforeach
    </table>
    <div style="justify-content:center;">    
        {{ $manufactures->links() }}
    </div>

    

@endsection

@extends('layouts.admin_template')

@section('body')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{ url('admin/category/create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <h2>Not deletable if got part assigned </h2>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Parent name</td>
            <td>Active</td>
            <td>Delete</td>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td><a href="{{ url('admin/category/show', $category->id) }}">{{ $category->name }}</a></td>
                <td>
                    @if($category->parentCategory)
                        {{ $category->parentCategory->name }}
                    @endif
                </td>
                <td>{{ $category->active }}</td>
                <td>
                    <button class="btn btn-primary"><a style="text-decoration: none; color: white" href="{{ route('admin.category.edit',$category->id) }}">Edit</a></button>
                    <form action="{{route('admin.category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>    
                </td>
            </tr>
        @endforeach
    </table>
    <div style="justify-content:center;">    
        {{ $categories->links() }}
    </div>
    

@endsection

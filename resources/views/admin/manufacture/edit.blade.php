@extends('layouts.admin_template')

@section('body')
 
<form action="{{ route('admin.category.edit',$category->id) }}" method="post">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Parent category:</strong>
                    <select class="form-select" name="category_id">
                        <option value="">--</option>
                        @foreach($firstLevelCategories as $oneCategory)
                        <option @if ($category->category_id===$oneCategory->id) selected
                            
                        @endif value="{{ $oneCategory->id }}" >{{ $oneCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input type="checkbox" name="active" value="1" id="flexCheckChecked" class="form-check-input"
                           @if ($category->active ===1)
                           checked
                        @endif
                    >
                    <label class="form-check-label" for="flexCheckChecked">
                        Active
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
@extends('layouts.admin_template')

@section('body')
 
<form action="{{ route('admin.parts.create') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input required type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>SKU:</strong>
                    <input required type="text" name="sku" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror" placeholder="SKU">
                    @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Condition</strong>
                    <select class="form-select" name="condition">
                        <option value="used">Used</option>                        
                        <option value="new">New</option>
                        <option value="for parts">For parts</option>                      
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Main Part Code:</strong>
                    <input required type="text" name="part_code" value="{{ old('part_code') }}" class="form-control @error('part_code') is-invalid @enderror" placeholder="Part Code">
                    @error('part_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10 ">
                <div class="form-group field_wrapper">
                    <strong>Other Part Codes:</strong>
                    <input type="text" name="code[]" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror" placeholder="Additional Part Code">
                    
                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <a href="javascript:void(0);" class="add_button" title="Add field">Add Field</a>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Comment:</strong>
                    <input type="text" name="comment" value="{{ old('comment') }}" class="form-control @error('comment') is-invalid @enderror" placeholder="Comment">
                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select class="form-select" name="category_id"  >
                        
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Manufacture:</strong>
                    <select class="form-select" name="manufacture_id"  >
                        
                        @foreach($manufactures as $manufacture)
                            <option value="{{ $manufacture->id }}">{{ $manufacture->name }}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Car:</strong>
                    <select class="form-select" name="car_id"  >
                        
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->manufacture->name}}, {{$car->model}}, {{$car->year}} year, {{$car->fuel_type}}, {{$car->engine_displacement}} &#13220, {{$car->power}} Kw, {{$car->gearbox}}, {{$car->body_type}} </option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input required type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" placeholder="Price in $">
                    @error('price')<div class="invalid-feedback">{{ $message }} </div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input required type="number" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity">
                    @error('quantity')<div class="invalid-feedback">{{ $message }} </div>@enderror
                </div>
            </div>
            
            
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input required type="file" name="image[]"  placeholder="Image" accept="image/jpeg, image/png" multiple>
                   
                </div>
            </div>


            <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
@endsection
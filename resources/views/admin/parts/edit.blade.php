@extends('layouts.admin_template')

@section('body')
 
<form action="{{ route('admin.part.edit', $part -> id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $part -> title }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>SKU:</strong>
                    <input type="text" name="sku" value="{{ $part -> sku }}" class="form-control @error('sku') is-invalid @enderror" placeholder="SKU">
                    @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Condtition:</strong>
                    <input type="text" name="sku" value="{{ $part -> condition }}" class="form-control @error('condition') is-invalid @enderror" placeholder="Condition">
                    @error('condition')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Main Part Code:</strong>
                    <input type="text" name="part_code" value="{{ $part -> part_code }}" class="form-control @error('part_code') is-invalid @enderror" placeholder="Part Code">
                    @error('part_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10 ">
                <div class="form-group field_wrapper">

                    <strong>Other Part Codes:</strong>
                    
                    @foreach ($part -> codes as $code)
                    <div><input type="text" name="code[]" value="{{ $code -> code }}" placeholder="Additional part Code" /><a href="javascript:void(0);" class="remove_button">Remove code</a></div>
                    @endforeach
                    
                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <a href="javascript:void(0);" class="add_button" title="Add field">Add Field</a>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Comment:</strong>
                    <input type="text" name="comment" value="{{ $part -> comment }}" class="form-control @error('comment') is-invalid @enderror" placeholder="Comment">
                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select class="form-select" name="category_id"  >
                        <option value="">--</option>
                    
                        @foreach($categories as $category)
                            
                            <option @if ($part -> category_id === $category->id) selected
                                
                            @endif 
                            value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Manufacture:</strong>
                    <select class="form-select" name="manufacture_id"  >
                        <option value="">--</option>
                        @foreach($manufactures as $manufacture)
                            <option @if ($part -> manufacture_id === $manufacture->id) selected
                                
                            @endif
                             value="{{ $manufacture->id }}">{{ $manufacture->name }}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Car:</strong>
                    <select class="form-select" name="car_id"  >
                        <option value="">--</option>
                        @foreach($cars as $car)
                            <option @if ($part -> car_id === $car->id) selected
                           
                            @endif
                             value="{{ $car->id }}">{{ $car->manufacture->name}}, {{$car->model}}, {{$car->year}} year, {{$car->fuel_type}}, {{$car->engine_displacement}} &#13220, {{$car->power}} Kw, {{$car->gearbox}}, {{$car->body_type}} </option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" value="{{ $part -> price }}" class="form-control @error('price') is-invalid @enderror" placeholder="Price in $">
                    @error('price')<div class="invalid-feedback">{{ $message }} </div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" name="quantity" value="{{ $part -> quantity }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity">
                    @error('quantity')<div class="invalid-feedback">{{ $message }} </div>@enderror
                </div>
            </div>
            
            
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Add new images:</strong>

                    <input type="file" name="image[]" placeholder="Image" accept="image/jpeg, image/png" multiple>
                   
                </div>
            </div>


            <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <div>
                <strong>Images:</strong>    
            </div>
            
            <div>
                @foreach ($part->pictures as $image)
                <img src="{{asset($image->image)}}" alt="" class="img-fluid" style="max-width:250px">

                <form action="{{route('admin.image.destroy',$image->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">Delete Image</button>
                </form> 
                
                @endforeach
            </div>
            
        </div>
    </div>
@endsection
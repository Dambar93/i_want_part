@extends('layouts.admin_template')

@section('body')
 
<form action="{{ route('admin.car.create') }}" method="post">
        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manufacture:</strong>
                    <select class="form-select" name="manufacture_id">
                        <option value="">--</option>
                        @foreach($manufactures as $manufacture)
                        <option value="{{ $manufacture->id }}">{{ $manufacture->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model:</strong>
                    <input type="text" name="model" value="{{ old('model') }}" class="form-control @error('model') is-invalid @enderror" placeholder="Model">
                    @error('model')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Year:</strong>
                    <input type="number" name="year" value="{{ old('year') }}" class="form-control @error('year') is-invalid @enderror" placeholder="Year">
                    @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fuel type</strong>
                    <select class="form-select" name="fuel_type">
                        <option value="">Unknown</option>                        
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                        <option value="gas/petrol">Gas/Petrol</option>
                        <option value="electric">Electric</option>
                        <option value="hybrid">Hybrid</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Steering wheel placement</strong>
                    <select class="form-select" name="wheel_placement">
                        <option value="">Unknown</option>  
                        <option value="left">Left</option>                       
                        <option value="right">Right (UK)</option>                                               
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Engine code:</strong>
                    <input type="text" name="engine_code" value="{{ old('engine_code') }}" class="form-control @error('engine_code') is-invalid @enderror" placeholder="Engine code">
                    @error('engine_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gearbox</strong>
                    <select class="form-select" name="gearbox">
                        <option value="">Unknown</option>                        
                        <option value="manual">Manual</option>
                        <option value="automatic">Automatic</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body type</strong>
                    <select class="form-select" name="body_type">
                        <option value="">Unknown</option>                        
                        <option value="sedan">Sedan</option>
                        <option value="coupe">Coupe</option>
                        <option value="suv">SUV</option>
                        <option value="universal">Universal</option>
                        <option value="cabriolet">Cabriolet</option>
                        <option value="hatchback">Hatchback</option>
                        <option value="van">Van</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Odometer km stand:</strong>
                    <input type="number" name="km" value="{{ old('km') }}" class="form-control @error('km') is-invalid @enderror" placeholder="Km">
                    @error('km')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Engine displacement:</strong>
                    <input type="number" name="engine_displacement" value="{{ old('engine_displacement') }}" class="form-control @error('engine_displacement') is-invalid @enderror" placeholder="Cubic centimeters &#13220">
                    @error('engine_displacement')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Power:</strong>
                    <input type="number" name="power" value="{{ old('power') }}" class="form-control @error('power') is-invalid @enderror" placeholder="Power in Kw">
                    @error('power')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Color:</strong>
                    <input type="text" name="color" value="{{ old('color') }}" class="form-control @error('color') is-invalid @enderror" placeholder="Color or color code">
                    @error('color')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Manufacture;

class CarController extends Controller
{
    public function list()
    {
        $cars = Car::paginate(10);

        return view('admin.cars.list', compact('cars'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
             $request->validate([
                'manufacture_id' => 'required',
             ]);

            Car::create($request->all());

            return redirect('admin/cars')
                ->with('success', 'Car created successfully!');
        }
        $manufactures = Manufacture::all();
        
        return view('admin.cars.create', compact('manufactures'));
    }


    public function edit(Car $car, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'manufacture_id' => 'required',
            ]);

            $car->update($request->all());

            return redirect('admin/cars')
               ->with('success', 'Cars updated successfully!');
        }

        $manufactures = Manufacture::all();


        return view('admin.cars.edit', compact('manufactures', 'car'));
    }

    public function destroy(Car $car) //work on no parts on that category
    {
        // $category->steps->delete();
        // MySqlGrammar::compileDisableForeignKeyConstraint();
        $car->delete();
        return redirect(route('admin.cars.list'))
                ->with('success', 'Car deleted successfully!');
    }
}

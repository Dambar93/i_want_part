<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;


class ManufactureController extends Controller
{
    public function list()
    {
        $manufactures=Manufacture::paginate(10);


        return view('admin.manufacture.list', compact('manufactures'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
             $request->validate([
                'name' => 'required',
            ]);

            Manufacture::create($request->all());

            return redirect('admin/manufactures')
                ->with('success', 'Manufacture created successfully!');
        }
        
        
        return view('admin.manufacture.create');
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

       $manufactures=Manufacture::all();


       return view('admin.cars.edit', compact('manufactures', 'car'));
    }

    public function destroy(Manufacture $manufacture) //work on no parts on that category
    {
        // $category->steps->delete();
        // MySqlGrammar::compileDisableForeignKeyConstraint();
        $manufacture->delete();
        return redirect(route('admin.manufacture.list'))
                ->with('success', 'Manufacture deleted successfully!');
    }
}

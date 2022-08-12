<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\Code;
use App\Models\Car;
use App\Models\Picture;
use App\Models\Category;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PartsController extends Controller
{
    public function list()
    {
        // $parts=Part::all();
        $parts = Part::paginate(10);


        return view('admin.parts.list', compact('parts'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $parts = Part::create($data);
            $category = Category::find($request->post('category_id'));
            $parts->category()->associate($category);
            
            foreach ($request->file('image') as $imagefile) {
                $image = new Picture();
                $path = $imagefile->store('/images/parts', ['disk' =>   'my_files']);
                $image->image = $path;
                $image->part_id = $parts->id;
                $image->save();
            }
          
            $data['part_id'] = $parts->id;
            $codes = $request->post('code');

            if (isset($codes)) {
                foreach ($codes as $code) {
                    if ($code) {
                        $data['code'] = $code;
                        Code::create($data);
                    }
                }
            }
            
           
            $parts-> save();


            return redirect('admin/parts')
                ->with('success', 'Part created successfully!');
        }
        $categories = Category::whereNotNull('category_id')
        
        ->get();
        $manufactures = Manufacture::all();
        $parts = Part::all();
        $cars = Car::all();

        return view('admin.parts.create', compact('categories', 'parts', 'manufactures', 'cars'));
    }

    public function edit(Request $request, Part $part)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $part -> update($data);
            

            $data['part_id'] = $part->id;

            $codes = $request->post('code');

            Code::where('part_id', $part->id)
            ->delete();
            if ($request->post('code')) {
                foreach ($codes as $code) {
                    if ($code) {
                        $data['code'] = $code;
                        Code::create($data);
                    }
                }
            }
            
            if ($request->file('image')) {
                foreach ($request->file('image') as $imagefile) {
                    $image = new Picture();
                    $path = $imagefile->store('/images/parts', ['disk' =>   'my_files']);
                    $image->image = $path;
                    $image->part_id = $part->id;
                    $image->save();
                }
            }
            //dd($part->pictures);
           
            $part -> save();



            return redirect('admin/parts')
                ->with('success', 'Part edited successfully!');
        }

        $categories = Category::whereNotNull('category_id')
        ->get();

        $manufactures = Manufacture::all();
        
        $cars = Car::all();

        return view('admin.parts.edit', compact('categories', 'part', 'manufactures', 'cars'));
    }

    public function deleteImage(Picture $image)
    {
        $part = $image-> part_id;
        File::delete($image-> image);
        $image->delete();
        return redirect(route('admin.part.edit', $part));
    }

   

    public function show(int $id)
    {
        $part = Part::find($id);
        $i = 0;
        return view('admin.parts.show', compact('part', 'i'));
    }

    public function destroy(Part $part)
    {
        // $category->steps->delete();
        // MySqlGrammar::compileDisableForeignKeyConstraint();
        foreach ($part-> pictures as $image) {
            File::delete($image-> image);
        }
        $part->delete();
        return redirect(route('admin.parts.list'))
                ->with('success', 'Part deleted successfully!');
    }
}

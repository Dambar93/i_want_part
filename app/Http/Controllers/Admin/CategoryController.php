<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
// use Illuminate\Database\Schema\Grammars\MySqlGrammar;



class CategoryController extends Controller
{
    public function list()
    {
        $categories=Category::paginate(10);


        return view('admin.category.list', compact('categories'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
             $request->validate([
                'name' => 'required|between:2,100',
            ]);

            Category::create($request->all());

            return redirect('admin/category')
                ->with('success', 'Category created successfully!');
        }

        $firstLevelCategories = Category::where('category_id', null)->get();

        return view('admin.category.create', compact('firstLevelCategories'));
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function destroy(Category $category) //work on no parts on that category
    {
        // $category->steps->delete();
        // MySqlGrammar::compileDisableForeignKeyConstraint();
        $category->delete();
        return redirect(route('admin.category.list'))
                ->with('success', 'Category deleted successfully!');
    }

    public function edit(Category $category, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
               'name' => 'required|between:2,100',
           ]);

           $category->update($request->all());

           return redirect('admin/category')
               ->with('success', 'Category updated successfully!');
       }

       $firstLevelCategories = Category::where('category_id', null)->get();


       return view('admin.category.edit', compact('firstLevelCategories', 'category'));
    }

}

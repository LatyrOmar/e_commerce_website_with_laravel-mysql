<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //simplePaginate
        //cursoorPaginate
          $categories = Category::orderby('id','desc')->Paginate(5);

          return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'=>'required',
        ]);
        Category::create($validated);

        return redirect()->route('categories.index')->with('success',"category ajouter avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $validated = $request->validate([
            'name'=>'required'
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')->with("success","le categorie a été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        if($category->id == 2){

            return redirect()->route('categories.index')->with('failed', 'impossible de supprimé la categorie par defaut !');
        }
        $products = $category->products();
       // dd($products);

         foreach ($products as  $product) {
            # code...
            $product->categories_id = 2;
            $product->save();
         }
        $category->delete();

        return redirect()->route('categories.index')->with("success", "Category deleted successfully");
    }
}

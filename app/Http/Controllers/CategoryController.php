<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Gate;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('access-admin')) {
            $categories = Category::all();
        return view('categories.indexcategory', ['categories' => $categories]);
        }
        abort(403, 'Unauthorized!');

        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.createcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','nueva tarea creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.editcategory',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','nueva tarea actalizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','nueva tarea eliminada exitosamente');
    }
}

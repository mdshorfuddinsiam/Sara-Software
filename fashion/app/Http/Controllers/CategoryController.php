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
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'required|string',
        ]);

        Category::addNewCategory($request);
        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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
        // dd($category);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'required|string',
        ]);

        Category::updateCategory($request, $category);
        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function delete(Category $category){
        // dd($category);
        $category->delete();
        $notification = array(
            'message' => 'Category deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}

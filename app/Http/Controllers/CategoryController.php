<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\MachineImage;
use App\Models\Category;

class CategoryController extends Controller
{
   
public function index() {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
}
public function create()
{
    return view('partials.formcategorie', [
        'category' => new Category()
    ]);
}

public function edit(Category $category)
{
    return view('partials.formcategorie', compact('category'));
}


public function store(Request $request) {
    $request->validate(['name' => 'required']);
    Category::create([
        'name' => $request->name,
        'active' => true
    ]);
    return redirect()->route('admin.categories.index');
}

public function update(Request $request, Category $category) {
    $category->update([
        'name' => $request->name,
    ]);
    return redirect()->route('admin.categories.index');
}

public function destroy(Category $category) {
    $category->delete();
    return back();
}

public function toggle(Category $category) {
    $category->active = !$category->active;
    $category->save();
    return back();
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(){
        $categories = Category::paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function createCategoryPost(Request $request){
        $request->validate([
            'category' => 'required',
        ]);
        Category::create([
            'category' => $request->category
        ]);
        return redirect()->back()->with('toast_success', 'Add Category Successfull');
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id);

        $category->delete();
        return redirect()->back()->with('toast_success', 'Delete Category Successfull');
    }
}

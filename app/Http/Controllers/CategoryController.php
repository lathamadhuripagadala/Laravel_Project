<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create', ['categories' => Category::all()]);
    }


    public function save(Request $request)
    {
        $category             = new Category();
        $category->name       = $request->name;
        if ($request->status === '1' || $request->status === '2') {
            $category->status = $request->status;
        } else {
            $category->status = '2';
        }

        $category->parent_id  = $request->parent_id;
        $category->created_at = new \DateTime();
        $category->updated_at = new \DateTime();
        $category->save();

        return view('categories.index', ['categories' => Category::all()]);
    }

    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();

        return view(
            'categories.edit',
            [
                'category'   => $category,
                'categories' => $categories,
            ]
        );
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return view('categories.index', ['categories' => Category::all()]);
    }

    public function delete(Category $category)
    {
        $parentCategoryId = $category->parent_id;
        Category::where('parent_id', $category->id)->update(['parent_id' => $parentCategoryId]);
        $category->delete();

        return redirect()->route('categories.index');
    }


}

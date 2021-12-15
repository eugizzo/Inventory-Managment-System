<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function getAddCategory()
    {
        return view('category.addCategory');
    }
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories',
            'unity' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->unity = $request->unity;
        $result = $category->save();
        if ($result) {
            return redirect('getAllCategories')->with('success', 'Category saved successsfully');
        } else {
            return redirect()->back()->with('warning', 'Category saving failed!');
        }
    }

    public function getUpdateCategory($id)
    {
        $id = Crypt::decrypt($id);
        $category = Category::where("id", $id)->first();
        if ($category) {
            return view('category.updateCategory', ['category' => $category]);
        } else {
            return redirect()->back()->with('warning', 'category not found');
        }
    }
    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|string',
            'unity' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $category = Category::where('name', $request->name)->where('id', '!=', $request->id)->first();
        if ($category) {
            return redirect()->back()->with('warning', 'name already registered with another Category');
        }
        $category = category::where("id", $request->id)->first();
        if ($category) {
            $result = $category->update([
                'name' => $request->name,
                'unity' => $request->unity
            ]);
            if ($result) {
                return redirect('getAllCategories')->with('success', 'Category update successsfully');
            } else {
                return redirect()->back()->with('warning', 'Category update failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'category to update not found');
        }
    }

    public function deleteCategory($id)
    {
        $id = Crypt::decrypt($id);
        $category = Category::where("id", $id)->first();
        if ($category) {
            $product = Product::where("category_id", $id)->first();
            if ($product) {
                return redirect()->back()->with('warning', 'Category Already has product record');
            }
            $result = $category->delete();
            if ($result) {
                return redirect('getAllCategories')->with('success', 'Category deleted successsfully');
            } else {
                return redirect()->back()->with('warning', 'Category deletion failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'Category not found!');
        }
    }
    public function getAllCategories()
    {
        $categories = category::all();
        if ($categories) {
            return view('category.categories', ['categories' => $categories]);
        } else {
            return redirect()->back()->with('warning', 'no category found');
        }
    }
}

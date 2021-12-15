<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function getAddProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.addProduct', compact('categories', 'brands'));
    }
    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $product = Product::where('name', $request->name)->where('company_id', Auth::user()->company->id)->first();
        if ($product) {
            return redirect()->back()->with('warning', 'name already registered with another product');
        }
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->company_id = Auth::user()->company->id;
        $product->user_id = Auth::user()->id;
        $result = $product->save();
        if ($result) {
            return redirect()->route("getCompanyProducts", Crypt::encrypt(Auth::user()->company->id))->with('success', 'Product saved successsfully');
        } else {
            return redirect()->back()->with('warning', 'Product saving failed!');
        }
    }
    public function getCompanyProducts($id)
    {
        $id = Crypt::decrypt($id);
        $company = Company::where('id', $id)->first();
        if ($company) {
            $products = product::where('company_id', $id)->get();
            return view('product.products', ['products' => $products, 'company' => $company->name]);
        } else {
            return redirect()->back()->with('warning', 'company not found');
        }
    }
    public function getUpdateProduct($id)
    {
        $id = Crypt::decrypt($id);
        $product = product::where("id", $id)->first();
        $categories = category::all();
        $brands = brand::all();
        if ($product) {
            return view('product.updateProduct', compact('categories', 'brands', 'product'));
        } else {
            return redirect()->back()->with('warning', 'product not found');
        }
    }
    public function updateProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $product = product::where("id", $request->id)->first();

        if ($product) {
            $products = Product::where('name', $request->name)->where('id', '!=', $request->id)->where('company_id', $product->company_id)->first();
            if ($products) {
                return redirect()->back()->with('warning', 'name already registered with another product');
            }
            $result = $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'user_id' => Auth::user()->id,
            ]);
            if ($result) {
                return redirect()->route("getCompanyProducts", Crypt::encrypt(Auth::user()->company->id))->with('success', 'Product updated successsfully');
            } else {
                return redirect()->back()->with('warning', 'product update failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'product to update not found');
        }
    }

    public function deleteProduct($id)
    {
        $id = Crypt::decrypt($id);
        $product = product::where("id", $id)->first();
        $stockIn = Stock::where("product_id", $id)->first();
        if ($stockIn) {
            return redirect()->back()->with('warning', 'Product has Stocks registered');
        }
        if ($product) {
            $result = $product->delete();
            if ($result) {
                return redirect()->route("getCompanyProducts", Crypt::encrypt(Auth::user()->company->id))->with('success', 'Product updated successsfully');
            } else {
                return redirect()->back()->with('warning', 'product deletion failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'Company not found');
        }
    }
}

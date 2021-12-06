<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BrandController extends Controller
{
    public function getAddBrand()
    {
        return view('brand.addBrand');
    }
    public function addBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:brands',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $brand = new Brand();
        $brand->name = $request->name;
        $result = $brand->save();
        if ($result) {
            return redirect('getAllBrands')->with('success', 'Brand saved successsfully');
        } else {
            return redirect()->back()->with('warning', 'brand not saved');
        }
    }
    public function getUpdateBrand($id)
    {
        $brand = Brand::where("id", $id)->first();
        if ($brand) {
            return view('brand.updateBrand', ['brand' => $brand]);
        } else {
            return redirect()->back()->with('warning', 'brand not found');
        }
    }
    public function updateBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $brand = Brand::where('name', $request->name)->where('id', '!=', $request->id)->first();
        if ($brand) {
            return redirect()->back()->with('warning', 'name already registered with another brand');
        }
        $brand = Brand::where("id", $request->id)->first();
        if ($brand) {
            $result = $brand->update([
                'name' => $request->name
            ]);
            if ($result) {
                return redirect('getAllBrands')->with('success', 'Brand updated successsfully');
            } else {
                return redirect()->back()->with('warning', 'brand update failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'brand to update not found');
        }
    }
    public function deleteBrand($id)
    {
        $brand = Brand::where("id", $id)->first();
        if ($brand) {
            $product = Product::where("brand_id", $id)->first();
            if ($product) {
                return redirect()->back()->with('warning', 'Brand Already has product record');
            }
            $result = $brand->delete();
            if ($result) {
                return redirect('getAllBrands')->with('success', 'Brand deleted successsfully');
            } else {
                return redirect()->back()->with('warning', 'brand delete failed');
            }
        } else {
            return redirect()->back()->with('warning', 'brand not found');
        }
    }
    public function getAllBrands()
    {
        $brands = Brand::all();
        if ($brands) {
            return view('brand.brands', ['brands' => $brands]);
        } else {
            return redirect()->back()->with('warning', 'brands not found');
        }
    }
}

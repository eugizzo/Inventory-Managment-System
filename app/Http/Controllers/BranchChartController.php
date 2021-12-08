<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchChartController extends Controller
{
    public function SalesPurchaseChart()
    {
        for ($i = 1; $i <= 12; $i++) {
            $stockOut[] = $this->monthSales($i, Auth::user()->branch->id);
            $stockIn[] = $this->monthPurchases($i, Auth::user()->branch->id);
        }
        $stockOut = json_encode($stockOut);
        $stockIn = json_encode($stockIn);
        //admin
        // $categories = Category::all();
        // foreach ($categories as $category) {
        //     $index[] = $category->name;
        //     $product[] = Product::where('category_id', $category->id)->count();
        // }
        // $index = json_encode($index);
        // $product = json_encode($product);
        //stock
        $stocks = Stock::where('branch_id', Auth::user()->branch->id)->get();
        foreach ($stocks as $stock) {
            $name[] = $stock->product->name;
            $purchased[] = $stock->purchasedQuantity;
            $sold[] = $stock->soldQuantity;
            $remaining[] = $stock->remainingQuantity;
        }
        $name = json_encode($name);
        $purchased = json_encode($purchased);
        $sold = json_encode($sold);
        $remaining = json_encode($remaining);


        return view('chart.branchChart', compact(
            'stockOut',
            'stockIn',
            'purchased',
            'name',
            'sold',
            'remaining'
        ));
    }
    public function monthSales($month, $branch)
    {
        $stockOut = DB::table('stock_outs')
            ->where('branch_id', $branch)
            ->join('product_stock_out', 'id', '=', 'stock_out_id')
            ->whereMonth('stock_outs.created_at', $month)
            ->sum(DB::raw('soldQuantity * unityPrice'));
        return (int)$stockOut;
    }
    public function monthPurchases($month, $branch)
    {
        $stockIn = DB::table('stock_ins')
            ->where('branch_id', $branch)
            ->join('product_stock_in', 'id', '=', 'stock_in_id')
            ->whereMonth('stock_ins.created_at', $month)
            ->sum(DB::raw('purchasedQuantity * unityPrice'));
        return (int)$stockIn;
    }

    public function categoryChart()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $product[] = Product::where('category_id', $category->id)->count();
        }
    }
}

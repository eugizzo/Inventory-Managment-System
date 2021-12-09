<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchChartController extends Controller
{
    public function SalesPurchaseChart()
    {
        //chart1
        for ($i = 1; $i <= 12; $i++) {
            $stockOut[] = $this->monthSales($i, Auth::user()->branch->id);
            $stockIn[] = $this->monthPurchases($i, Auth::user()->branch->id);
        }
        $stockOut = json_encode($stockOut);
        $stockIn = json_encode($stockIn);
        //chart2
        $name = [];
        $purchased = [];
        $sold = [];
        $remaining = [];
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
        //chart3
        $productName = [];
        $purchasedValue = [];
        $soldValue = [];
        $remainingValue = [];
        $profitValue = [];
        $stocks = Stock::where('branch_id', Auth::user()->branch->id)->get();
        foreach ($stocks as $stock) {
            $productName[] = $stock->product->name;
            $stockInValue = DB::table('stock_ins')
                ->where('branch_id', Auth::user()->branch->id)
                ->join('product_stock_in', 'id', '=', 'stock_in_id')
                ->where('product_id', $stock->product_id)
                ->sum(DB::raw('purchasedQuantity * unityPrice'));


            $purchasedValue[] =  (int)$stockInValue;
            $stockOutValue = DB::table('stock_outs')
                ->where('branch_id', Auth::user()->branch->id)
                ->join('product_stock_out', 'id', '=', 'stock_out_id')
                ->where('product_id', $stock->product_id)
                ->sum(DB::raw('soldQuantity * unityPrice'));

            $soldValue[] =  (int)$stockOutValue;

            $stockIns = DB::table('stock_ins')
                ->where('branch_id', Auth::user()->branch->id)
                ->join('product_stock_in', 'id', '=', 'stock_in_id')
                ->where('product_id', '=', $stock->product_id)
                ->select('purchasedQuantity', 'unityPrice')
                ->orderByDesc('product_stock_in.created_at')
                ->get();



            $remainingQuantity  = $stock->remainingQuantity;
            $totalRemaining = 0;
            foreach ($stockIns as $stock) {
                if ($remainingQuantity > 0 &&  $stock->purchasedQuantity >= $remainingQuantity) {
                    $totalRemaining += ($remainingQuantity * $stock->unityPrice);
                    $remainingQuantity = 0;
                } else if ($remainingQuantity > 0 &&  $stock->purchasedQuantity < $remainingQuantity) {
                    $totalRemaining += ($stock->purchasedQuantity * $stock->unityPrice);
                    $remainingQuantity -= $stock->purchasedQuantity;
                }
            }
            $remainingValue[] = $totalRemaining;
            $profitValue[] = $stockOutValue -  ($stockInValue - $totalRemaining);
        }
        $productName = json_encode($productName);
        $purchasedValue = json_encode($purchasedValue);
        $soldValue = json_encode($soldValue);
        $remainingValue = json_encode($remainingValue);
        $profitValue = json_encode($profitValue);


        return view('chart.branchChart', compact(
            'stockOut',
            'stockIn',
            'purchased',
            'name',
            'sold',
            'remaining',
            'profitValue',
            'purchasedValue',
            'productName',
            'soldValue',
            'remainingValue'
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

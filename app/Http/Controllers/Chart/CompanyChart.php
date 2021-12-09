<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyChart extends Controller
{
    public function profitChart()
    {
        $name = [];
        $purchased = [];
        $sold = [];
        $remaining = [];
        $profit = [];
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        foreach ($products as $product) {
            $name[] = $product->name;
            $stockIn = DB::table('product_stock_in')
                ->where('product_id', '=', $product->id)
                ->sum(DB::raw('purchasedQuantity * unityPrice'));
            $purchased[] =  (int)$stockIn;
            $stockOut = DB::table('product_stock_out')
                ->where('product_id', '=', $product->id)
                ->sum(DB::raw('soldQuantity * unityPrice'));
            $sold[] =  (int)$stockOut;

            $stockIns = DB::table('product_stock_in')
                ->where('product_id', '=', $product->id)
                ->select('purchasedQuantity', 'unityPrice')
                ->orderByDesc('created_at')
                ->get();
            $remainingQuantity  = $product->remainingQuantity;
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
            $remaining[] = $totalRemaining;
            $profit[] = $stockOut -  ($stockIn - $totalRemaining);
        }
        $name = json_encode($name);
        $purchased = json_encode($purchased);
        $sold = json_encode($sold);
        $remaining = json_encode($remaining);
        $profit = json_encode($profit);
        return view('chart.companyChart', compact('profit', 'purchased', 'name', 'sold', 'remaining'));
    }
}

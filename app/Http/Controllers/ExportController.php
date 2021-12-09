<?php

namespace App\Http\Controllers;

use App\Exports\StockExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    // public function export()
    // {
    //     return Excel::download(new StockExport, 'users.csv', Excel::csv);
    // }
    // public function export()
    // {
    //     $products = Product::where('company_id', 2)->get();
    //     $stockOut = DB::table('product_stock_in')
    //         ->where('product_id', 2)
    //         ->select('purchasedQuantity', 'unityPrice')
    //         ->orderByDesc('created_at');
    //     return $stockOut;
    //     // return $product->stockIn->first()->pivot;
    //     // foreach($products as $product){
    //     //     $remaining = $product->remainingQuantity;
    //     //     $total = 0;
    //     //     foreach ($product->stockin->asc as $product){

    //     //     }


    //     //     while($remaining>0){
    //     //         $product->s
    //     //     }

    //     // }


    //     $stockOut = DB::table('product_stock_in')
    //         ->where('product_id', 2)
    //         ->select('purchasedQuantity', 'unityPrice')
    //         ->orderByDesc('created_at');
    //     return $stockOut;
    // }

    public function export()
    {
        $products = Product::where('company_id', Auth::user()->company_id)->get();
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
                ->where('product_id', '=', 2)
                ->select('purchasedQuantity', 'unityPrice')
                ->orderByDesc('created_at')
                ->get();
            $remaining  = $product->remaningQuantity;
            $totalRemaining = 0;
            foreach ($stockIns as $stock) {
                if ($remaining > 0 &&  $stock->purchasedQuantity >= $remaining) {
                    $totalRemaining += ($remaining * $stock->unityPrice);
                    $remaining = 0;
                } else if ($remaining > 0 &&  $stock->purchasedQuantity < $remaining) {
                    $totalRemaining += ($stock->purchasedQuantity * $stock->unityPrice);
                    $remaining -= $stock->purchasedQuantity;
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
